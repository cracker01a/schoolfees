<p>Bonjour {{ $user->firstname }},</p>

<p>Votre compte a été créé avec succès. Cliquez sur le lien ci-dessous pour définir votre mot de passe et activer votre compte :</p>

<p><a href="{{ route('users.activate', ['email' => $user->email]) }}">Activer mon compte</a></p>
