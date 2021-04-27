<?php

namespace App\Http\Controllers;

use App\Statut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuts = Statut::withTrashed()->get();
        return response()->json($statuts);
    }

    public function deleted()
    {

        $statuts = Statut::onlyTrashed()->get();
        return response()->json($statuts);
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

            'crmStatut' => 'required|unique:statuts',
        ]);


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
        }

        $statut = new Statut();
        $statut->crmStatut = $request->crmStatut;
        $statut->save();
        $check = "";
        $count = Statut::all()->count();
        if (is_null($statut)) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'count' => $count - 1,
            'statut' => $statut,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function show(Statut $statut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $edit, $id)
    {
        $done = false;
        if ($edit == "delete") {
            $statut = Statut::find($id);
            $statut->delete();
            $done = true;
        }
        if ($edit == "restore") {
            $statut = Statut::onlyTrashed()
                ->where('id', $id)
                ->first();
            $statut->restore();
            $done = true;
        }
        if ($edit == "edit") {
            $validator = Validator::make($request->all(), [

                'crmStatut' => 'required|unique:statuts',
            ]);


            if ($validator->fails()) {

                return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
            }

            $statut = Statut::withTrashed()
                ->where('id', $id)
                ->first();
            $statut->crmStatut = $request->crmStatut;
            $statut->save();
            $done = true;
        }

        $statut = Statut::withTrashed()
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
            'statut' => $statut,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statut $statut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statut  $statut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statut $statut)
    {
        //
    }
}
