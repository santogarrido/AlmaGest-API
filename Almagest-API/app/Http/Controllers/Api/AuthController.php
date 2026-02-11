<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\WelcomeEmail;
use Auth;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
 public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        $user = Auth::user();

        // 🔴 Email no verificado
        if (!$user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Debes verificar tu correo electrónico'
            ], 403);
        }

        if (!$user->activated) {
            return response()->json([
                'message' => 'Usuario desactivado'
            ], 403);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
    public function register(Request $request)
    {
        $request->headers->set('Accept', 'application/json');
        $request->validate([
            'firstname' => 'required|string|max:255',
            'secondname' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'company_id' => 'required|integer|exists:companies,id',
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_id' => $request->company_id,
            'type' => "u",
            'activated' => 0,
        ]);

        // Envía email de verificación
        $user->notify(new WelcomeEmail());

        // Marca la fecha en que se envió el email
        $user->email_verified_at = Carbon::now();
        $user->save();

        return response()->json([
            'message' => 'Usuario registrado. Revisa tu email para verificar la cuenta.'
        ], 201);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Sesión cerrada'
        ]);
    }
}
