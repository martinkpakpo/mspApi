<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
        public function carts()
    {
        return $this->hasMany('App\Cart', 'commande_id', 'id');
    }

     public function client()
    {
        return $this->belongsTo("App\Client");
    }
}
