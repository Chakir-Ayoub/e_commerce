<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        "prouduit_id", "couleur_id", "taille_id", "Qte" 
    ];

    
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function couleur()
    {
        return $this->belongsTo(Couleur::class);
    }
    public function taille()
    {
        return $this->belongsTo(Taille::class);
    }
}
