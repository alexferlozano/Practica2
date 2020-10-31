<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    public function posts()
    {
        return $this->belongsTo('App\post');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }
    protected $fillable = [
        'post_id','user_id','descripcion','autor'
    ];
}
