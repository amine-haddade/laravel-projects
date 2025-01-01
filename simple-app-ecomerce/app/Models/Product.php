<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'prix',
        'image',
        'categorie_id'
    ];

    
    public function categorie(){
        return $this->belongsTo(categorie::class);
    }
}
