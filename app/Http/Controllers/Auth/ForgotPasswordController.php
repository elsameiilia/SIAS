<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    public function index(){
        return view('auth.forgot');
    }

    public function savePassword(Request $request){
        // Validate the input
        $request->validate([
            'nip' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Find the user by NIP
        $user = User::where('nip', $request->nip)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Update the password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Password updated successfully.']);
    }

    use SendsPasswordResetEmails;
}
