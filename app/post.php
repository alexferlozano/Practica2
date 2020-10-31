<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function comments()
    {
        return $this->hasMany('App\comentario');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }
    protected $fillable = [
        'titulo','user_id','descripcion','autor'
    ];
}
