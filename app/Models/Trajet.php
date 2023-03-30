<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commande;

class Trajet extends Model
{
    use HasFactory;
    protected $fillable = ['depart', 'destination', 'prix'];

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
