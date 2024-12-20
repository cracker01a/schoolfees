<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\User;

class WhatsAppController extends Controller
{
    public function sendWhatsApp(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $user = User::find($request->user_id);

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);

        $twilio->messages->create(
            'whatsapp:' . $user->phone, // Numéro de l'utilisateur
            [
                'from' => 'whatsapp:' . env('TWILIO_WHATSAPP_FROM'),
                'body' => $request->message,
            ]
        );

        return response()->json(['message' => 'Message WhatsApp envoyé avec succès !'], 200);
    }
}
