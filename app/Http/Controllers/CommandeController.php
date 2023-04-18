<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Trajet;

class CommandeController extends Controller
{
    public function store(Request $request){
        $commande = new Commande();
        $commande->trajet_id = $request->input('trajet_id');
        $commande->passager_id = $request->input('passager_id');
        $commande->save();

        return redirect()->route('passagertrajets.index')->with('success', 'Vous avez passé commande avec succès');
    }

    public function index()
    {
        return view('homechauffeur', ['commandes' => Commande::with('passager', 'trajet')->get()]);
    }

    public function commandespassager()
    {
        return view('adminCommande', ['commandes' => Commande::with('chauffeur','passager', 'trajet')->get()]);
    }

    public function update(Request $request, $id)
    {
        $commande = Commande::findOrFail($id);
        $commande->chauffeur_id = $request->input('chauffeur_id');
        $commande->save();
        return redirect()->route('commandeschauffeurs')->with('success', 'Vous avez accepté la commande');
    }

    public function commandespasser()
    {
        $commandes = Commande::with('chauffeur','passager', 'trajet')->get();
        $trajets = Trajet::all();
        return view('homepassager', ['commandes' => $commandes, 'trajets' => $trajets]);
    }

}
