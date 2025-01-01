<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre_product extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'image_livre',
        'titre_livre',
        'prix_livre',
        'pdf',
        'description'
    
    ];
}
