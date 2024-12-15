<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Classe;
use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildController extends Controller
{
    public function index()
    {
        $classes = Classe::all(); // Toutes les classes disponibles
        $children = Child::with('classe')->where('parent_id', Auth::id())->get(); // Enfants associés au parent connecté

        return view('children.index', compact('classes', 'children'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
        ]);

        Child::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'class_id' => $request->class_id,
            'parent_id' => Auth::id(), // L'ID du parent connecté
        ]);

        return redirect()->route('children.index')->with('success', 'Enfant ajouté avec succès.');
    }

}
