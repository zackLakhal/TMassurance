<?php

namespace App\Http\Controllers;

use App\Historique;
use App\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class TachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $taches = Tache::withTrashed()->where('project_id','=',$request->projet_link)->with('user')->get();
        return response()->json($taches);
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
        $validator = Validator::make($request->all(), [

            'tach_titre' => 'required',
            'tach_description' => 'required',
            'tach_echeance' => 'required',
            'tach_project_id' => 'required',
           
        ]);


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
        }

        $temp = new Tache();
        $temp->titre = $request->tach_titre;
        $temp->statut = "En cours";
        $temp->description = $request->tach_description;
        $temp->user_id = Auth::user()->id;
        $temp->project_id = $request->tach_project_id;
        $temp->dateEcheance = $request->tach_echeance;
        $temp->save();
        $this->store_histo("ajouté","tache",$temp->project_id);
        $tache = Tache::withTrashed()->where('id','=',$temp->id)->with('user')->first();
        $check = "";
        $count = Tache::all()->count();
        if (is_null($tache)) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'count' => $count - 1,
            'tache' => $tache,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function show(Tache $tache)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $edit, $id)
    {

        if ($edit == "delete") {
            $tache = Tache::find($id);
            $this->store_histo("supprimé","tache",$tache->project_id);
            $tache->delete();
           
            $done = true;
        }
        if ($edit == "restore") {
            $tache = Tache::onlyTrashed()
                ->where('id', $id)
                ->first();
                $this->store_histo("restoré","tache",$tache->project_id);
            $tache->restore();
            $done = true;
        }

        if ($edit == "edit") {
            $validator = Validator::make($request->all(), [

                'tach_titre' => 'required',
                'tach_status' => 'required',
                'tach_description' => 'required',
               
            ]);


            if ($validator->fails()) {

                return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
            }

            $temp = Tache::withTrashed()
                ->where('id', $id)
                ->first();
                $temp->titre = $request->tach_titre;
                $temp->statut = $request->tach_status;
                $temp->description = $request->tach_description;
                
                $temp->save();

                if ($request->filled('tach_echeance')) {
                    $temp->dateEcheance = $request->tach_echeance;
                    $temp->save();
                }
                $this->store_histo("modifié","tache",$temp->project_id);
            $done = true;
        }

        $tache = Tache::withTrashed()
            ->where('id', $id)->with('user')
            ->first();

        $check = "";
        if (!$done) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'tache' => $tache,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tache $tache)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tache $tache)
    {
        //
    }
}
