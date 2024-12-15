<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Notifications\UserAddedNotification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        return view('users.index', compact('users'));
    }
    public function index1()
    {
       
        return view('welcome');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user.*.firstname' => 'required|string|max:255',
            'user.*.lastname' => 'required|string|max:255',
            'user.*.email' => 'required|email|unique:users,email',
            'user.*.status' => 'required|in:comptable,parent',
            'user.*.number' => 'nullable|string|max:15',
        ]);
    
        if (empty($validatedData['user']) || !is_array($validatedData['user'])) {
            return redirect()->back()->withErrors(['error' => 'Aucun utilisateur valide fourni.']);
        }
    
        foreach ($validatedData['user'] as $userData) {
            $user = User::create([
                'firstname' => $userData['firstname'],
                'lastname' => $userData['lastname'],
                'email' => $userData['email'],
                'status' => $userData['status'],
                'number' => $userData['number'],
                'password' => Hash::make('123456789'),
                'isActive' => true,
                'name' => "{$userData['firstname']} {$userData['lastname']}",
            ]);
    
          //$user->notify(new UserAddedNotification($user));
        }
    
        return  view('users.index')->with('success', 'Utilisateurs ajoutés avec succès et emails envoyés.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function activate(Request $request)
{
    $user = User::where('email', $request->email)->first();

    if (!$user || $user->password) {
        return redirect('/login')->withErrors('Lien invalide ou compte déjà activé.');
    }

    return view('auth.set_password', ['email' => $user->email]);
}

public function setPassword(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string|confirmed|min:8',
    ]);

    $user = User::where('email', $validated['email'])->first();
    $user->password = Hash::make($validated['password']);
    $user->save();

    return redirect('/login')->with('success', 'Mot de passe défini avec succès. Connectez-vous maintenant.');
}

}
