<?php

namespace App\Http\Controllers;

use App\Compagnie;
use App\Contrat;
use App\Historique;
use App\Produit;
use Illuminate\Http\Request;
use App\Souscription;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contrat = Contrat::withTrashed()->where('project_id', $request->projet_link)->with('souscription')->with('produit')->first();
        
        $objet =  [
            'contrat' => $contrat,
            'compagnies' => Compagnie::all(),
            'produits' => Produit::all()
        ];
        return response()->json($objet);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function show(Contrat $contrat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $done = false;
        
        $contrat = null;
        $souscription = null;
        if ($request->etat_creation == "état : non contracté") {
            $contrat = new Contrat();
            $souscription = new Souscription();
        }else{
            $contrat = Contrat::withTrashed()
            ->where('project_id', $id)
            ->first();

            $souscription = $contrat->souscription;
        }
        $contrat->type = $request->type;
        $contrat->numero = $request->nbContrat;
        $contrat->produit_id = $request->formule;
        if ($request->etat_creation != "état : non contracté") {
            $contrat->project_id = $id;
        }
        
        $contrat->save();
       
        $souscription->typeContrat = $request->type ;
        $souscription->compagnie = Compagnie::find($request->compagnie)->nom;     
        $souscription->formule  = Produit::find($request->formule)->nom ;    
        $souscription->cotisationTotal  = $request->cotisation ;        
        $souscription->numSs = $request->nbSecurite ;     
        $souscription->numClient = $request->nbClient ;      
        $souscription->numContrat  = $request->nbContrat ;
        $souscription->dateSignature  = $request->dateSignature ;    
        $souscription->dateEffet  = $request->effet ;     
        $souscription->numAffiliate  = $request->nbAffiliation ;       
        $souscription->cBanque = $request->cBanque ;   
        $souscription->cAgence = $request->cAgence ;   
        $souscription->numCompte = $request->nbClient ;
        $souscription->cle  = $request->cle ;        
        $souscription->banque = $request->banque ;
        $souscription->adresse  = $request->adress ;   
        $souscription->iban = $request->iban ;
        $souscription->bic  = $request->bic ;
        $souscription->modePaiement  = $request->modePaiement ;
        $souscription->typePaiement  = $request->typePaiement ;
        $souscription->gratuiteCompagnie  = $request->compagnieGT ;    
        $souscription->remise  = $request->remise ;
        $souscription->fraisDoss  = $request->fraisDossier ;
        $souscription->aide_lois  = $request->aide_lois ;
        $souscription->paiementCb  = $request->paiementCB ;

        $souscription->save();
        if ($request->etat_creation != "état : non contracté") {
            $contrat->souscription_id = $souscription->id;
        }
        
        $contrat->save();

        $done = true;
        
        $this->store_histo("modifié","contrat et souscription",$id);

        $contrat = Contrat::withTrashed()->where('project_id', $id)->with('souscription')->with('produit')->first();

        $check = "";
        if (!$done) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'contrat' => $contrat,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrat $contrat)
    {
        //
    }

    public function store_histo($action,$composante,$project_id){
        
        $histo = new Historique();
        $histo->action = $action;
        $histo->composante = $composante;
        $histo->project_id = $project_id;
        $histo->user_id = Auth::user()->id;
        $histo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrat $contrat)
    {
        //
    }
}
