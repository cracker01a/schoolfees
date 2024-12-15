<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserAddedNotification extends Notification
{
    protected $user;
    
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Bienvenue dans notre application')
            ->greeting('Bonjour ' . $this->user->firstname . ' ' . $this->user->lastname)
            ->line('Votre compte a été créé avec succès.')
            ->line('Voici vos informations :')
            ->line('Email : ' . $this->user->email)
            ->line('Mot de passe : default_password') // Si applicable
            ->line('Veuillez vous connecter et changer votre mot de passe.')
            ->action('Se connecter', url('/login'))
            ->line('Merci de faire partie de notre communauté !');
    }
}