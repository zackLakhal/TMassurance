<?php

namespace App\Http\Controllers;

use App\Project;
use App\Prospect;
use App\Historique;
use App\Statut;
use App\Assure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Project::withTrashed()->get();
        $prospects = array();

        foreach ($projets as $projet) {
            $prospects[] = Prospect::withTrashed()->where('id', $projet->prospect_id)->with('provenance')->with('user')->first();
        }

        return response()->json(['prospects' => $prospects, 'projets' => $projets]);
    }

    public function histo_index(Request $request)
    {
        $historique = Historique::withTrashed()->where('project_id', '=', $request->projet_link)->with('user')->get();
        return response()->json($historique);
    }

    public function detail(Request $request)
    {
        $projet = Project::withTrashed()->where('id', $request->projet_link)->with('statut')->with('assures')->first();
        $prospet = Prospect::withTrashed()->where('id', $projet->prospect_id)->with('provenance')->with('user')->first();
        $statuts = Statut::all();
        $objet =  [
            'projet' => $projet,
            'prospet' => $prospet,
            'statuts' => $statuts
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

    public function store_assure(Request $request){

        $validator = Validator::make($request->all(), [

            'nom'=> 'required',
                'prenom'=> 'required',
                'affiliate'=> 'required',
                'civilite'=> 'required',
                'regime'=> 'required',
                'dateNaissance'=> 'required',
                'codeOrg'=> 'required',
                'securityNumb'=> 'required',
                'project_id'=> 'required'

        ]);


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
        }

        $temp = new Assure();
        $temp->nom = $request->nom;
        $temp->prenom = $request->prenom;
        $temp->affiliate = $request->affiliate;
        $temp->civilite = $request->civilite;
        $temp->regime = $request->regime;
        $temp->dateNaissance = $request->dateNaissance;
        $temp->codeOrg = $request->codeOrg;
        $temp->securityNumb = $request->securityNumb;
        $temp->project_id = $request->project_id;
        $temp->save();


        $this->store_histo("ajouté","assure",$temp->project_id);

        $assure = Assure::withTrashed()->where('id', '=', $temp->id)->first();
        $check = "";
        $count = Assure::all()->count();
        if (is_null($assure)) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'count' => $count - 1,
            'assure' => $assure,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }   

    public function edit_assure(Request $request, $id){
        $done = false;
        if ($request->is('assure/delete/*')) {

            $assure = Assure::find($id);
            $assure->delete();
            $done = true;

            
            $this->store_histo("supprimé","assure",$assure->project_id);
        }
        if ($request->is('assure/restore/*')) {
            $assure = Assure::onlyTrashed()
                ->where('id', $id)
                ->first();
            $assure->restore();
            $done = true;
            
            $this->store_histo("restoré","assure",$assure->project_id);
        }

        if($request->is('assure/edit/*')){
            $validator = Validator::make($request->all(), [

                    'nom'=> 'required',
                    'prenom'=> 'required',
                    'affiliate'=> 'required',
                    'civilite'=> 'required',
                    'regime'=> 'required',
                    'dateNaissance'=> 'required',
                    'codeOrg'=> 'required',
                    'securityNumb'=> 'required',
    
            ]);
    
    
            if ($validator->fails()) {
    
                return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
            }
    
            $temp = Assure::withTrashed()
            ->where('id', $id)
            ->first();
            $temp->nom = $request->nom;
            $temp->prenom = $request->prenom;
            $temp->affiliate = $request->affiliate;
            $temp->civilite = $request->civilite;
            $temp->regime = $request->regime;
            $temp->dateNaissance = $request->dateNaissance;
            $temp->codeOrg = $request->codeOrg;
            $temp->securityNumb = $request->securityNumb;
            $temp->save();
            $done = true;
    
            $this->store_histo("modifié","assure",$temp->project_id);
        }

        $assure = Assure::withTrashed()
        ->where('id', $id)
        ->first();

        $check = "";
        if (!$done) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'assure' => $assure,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Project $Project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $done = false;
        
        $project = Project::withTrashed()
            ->where('id', $id)
            ->first();

        $prospet = Prospect::withTrashed()->where('id', $project->id)->with('provenance')->with('user')->first();

        $project->type = $request->typeAssurance;
        $project->status_gestion = $request->statut_gestion_dup;
        $project->statut_id = $request->statut_dup;
        $project->save();

        $prospet->nom = $request->nom;
        $prospet->prenom = $request->prenom;
        $prospet->email = $request->email;
        $prospet->situation = $request->situation;
        $prospet->regime = $request->regime;
        $prospet->tel = $request->telport;
        $prospet->codePostale = $request->codepostale;
        $prospet->ville = $request->ville;
        $prospet->adress = $request->adress;
        $prospet->activite = $request->activite;
        $prospet->tel2 = $request->tel2;
        $prospet->sexe = $request->sexe;
        $prospet->categoryProf = $request->categorieprof;
        $prospet->nbreEnfant = $request->nbrEnfant;
        $prospet->typeAssurance = $request->projet_typeAssurance;
        $prospet->disponibilite = $request->dispo;
        $prospet->dateNaissance = $request->datenaissance;
        $prospet->wishes = $request->intertcomp;

        $prospet->save();

        $done = true;
        
        
        $projet = Project::withTrashed()->where('id', $id)->with('statut')->with('assures')->first();
        $prospet = Prospect::withTrashed()->where('id', $projet->prospect_id)->with('provenance')->with('user')->first();

        $this->store_histo("modifié","projet",$projet->id);

        $check = "";
        if (!$done) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'projet' => $projet,
            'prospet' => $prospet,
            'statuts' => Statut::all(),
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $Project)
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
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $Project)
    {
        //
    }
}
