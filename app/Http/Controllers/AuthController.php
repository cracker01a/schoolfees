<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Gestion de la soumission du formulaire de connexion
    public function login(Request $request)
    {
        // Valider les données
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Vérifier si l'utilisateur existe dans la base de données
        $user = User::where('email', $validated['email'])->first();

        if ($user) {
            // Si le mot de passe est vide, ajouter confirm_password au formulaire
            if (empty($user->password)) {
                // Retourner à la vue avec un champ confirm_password
                return view('auth.login', ['email' => $validated['email'], 'confirmPassword' => true]);
            }

            // Sinon, procéder à la connexion normale
            if (Auth::attempt($validated)) {
                return redirect()->route('bb');
            } else {
                throw ValidationException::withMessages(['email' => 'Invalid credentials.']);
            }
                        // Ajouter une validation pour confirm_password si nécessaire
            if ($request->has('confirm_password') && $request->password !== $request->confirm_password) {
                throw ValidationException::withMessages(['confirm_password' => 'Passwords do not match.']);
            }

        }

        throw ValidationException::withMessages(['email' => 'User not found.']);
        return view('auth.login');
    }

    // Déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function login1()
    {
       
      
        // Retourne la vue avec la liste des frais
        return view('auth.login');
    }
}
