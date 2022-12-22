<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
     public function produits()
    {
        return $this->hasMany('App\Produit', 'categorie_id', 'id');
    }
}
