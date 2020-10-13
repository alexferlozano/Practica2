<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    protected $fillable = [
        'post_id','descripcion','autor'
    ];
}
