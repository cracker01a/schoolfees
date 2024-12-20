<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $user = User::find($request->user_id);

        Mail::raw($request->message, function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Message personnalisé');
        });

        return response()->json(['message' => 'E-mail envoyé avec succès !'], 200);
    }
}

