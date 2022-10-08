<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        "user_id",  "DateLivraison", "paid",
         "delivered"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function detailcommande()
    {
        return $this->hasMany(Detailcommande::class);
    }
}
