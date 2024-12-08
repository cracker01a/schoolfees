<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Vous pouvez ajouter d'autres colonnes si nécessaire

    // Relation inverse avec les frais
    public function fees()
    {
        return $this->hasMany(Fee::class, 'class_id');
    }
}
