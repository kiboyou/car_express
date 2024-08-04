<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeNewCustomer;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;

class CustomerController extends Controller
{

    //store a new customer
    public function store(Request $request)
    {
        $request->validate([
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'email' => 'required|string|email|unique:customers,email',
            'phone' => 'string',
            'addresse' => 'required|string',
            'numeroPermis' => 'required|string',
            'password' => 'required|string|confirmed:min:8',
        ]);
        // dd($request->all());
        $codeclient = Customer::generateCodeClient();
        $customer = Customer::create([
            'codeclient' => $codeclient,
            'lastname' => $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'addresse' => $request->input('addresse'),
            'numeroPermis' => $request->input('numeroPermis'),
            'password' =>Hash::make($request->input('password')),
        ]);
        Mail::to($customer->email)->send(new WelcomeNewCustomer($customer->lastname, $customer->codeclient));
        return redirect()->route('logincustomer')->with('success', 'Votre compte a été créé avec succès, veuillez vous connecter');
    }
}
