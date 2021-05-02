<?php

namespace App\Http\Controllers;

use App\Compagnie;
use App\Produit;
use Illuminate\Http\Request;

class CompagnieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compagnies = Compagnie::withTrashed()->get();
        return response()->json($compagnies);
    }

    public function index_product(Request $request)
    {
        $compagnie = Compagnie::withTrashed()
            ->where('id', $request->compagnie_id)
            ->first();

        $produits =  $produits = Produit::withTrashed()->where('compagnie_id',$compagnie->id)->get();
        return response()->json(['compagnie' => $compagnie, 'produits' => $produits]);
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
     * @param  \App\Compagnie  $compagnie
     * @return \Illuminate\Http\Response
     */
    public function show(Compagnie $compagnie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compagnie  $compagnie
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $edit, $id)
    {
        $done = false;
        if ($edit == "delete") {
            $compagnie = Compagnie::find($id);
            foreach ($compagnie->produits as  $produit) {
                $produit->delete();
            }
            $compagnie->delete();
            $done = true;
        }
        if ($edit == "restore") {
            $compagnie = Compagnie::onlyTrashed()
                ->where('id', $id)
                ->first();
            $produits = Produit::onlyTrashed()->where('compagnie_id',$compagnie->id)->get();
            foreach ($produits as  $produit) {
                $produit->restore();
            }
            $compagnie->restore();
            $done = true;
        }

        $compagnie = Compagnie::withTrashed()
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
            'compagnie' => $compagnie,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compagnie  $compagnie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compagnie $compagnie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compagnie  $compagnie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compagnie $compagnie)
    {
        //
    }
}
