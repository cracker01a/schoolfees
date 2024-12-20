<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'parent_id', 'class_id'];

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }
    
}
