<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //login for personnels
    public function loginPersonnel(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $personnel = Personnel::where('username', $request->input('username'))->first();

        if (!$personnel || !Hash::check($request->input('password'), $personnel->password)) {
            // Log::warning('Login attempt failed', ['username' => $request->input('username')]);
            return redirect()->route('admin.login')->with('error', 'Nom d\'utilisateur ou mot de passe incorrect');
        }
        Log::info('Login successful', ['username' => $personnel->username]);
        // Vérifiez si le compte est inactif et firstlogin est true
        if ($personnel->statut !== 'actif' && $personnel->firstlogin) {
            // Log::info('Redirecting to reset form', ['username' => $personnel->username]);
            Auth::guard('personnel')->login($personnel);
            return redirect()->route('admin.resetform')->with('success', 'Réinitialisez le mot de passe avant de vous connecter');
        }

        // Vérifiez si le compte est inactif et firstlogin est false
        if ($personnel->statut !== 'actif' && !$personnel->firstlogin) {
            // Log::info('Account inactive', ['username' => $personnel->username]);
            return redirect()->route('login.personnel')->with('error', 'Votre compte est inactif, veuillez contacter l\'administrateur');
        }

        if (Auth::guard('personnel')->attempt($request->only('username', 'password'))) {
            $personel = Auth::guard('personnel')->user();
            return redirect()->route('admin.dashboard');
        }

        // Log::warning('Authentication failed', ['username' => $request->input('username')]);
        return redirect()->route('admin.login')->with('error', 'Nom d\'utilisateur ou mot de passe incorrect');
    }

    public function logincustomer(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $customer = Customer::where('email', $request->input('email'))->first();

        if (!$customer || !Hash::check($request->input('password'), $customer->password)) {
            return redirect()->route('logincustomer')->with('error', 'Email ou mot de passe incorrect');
        }

        if ($customer->statut !== 'actif') {
            return redirect()->route('logincustomer')->with('error', 'Votre compte est inactif, veuillez contacter l\'administrateur');
        }

        if (Auth::guard('customer')->attempt($request->only('email', 'password'))) {
            $customer = Auth::guard('customer')->user();
            return redirect()->route('allcar')->with('success', 'Welcome back ' . $customer->lastname);
        }

        return redirect()->route('logincustomer')->with('error', 'Email ou mot de passe incorrect');
    }

    // logout for customer
    public function logoutCustomer(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('logincustomer');
    }
    //logout for personnel
    public function logoutPersonnel(Request $request)
    {
        Auth::guard('personnel')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
