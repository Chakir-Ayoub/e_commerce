<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taille extends Model
{
    protected $fillable = [
        "Taille"
    ];
    // public function stockprodt()
    // {
    //     return $this->hasMany(Stockprodt::class);
    // }
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
