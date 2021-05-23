<?php

namespace App\Http\Controllers;

use App\Historique;
use App\Rappel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class RappelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rappels = Rappel::withTrashed()->where('project_id', '=', $request->projet_link)->with('user')->get();

        return response()->json($rappels);
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

            'rappel_titre' => 'required',
            'rappel_sujet' => 'required',
            'rappel_date_rappel' => 'required',

        ]);

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
        }

        $temp = new Rappel();
        $temp->titre = $request->rappel_titre;
        $temp->sujet = $request->rappel_sujet;
        $temp->dateRappel = $request->rappel_date_rappel;
        $temp->project_id = $request->rappel_project_id;
        $temp->user_id = Auth::user()->id;
        
        $temp->save();
        $this->store_histo("ajouté","rappel",$temp->project_id);
        $rappel = Rappel::withTrashed()->where('id', '=', $temp->id)->with('user')->first();
        $check = "";
        $count = Rappel::all()->count();
        if (is_null($rappel)) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'count' => $count - 1,
            'rappel' => $rappel,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rappel  $rappel
     * @return \Illuminate\Http\Response
     */
    public function show(Rappel $rappel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rappel  $rappel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $edit, $id)
    {


        $done = false;
        if ($edit == "delete") {
            $rappel = Rappel::find($id);
            $this->store_histo("supprimé","rappel",$rappel->project_id);
            $rappel->delete();
            $done = true;
        }
        if ($edit == "restore") {
            $rappel = Rappel::onlyTrashed()
                ->where('id', $id)
                ->first();
            $this->store_histo("restoré","rappel",$rappel->project_id);
            $rappel->restore();
            $done = true;
        }
        if ($edit == "edit") {
            $validator = Validator::make($request->all(), [

                'rappel_titre' => 'required',
                'rappel_sujet' => 'required',
                'rappel_date_rappel' => 'required',
               
            ]);


            if ($validator->fails()) {

                return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
            }

            $temp = Rappel::withTrashed()
                ->where('id', $id)
                ->first();
                $temp->titre = $request->rappel_titre;
                $temp->sujet = $request->rappel_sujet;
                
                $temp->save();
                $this->store_histo("modifié","rappel",$temp->project_id);
                if ($request->filled('rappel_date_rappel')) {
                    $temp->dateRappel = $request->rappel_date_rappel;
                    $temp->save();
                }
            $done = true;
        }

        $rappel = Rappel::withTrashed()
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
            'rappel' => $rappel,
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
     * @param  \App\Rappel  $rappel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rappel $rappel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rappel  $rappel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rappel $rappel)
    {
        //
    }
}
