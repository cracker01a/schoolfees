<?php

namespace App\Http\Controllers;

use App\Models\RefundRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefundRequestController extends Controller
{
    // Afficher le formulaire de demande de remboursement
    public function create()
    {
        $children = Auth::user()->children; // Obtenir les enfants de l'utilisateur connecté
        return view('refunds.create', compact('children'));
    }

    // Soumettre une demande de remboursement
    public function store(Request $request)
    {
        $validated = $request->validate([
            'child_id' => 'nullable|exists:children,id',
            'amount' => 'required|numeric|min:1',
            'reason' => 'required|string|max:255',
        ]);

        RefundRequest::create([
            'user_id' => Auth::id(),
            'child_id' => $validated['child_id'],
            'amount' => $validated['amount'],
            'reason' => $validated['reason'],
        ]);

        return redirect()->route('refunds.create')->with('success', 'Demande de remboursement envoyée avec succès.');
    }
    public function index()
    {
        // Récupérer toutes les demandes de remboursement
        $refundRequests = RefundRequest::with(['user', 'child'])->get();

        // Retourner la vue avec les données
        return view('refunds.index', compact('refundRequests'));
    }
    public function destroy($id)
{
    $refundRequest = RefundRequest::findOrFail($id);
    $refundRequest->delete();

    return response()->json(['success' => true, 'message' => 'Demande supprimée avec succès.']);
}

}
