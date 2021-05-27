<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use App\Provenance;
use Illuminate\Http\Request;

class ProvenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provenances = Provenance::withTrashed()->get();
        return response()->json($provenances);
    }

    public function list($id){
        $fournisseurs = Fournisseur::withTrashed()->where('provenance_id', $id)->get();
        return response()->json($fournisseurs);
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
        if ($request->is('provenance/delete/*')) {
            
            $provenance = Provenance::find($id);
            $provenance->delete();
            $done = true;
        }
        if ($request->is('provenance/restore/*')) {
            $provenance = Provenance::onlyTrashed()
                ->where('id', $id)
                ->first();
            $provenance->restore();
            $done = true;
        }

        $provenance = Provenance::withTrashed()
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
            'provenance' => $provenance,
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
