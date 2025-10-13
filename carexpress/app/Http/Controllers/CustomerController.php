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
            'password' => Hash::make($request->input('password')),
        ]);
        Mail::to($customer->email)->send(new WelcomeNewCustomer($customer->lastname, $customer->codeclient));
        return redirect()->route('logincustomer')->with('success', 'Votre compte a été créé avec succès, veuillez vous connecter');
    }

    //update statut client
    public function updateStatus($codeclient){
        $customer = Customer::where('codeclient', $codeclient)->first();

        if(!$customer){
            return response()->json(['success' => false, 'message' => 'Client non trouvé.']);
        }

        //inverser le statut
        $customer->statut = $customer->statut == 'actif' ? 'inactif' : 'actif';
        $customer->save();

        return response()->json(['success' => true, 'message' => 'Le statut du client a été modifié avec succès.']);
        // return redirect()->route('admin.customer')->with('success', 'Statut du client modifié avec succès');
    }

    //delete customer
    public function deletePersonnel($codeclient)
    {
        $customer = Customer::where('codeclient', $codeclient)->first();

        if (!$customer) {
            return response()->json(['success' => false, 'message' => 'Client non trouvé.']);
        }

        //delete the customer
        $customer->delete();

        return response()->json(['success' => true, 'message' => 'Le client a été supprimé avec succès.']);
        // return redirect()->route('admin.customer')->with('success', 'Statut du client modifié avec succès');
    }
}
