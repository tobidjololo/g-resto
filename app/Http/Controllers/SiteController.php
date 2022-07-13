<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vente;
use App\Models\Caisse;
use App\Models\Produit;
use App\Models\Recette;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class SiteController extends Controller
{
    //dashboard
    public function index()
    {
        if(Auth()->guest()){
            return redirect('login');
        } else {
            $today = Carbon::today();
            $now = date_format($today, 'Y-m-d');

            $categories = Categorie::count();
            $produits = Produit::count();
            $recettes = Recette::count();

            $ventesmois = DB::table('Ventes')
                        ->select(DB::raw('*'))
                        ->where(DB::raw('DATE(created_date)'), $now)
                        ->where('somme','!=',0)
                        ->count();

            $ventes = DB::table('Ventes')
                    ->select(DB::raw('*'))
                    ->where(DB::raw('DATE(created_date)'), $now)
                    ->where('somme','!=',0)
                    ->get();

            $somme = DB::table('Ventes')
                    ->select(DB::raw('*'))
                    ->where(DB::raw('DATE(created_date)'), $now)
                    ->where('somme','!=',0)
                    ->sum('somme');
		    return view('home', compact('categories','produits','recettes','ventesmois','ventes','somme'));
        }
    }

    //addCategorie
    public function addCategorie(Request $request)
    {
        if($request->isMethod("POST")) {
            $request->validate([
                'nomCategorie' => 'required|string|max:100',
            ]);

            DB::table('categorie')->insert([
                'nom' => $_POST["nomCategorie"]
            ]);
            return redirect('/showCategorie');
        } else {
            return view('Categories/addCategorie');
        }
    }

    //showCategorie
    public function showCategorie()
    {
        $categories = Categorie::all();
		return view('Categories/showCategorie', compact('categories'));
    }

    //addProduit
    public function addProduit(Request $request)
    {
        if($request->isMethod("POST")) {
            $request->validate([
                'nomProduit' => 'required|string|max:100',
                'quantiteStock' => 'required',
                'quantiteAlert' => 'required',
                'prix' => 'required',
                'categorie' => 'required',
            ]);

            DB::table('Produit')->insert([
                'nom' => $_POST["nomProduit"],
                'quantiteStock' => $_POST["quantiteStock"],
                'quantiteAlert' => $_POST["quantiteAlert"],
                'prix' => $_POST["prix"],
                'categorie' => $_POST["categorie"],
            ]);
            return redirect('/showProduit');
        } else {
            $categories = Categorie::all();
            return view('Produits/addProduit', compact('categories'));
        }
    }

    //showProduit
    public function showProduit()
    {
        $produits = Produit::all();
        return view('Produits/showProduit', compact('produits'));
    }

    //addProduitStock
    public function addProduitStock(Request $request)
    {
        if($request->isMethod("POST")) {
            $request->validate([
                'nomProduit' => 'required',
                'quantiteStock' => 'required',
            ]);

            $produits = Produit::find($_POST['nomProduit']);
            //dd($produits);
            $produits->update([
                'quantiteStock' => $produits->quantiteStock + $_POST["quantiteStock"],
            ]);
            return redirect('/showProduit');
        } else {
            $produits = Produit::all();
            return view('Produits/addProduitStock', compact('produits'));
        }
    }

    //addRecettes
    public function addRecettes(Request $request)
    {
        if($request->isMethod("POST")) {
            $request->validate([
                'nomRecette' => 'required|string|max:100',
                'prix' => 'required',
            ]);

            DB::table('Recettes')->insert([
                'nom' => $_POST["nomRecette"],
                'prix' => $_POST["prix"]
            ]);
            return redirect('/showRecettes');
        } else {
            return view('Recettes/addRecette');
        }
    }

    //showRecettes
    public function showRecettes()
    {
        $recettes = Recette::all();
		return view('Recettes/showRecette', compact('recettes'));
    }

    //addVentes
    public function addVentes(Request $request)
    {
        if($request->isMethod("POST")) {
            $id = DB::table('Ventes')->insertGetId([
                'client' => $_POST["nomClient"],
                'typeCommande' => $_POST["typeCommande"],
            ]);
            return $id;

            return redirect('/showProduit');
        } else {
            $recettes = Recette::all();
            $boissons = Categorie::join('Produit', 'categorie.id', '=', 'Produit.categorie')
                    ->select(DB::raw('*'))
                    ->get();

            return view('ventes/addVente', compact('recettes','boissons'));
        }
    }

    //addVentesLignes
    public function addVentesLignes(Request $request, $id)
    {
        if($request->isMethod("POST")) {
            $montant = 0;
            for($count = 0; $count < count($request->hidden_commande); $count++) {
                DB::table('LigneVentes')->insertGetId([
                    'idVente' => intval($id),
                    'produit' => $_POST['hidden_commande'][$count],
                    'prix' => intval($_POST['hidden_prix'][$count]),
                ]);
                $montant += intval($_POST['hidden_prix'][$count]);
            }

            $v = Vente::find($id);
            $v->update([
                "somme" => $montant
            ]);

            $ventes = DB::table('Caisse')
                    ->select('solde')
                    ->orderBy('created_date','DESC')
                    ->first();

            $id = DB::table('Caisse')->insertGetId([
                'typeOperation' => "vente",
                'nomOpérant' => "Système",
                'prenomOpérant' => "Système",
                'raison' => "vente",
                'montant' => $montant,
                'solde' => $montant+$ventes->solde,
            ]);
            return redirect('/showProduit');
        }
    }

    //showVentesDays
    public function showVentesDays()
    {
        $today = Carbon::today();
        $now = date_format($today, 'Y-m-d');
        $ventes = DB::table('Ventes')
                    ->select(DB::raw('*'))
                    ->where(DB::raw('DATE(created_date)'), $now)
                    ->where('somme','!=',0)
                    ->get();

        $somme = DB::table('Ventes')
                    ->select(DB::raw('*'))
                    ->where(DB::raw('DATE(created_date)'), $now)
                    ->where('somme','!=',0)
                    ->sum('somme');
        return view('ventes/showVentesDays', compact('ventes','somme'));
    }

    //showVentePeriode
    public function showVentePeriode(Request $request)
    {
        if($request->isMethod("POST")) {
            $ventes = DB::table('Ventes')
                        ->select(DB::raw('*'))
                        ->whereIn(DB::raw('DATE(created_date)'),[$_POST['dateDépart'],$_POST['dateRetour']])
                        ->where('somme','!=',0)
                        ->get();

            $somme = DB::table('Ventes')
                        ->select(DB::raw('*'))
                        ->whereIn(DB::raw('DATE(created_date)'),[$_POST['dateDépart'],$_POST['dateRetour']])
                        ->where('somme','!=',0)
                        ->sum('somme');
            //dd($somme);

            $depart = $_POST['dateDépart'];
            $retour = $_POST['dateRetour'];
            return view('ventes/showVentePeriode', compact('ventes','depart','retour','somme'));
        } else {
            return view('ventes/showVentePeriode');
        }
    }

    //ventesDetails
    public function ventesDetails($id)
    {
        $ventes = DB::table('LigneVentes')
                    ->where(["idVente" => $id])
                    ->get();
        //dd($ventes);
        return Response::json($ventes);
        return view('ventes/showVentesDays', compact('ventes'));
    }

    //addConstantes
    public function addConstantes(Request $request)
    {
        if($request->isMethod("POST")) {
            $request->validate([
                'nomConstante' => 'required|string|max:100',
                'prix' => 'required',
            ]);

            DB::table('Constantes')->insert([
                'nom' => $_POST["nomConstante"],
                'valeur' => $_POST["prix"]
            ]);

            $ventes = DB::table('Caisse')
                    ->select('solde')
                    ->orderBy('created_date','DESC')
                    ->first();

            DB::table('Caisse')->insertGetId([
                'typeOperation' => "achat",
                'nomOpérant' => "Système",
                'prenomOpérant' => "Système",
                'raison' => "achat",
                'montant' => $_POST["prix"],
                'solde' => $_POST["prix"]-$ventes->solde,
            ]);
            return redirect('/showConstantes');
        } else {
            return view('Constantes/addConstantes');
        }
    }

    //showConstantes
    public function showConstantes()
    {
        $now = Carbon::now();
        $constantes = DB::table('Constantes')
                  ->select(DB::raw('*'))
                  ->where(DB::raw('MONTH(created_date)'), $now->month)
                  ->get();

		return view('Constantes/showConstantes', compact('constantes'));
    }

    //recevoirCredit
    public function recevoirCredit()
    {
        $caisses = DB::table('Caisse')
                    ->select(DB::raw('*'))
                    ->orderBy('created_date','DESC')
                    ->get();


        $valeur = DB::table('Caisse')
                    ->select('solde')
                    ->orderBy('created_date','DESC')
                    ->first();
        $valeur = $valeur->solde;

        $today = Carbon::today();
        $now = date_format($today, 'Y-m-d');
        $recetteJour = DB::table('Caisse')
                        ->where(DB::raw('DATE(created_date)'), $now)
                        ->where('typeOperation', "Vente")
                        ->sum('montant');

        $achat = DB::table('Caisse')
                        ->where(DB::raw('DATE(created_date)'), $now)
                        ->where('typeOperation', "achat")
                        ->sum('montant');
        return view('Caisse/etat', compact('caisses','valeur','recetteJour','achat'));
    }

    //OperationCompte
    public function OperationCompte()
    {

    }
}
