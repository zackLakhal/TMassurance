<?php

namespace App\Http\Controllers;

use App\Compagnie;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

    public function filtred_index(Request $request)
    {
        $produits = Produit::withTrashed()->where('compagnie_id',$request->compagnie_id)->get();
        return response()->json($produits);
    }

    public function index_product(Request $request)
    {
        $compagnie = Compagnie::withTrashed()
            ->where('id', $request->compagnie_id)
            ->first();

        $produits =  $produits = Produit::withTrashed()->where('compagnie_id',$compagnie->id)->get();
        return response()->json(['compagnie' => $compagnie, 'produits' => $produits]);
    }
    
    public function detail_compagnie($id)
    {
        $compagnie = Compagnie::withTrashed()->where('id', $id)->first();

        return response()->json($compagnie);
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
            'tel' => 'required',
        ]);


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
        }

        $compagnie = new Compagnie();
        $compagnie->email = $request->email;
        $compagnie->nom = $request->nom;
        $compagnie->tel = $request->tel;
        $compagnie->adresse = $request->adresse;
        $token = "";
       
            do {
                $token ='CP-'. Str::random(12);
            } while (Compagnie::where('token','=',$token)->first());
        $compagnie->token = $token;
        $compagnie->save();

        $compagnie = Compagnie::where('token','=',$token)->first();


        $check = "";
        $count = Compagnie::all()->count();
        if (is_null($compagnie)) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'count' => $count - 1,
            'compagnie' => $compagnie,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
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
    public function edit(Request $request, $id)
    {
        $done = false;
        if ($request->is('compagnie/edit/*')) {
            $validator = Validator::make($request->all(), [

                'email' => 'required',
                'nom' => 'required',
                'tel' => 'required',
            ]);
    
    
            if ($validator->fails()) {
    
                return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
            }
    
            $compagnie = Compagnie::find($id);
            $compagnie->email = $request->email;
            $compagnie->nom = $request->nom;
            $compagnie->tel = $request->tel;
            $compagnie->adresse = $request->adresse;
            $compagnie->save();

            if ($request->file('logo')) {
                $file = $request->file('logo');
                $image = time() . '.' . $file->getClientOriginalExtension();
                $path = $request->file('logo')->storeAs(
                    'compagnies',
                    $compagnie->id . "_" . $image,
                    'public'
                );
                $compagnie->logo = $path;
                $compagnie->save();
            } 

            $done = true;
        }
        if ($request->is('compagnie/delete/*')) {
            $compagnie = Compagnie::find($id);
            foreach ($compagnie->produits as  $produit) {
                $produit->delete();
            }
            $compagnie->delete();
            $done = true;
        }
        if ($request->is('compagnie/restore/*')) {
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

    public function edit_product(Request $request,$id_c,$id_p)
    {
        $done = false;
        if ($request->is('*/products/delete/*')) {

            $produit = Produit::find($id_p);
            $produit->delete();
            $done = true;

            
        }
        if ($request->is('*/products/restore/*')) {
            $produit = Produit::onlyTrashed()
                ->where('id', $id_p)
                ->first();
            $produit->restore();
            $done = true;
            
        }

        $produit = Produit::withTrashed()
            ->where('id', $id_p)
            ->first();

        $check = "";
        if (!$done) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'produit' => $produit
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
