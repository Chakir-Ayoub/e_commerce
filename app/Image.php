<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        "Image", "produit_id", "couleur_id" 
    ];
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function detailcommande()
    {
        return $this->hasMany(Detailcommande::class);
    }
    public function couleur()
    {
        return $this->belongsTo(Couleur::class);
    }
}
