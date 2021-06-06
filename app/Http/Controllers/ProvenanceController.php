<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use App\Provenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class ProvenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provenances = Fournisseur::withTrashed()->get();
        return response()->json($provenances);
    }

    public function list($id){

        $provenances = Provenance::withTrashed()->where('fournisseur_id', $id)->get();
        return response()->json($provenances);
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

            'email' => 'required',
            'nom' => 'required',
        ]);


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
        }

        $temp = new Fournisseur();
        $temp->email = $request->email;
        $temp->nom = $request->nom;
        $token = "";
       
            do {
                $token ='FR-'. Str::random(12);
            } while (Fournisseur::where('token','=',$token)->first());
        $temp->token = $token;
        $temp->description = $request->description;
        $temp->save();

        $fournisseur = Fournisseur::withTrashed()->where('id','=',$temp->id)->first();


        $check = "";
        $count = Fournisseur::all()->count();
        if (is_null($fournisseur)) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'count' => $count - 1,
            'fournisseur' => $fournisseur,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provenance  $provenance
     * @return \Illuminate\Http\Response
     */
    public function show(Provenance $provenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provenance  $provenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $done = false;
        if ($request->is('fournisseur/edit/*')) {
            
            $validator = Validator::make($request->all(), [

                'email' => 'required',
                'nom' => 'required',
            ]);
    
    
            if ($validator->fails()) {
    
                return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
            }
    
            $temp = Fournisseur::find($id);
            $temp->email = $request->email;
            $temp->nom = $request->nom;
            $temp->description = $request->description;
            $temp->save();
            $done = true;
        }
        if ($request->is('fournisseur/delete/*')) {
            
            $fournisseur = Fournisseur::find($id);
            $fournisseur->delete();
            $done = true;
        }
        if ($request->is('fournisseur/restore/*')) {
            $fournisseur = Fournisseur::onlyTrashed()
                ->where('id', $id)
                ->first();
            $fournisseur->restore();
            $done = true;
        }

        $fournisseur = Fournisseur::withTrashed()
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
            'fournisseur' => $fournisseur,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provenance  $provenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provenance $provenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provenance  $provenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provenance $provenance)
    {
        //
    }
}
