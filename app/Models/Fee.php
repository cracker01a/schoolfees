<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'amount',
        'due_date',
        'class_id', // clé étrangère pour la classe
        'description'
    ];

    // Relation avec le modèle Classe
    public function classe() // Mettez un nom de méthode adapté
    {
        return $this->belongsTo(Classe::class, 'class_id'); // Assurez-vous que "Classe" est le bon nom
    }
}
