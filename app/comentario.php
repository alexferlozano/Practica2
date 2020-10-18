<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    public function posts()
    {
        return $this->belongsTo('App\post');
    }
    protected $fillable = [
        'post_id','descripcion','autor'
    ];
}
