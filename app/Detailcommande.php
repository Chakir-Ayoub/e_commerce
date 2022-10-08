<?php 

namespace App;


use Illuminate\Database\Eloquent\Model;

class Detailcommande extends Model
{
    protected $fillable = [
        "commande_id", "produit_id", "image_id", "QteCommande" 
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
