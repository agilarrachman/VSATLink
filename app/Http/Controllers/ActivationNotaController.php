<?php

namespace App\Http\Controllers;

use App\Models\ActivationNota;
use App\Models\ActivationStatusHistory;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ActivationNotaController extends Controller
{
    public function index()
    {
        $status = request()->get('status', 'Semua');

        return view('activations', [
            "page" => "activations",
            'notas' => ActivationNota::getAllMyActivations(Auth::user(), $status)
        ]);
    }

    public function show(ActivationNota $nota)
    {
        if ($nota->order->customer_id !== Auth::id()) {
            abort(403, 'Anda bukan pemilik data aktivasi ini.');
        }

        return view('activation-detail', [
            'page' => 'activations',
            'nota' => $nota,
            'activation_status' => ActivationStatusHistory::getLatestStatusActivation($nota->id),
        ]);
    }

    public function confirmSchedule(ActivationNota $nota)
    {
        ActivationNota::confirmSchedule($nota->id);

        return back()->with(
            'success',
            'Jadwal instalasi dan aktivasi layanan Anda telah berhasil dikonfirmasi. Tim kami akan melakukan instalasi sesuai dengan jadwal yang telah ditentukan.'
        );
    }

    public function rejectSchedule(Request $request, ActivationNota $nota)
    {
        $request->validate([
            'reject_reason' => 'required',
        ]);

        $activationNota = ActivationNota::rejectSchedule($nota->id, $request->reject_reason);

        $data = [
            'customer_name' => $activationNota->order->customer->name,
            'unique_order'  => $activationNota->order->unique_order,
            'product_name'  => $activationNota->order->product->name,
            'installation_date'  => $activationNota->installation_date->translatedFormat('d F Y'),
            'reject_reason' => $request->reject_reason,
        ];

        $installationCoordinatorEmails = Admin::getAllInstallationCoordinatorEmail();

        Mail::send('emails.schedule-rejected', $data, function ($message) use ($installationCoordinatorEmails) {
            $message->to($installationCoordinatorEmails)
                ->subject('[NOTIFIKASI] Permohonan Penjadwalan Ulang Instalasi & Aktivasi');
        });;

        return back()->with(
            'success',
            'Penolakan jadwal instalasi berhasil dikirim. Tim kami akan meninjau alasan penolakan dan mengatur ulang jadwal instalasi Anda.'
        );
    }

    public function signingActivationDocument(Request $request, ActivationNota $nota)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $signatureBase64 = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $signatureBase64 = 'data:' . $file->getMimeType() . ';base64,' .
                base64_encode(file_get_contents($file));
        }

        ActivationNota::signingActivationDocument($nota, $signatureBase64);

        return back()->with(
            'success',
            'Dokumen Surat Pernyataan Aktivasi berhasil ditandatangani.'
        );
    }

    public function downloadSPA($filename)
    {
        $path = storage_path('app/public/activation_documents/' . $filename);

        abort_unless(file_exists($path), 404);

        return response()->download($path);
    }
}
