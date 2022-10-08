<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    //
    protected $fillable = [
        "NomP", "Prix", "Description", "Categorie",
         "SousCategorie"
    ];
    public function detailcommande()
    {
        return $this->hasMany(Detailcommande::class);
    }
    public function image()
    {
        return $this->hasMany(Image::class);
    }
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
    // public function stockprodcol()
    // {
    //     return $this->hasMany(Stockprodcol::class);
    // }
    // public function stockprodt()
    // {
    //     return $this->hasMany(Stockprodt::class);
    // }
}
