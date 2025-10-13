<?php

namespace App\Http\Controllers;

use App\Mail\ResetPersonnelPassword;
use App\Mail\WelcomeNewPersonnel;
use App\Models\Personnel;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Log;
use Mail;

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
            'role' => 'required|string'
        ]);

        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');

        $password = Personnel::generatePersonnelPassword();
        $username = Personnel::generatePersonnelUsername($lastname, $firstname);

        $personel = Personnel::create([
            'lastname' => $lastname,
            'firstname' => $firstname,
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
            'password' => Hash::make($password),
            'username' => $username
        ]);
        Mail::to($personel->email)->send(new WelcomeNewPersonnel($username, $personel->lastname, $password));
        return redirect()->route('admin.gestionnaire')->with('success', 'Le compte a été créé avec succès');

    }

    //reset password
    public function resetpasswordfirstlogin(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8|string'
        ]);

        $personel = Auth::guard('personnel')->user();

        Log::info('Attempting to reset password for user', ['username' => $personel ? $personel->username : 'null']);

        if ($personel) {
            Log::info('Resetting password for user', ['username' => $personel->username]);

            $personel->password = Hash::make($request->input('password'));
            $personel->firstlogin = false;
            $personel->statut = 'actif';

            //save the update password
            $personel->save();
            // Log::info('Password reset successfully', ['username' => $personel->username]) ;
            return redirect()->route('admin.login')->with('success', 'Password reset successfully.');
        }
        // Log::warning('Failed to reset password', ['username' => $request->input('username')]);
        return back()->withErrors([
            'password' => 'Failed to reset the password. Please try again.',
        ]);
    }

    public function updateStatus($idclient)
    {
        $personnel = Personnel::where('id', $idclient)->first();

        if (!$personnel) {
            return response()->json(['success' => false, 'message' => 'Personnel non trouvé.']);
        }

        //inverser le statut
        $personnel->statut = $personnel->statut == 'actif' ? 'inactif' : 'actif';
        $personnel->save();

        return response()->json(['success' => true, 'message' => 'Le statut du personnel a été modifié avec succès.']);
        // return redirect()->route('admin.customer')->with('success', 'Statut du client modifié avec succès');
    }

    //delete personnel
    public function deletePersonnel($idpersonnel)
    {
        $personnel = Personnel::where('id', $idpersonnel)->first();

        if (!$personnel) {
            return response()->json(['success' => false, 'message' => 'Personnel non trouvé.']);
        }

        //delete the personnel
        $personnel->delete();

        return response()->json(['success' => true, 'message' => 'Le personnel a été supprimé avec succès.']);
        // return redirect()->route('admin.customer')->with('success', 'Statut du client modifié avec succès');
    }

    //reset password
    public function resetPasswordPersonnel($idpersonnel){
        $personnel = Personnel::where('id', $idpersonnel)->first();

        if (!$personnel) {
            return response()->json(['success' => false, 'message' => 'Personnel non trouvé.']);
        }

        $password = Personnel::generatePersonnelPassword();
        $personnel->password = Hash::make($password);
        $personnel->firstlogin = true;
        $personnel->save();

        Mail::to($personnel->email)->send(new ResetPersonnelPassword($personnel->lastname, $password));
        return response()->json(['success' => true, 'message' => 'Le mot de passe du personnel a été réinitialisé avec succès.']);
    }

}
