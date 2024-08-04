<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonnelController extends Controller
{
    //store a new personnel
    public function store(Request $request)
    {
        $request->validate([
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'email' => 'required|string|email|unique:personnels',
            'phone' => 'required|string',
            'username' => 'required|string|unique:personnels',
            'password' => 'required|string|min:8',
            'role' => 'required|string'
        ]);
        $personnel = Personnel::create([
            'lastname' => $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role')
        ]);
        return response()->json($personnel, 201);
    }

}
