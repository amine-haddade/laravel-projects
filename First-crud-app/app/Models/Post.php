<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    // cette partie pour passe une colonne par defaut exeple title 
    //mais important de maitre toue les colonne saisir
    protected $fillable=[
        'title',
        'description',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);// this->model user 
    }
}
