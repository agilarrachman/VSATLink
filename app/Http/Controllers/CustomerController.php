<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Laravolt\Indonesia\Facade as Indonesia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function login()
    {
        return view('login', ['page' => 'login']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:3|max:12'
        ]);

        // Periksa apakah checkbox "Remember Me" dicentang
        $remember = $request->has('remember-me');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Gagal! Username atau password salah.');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function profile()
    {
        $provinces = Indonesia::allProvinces();
        $cities = Indonesia::allCities();
        $districts = Indonesia::allDistricts();
        $villages = DB::table('indonesia_villages')->get();

        return view('profile', [
            'page' => 'profile',
            'user' => Auth::user(),
            'provinces' => $provinces,
            'cities' => $cities,
            'districts' => $districts,
            'villages' => $villages
        ]);
    }
}
