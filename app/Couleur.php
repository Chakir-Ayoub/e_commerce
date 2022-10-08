<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couleur extends Model
{
    protected $fillable = [
        "Couleur"
    ];
    // public function stockprodcol()
    // {
    //     return $this->hasMany(Stockprodcol::class);
    // }
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
