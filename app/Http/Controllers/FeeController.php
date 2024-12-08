<?php

namespace App\Http\Controllers;
use App\Models\Fee;
use App\Models\Classe;


use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        // Récupère tous les frais avec les classes associées
        $fees = Fee::with('classe')->get();

        // Retourne la vue avec la liste des frais
        return view('fees.index', compact('fees'));
    }

    public function create()
    {
        $classes = Classe::all(); // Récupérer toutes les classes
        return view('fees.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'class_id' => 'required|exists:classes,id',
            'description' => 'nullable|string',
        ]);

        Fee::create($request->all());

        return redirect()->route('fees.index')->with('success', 'Frais ajouté avec succès.');
    }

    public function edit($id)
    {
        $fee = Fee::findOrFail($id); // Récupère le frais par ID
        $classes = Classe::all();   // Récupère toutes les classes disponibles
        return view('fees.edit', compact('fee', 'classes'));
    }

    // Met à jour un frais dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'class_id' => 'required|exists:classes,id', // Validation de la clé étrangère
            'description' => 'nullable|string',
        ]);

        $fee = Fee::findOrFail($id); // Trouve le frais à mettre à jour
        $fee->update([
            'type' => $request->type,
            'amount' => $request->amount,
            'due_date' => $request->due_date,
            'class_id' => $request->class_id,  // Met à jour la classe
            'description' => $request->description,
        ]);

        return redirect()->route('fees.index')->with('success', 'Le frais a été mis à jour avec succès');
    }
    public function destroy(Fee $fee)
    {
        $fee->delete();
        return redirect()->route('fees.index')->with('success', 'Frais supprimé avec succès');
    }
}
