<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
class CommandeController extends Controller
{
    public function store(Request $request){
        $commande = new Commande();
        $commande->trajet_id = $request->input('trajet_id');
        $commande->passager_id = $request->input('passager_id');
        $commande->save();

        return view('succes');
    }

    public function index()
    {
        return view('homechauffeur', ['commandes' => Commande::with('passager', 'trajet')->get()]);
    }

    public function commandespassager()
    {
        return view('adminCommande', ['commandes' => Commande::with('chauffeur','passager', 'trajet')->get()]);
    }
}
