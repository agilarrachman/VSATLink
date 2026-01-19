<?php

namespace App\Http\Controllers;

use App\Models\ActivationNota;
use App\Http\Requests\StoreActivationNotaRequest;
use App\Http\Requests\UpdateActivationNotaRequest;
use App\Models\ActivationStatusHistory;
use Illuminate\Support\Facades\Auth;

class ActivationNotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = request()->get('status', 'Semua');

        return view('activations', [
            "page" => "activations",
            'notas' => ActivationNota::getAllMyActivations(Auth::user(), $status)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivationNotaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivationNota $nota)
    {
        if ($nota->order->customer_id !== Auth::id()) {
            abort(403, 'Anda bukan pemilik data aktivasi ini.');
        }

        // $confirmedStatusOrder = OrderStatusHistory::getConfirmedStatusOrder($nota->id);
        // $confirmedOrderDate = $confirmedStatusOrder ? $confirmedStatusOrder->created_at->translatedFormat('d F Y, H:i') : null;

        // $receivedStatusOrder = OrderStatusHistory::getReceivedStatusOrder($nota->id);
        // $receivedStatusOrderNote = $receivedStatusOrder ? $receivedStatusOrder->note : null;

        return view('activation-detail', [
            'page' => 'activation-detail',
            'nota' => $nota,
            // 'confirmed_order_date' => $confirmedOrderDate,
            // 'received_status_order_note' => $receivedStatusOrderNote,
            'activation_status' => ActivationStatusHistory::getLatestStatusActivation($nota->id),
            // 'cancel_step' => OrderStatusHistory::getCancelStep($nota->id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivationNota $activationNota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivationNotaRequest $request, ActivationNota $activationNota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivationNota $activationNota)
    {
        //
    }
}
