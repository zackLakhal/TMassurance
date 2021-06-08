<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use App\Prospect;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Project;
use App\Provenance;
use App\User;
use Illuminate\Support\Facades\Validator;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prospects = null;
        switch (auth()->user()->role_id) {
            case 1:
                $notadmins = User::where('role_id', '<>', 1)->pluck('id')->toArray();
                $prospects = Prospect::withTrashed()->where('user_id', '=', auth()->user()->id)->orWhereIn('user_id', $notadmins)->with('provenance')->with('user')->get();
                break;
            case 2:
                $prospects = Prospect::where('user_id', '=',auth()->user()->id)->with('provenance')->with('user')->get();
                break;
            case 3:
                $prospects = Prospect::withTrashed()->with('provenance')->with('user')->get();
                break;

            case 4:
                $users =  User::where('group_id', '=', auth()->user()->group_id)->pluck('id')->toArray();
                $prospects = Prospect::whereIn('user_id', $users)->with('provenance')->with('user')->get();
                break;
        }


        return response()->json($prospects);
    }

    public function list_commercial(Request $request)
    {
        $commercials = User::where([['role_id', '=', 2], ['id', '<>', $request->user_id]])->get();

        return response()->json($commercials);
    }

    public function detail($id)
    {
        $prospect = Prospect::withTrashed()->where('id', $id)->with('provenance')->with('user')->first();

        return response()->json($prospect);
    }


    public function confirmer(Request $request, $id)
    {
        $done = false;
        $prospect = Prospect::find($id);
        $prospect->is_confirmed = true;
        $prospect->dateConfirmation = Carbon::now();

        $prospect->save();

        $projet = new Project();
        $projet->type = $request->project_type;
        $projet->statut_id = 1;
        $projet->prospect_id = $id;

        $projet->save();

        $prospect = Prospect::withTrashed()->where('id', $id)->with('provenance')->with('user')->first();
        $done = true;
        $check = "";
        if (!$done) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'prospect' => $prospect,
            'inputs' => $request->all()
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
    public function api_save(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'provenance' => 'required'

        ]);


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
        }

        $provenanceObj = Provenance::where('nom', '=', $request->provenance)->first();
        $fournisseur = Fournisseur::where('id', '=', $provenanceObj->fournisseur_id)->first();
        $temp = new Prospect();
        $temp->nom = $request->nom;
        $temp->prenom = $request->prenom;
        $temp->email = $request->email;
        $temp->tel = $request->tel;
        $temp->provenance_id = $provenanceObj->id;
        $temp->token_fr = $fournisseur->token;
        $users = User::where('role_id', '=', 1)->pluck('id')->toArray();
        $temp->user_id = $users[rand(1, count($users) - 1)];
        $temp->save();


        $prospect = Prospect::withTrashed()->where('id', '=', $temp->id)->first();
        $check = "";
        if (is_null($prospect)) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'Prospect' => $prospect,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function show(Prospect $prospect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $done = false;
        if ($request->is('prospect/delete/*')) {

            $prospect = Prospect::find($id);
            $prospect->delete();
            $done = true;
        }
        if ($request->is('prospect/restore/*')) {
            $prospect = Prospect::onlyTrashed()
                ->where('id', $id)
                ->first();
            $prospect->restore();
            $done = true;
        }

        if ($request->is('prospect/affecter/*')) {
            $prospect = Prospect::withTrashed()
                ->where('id', $id)
                ->first();
            $prospect->user_id = $request->user_id;
            $prospect->save();
            $done = true;
        }

        $prospect = Prospect::withTrashed()
            ->where('id', $id)->with('provenance')->with('user')
            ->first();

        $check = "";
        if (!$done) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'prospect' => $prospect,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prospect $prospect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prospect  $prospect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospect $prospect)
    {
        //
    }
}
