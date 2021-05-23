<?php

namespace App\Http\Controllers;

use App\Historique;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notes = Note::withTrashed()->where('project_id', '=', $request->projet_link)->with('user')->get();

        return response()->json($notes);
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

            'note_titre' => 'required',
            'note_description' => 'required',
            'note_project_id' => 'required',

        ]);


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
        }

        $temp = new Note();
        $temp->titre = $request->note_titre;
        $temp->note = $request->note_description;
        $temp->user_id = Auth::user()->id;
        $temp->project_id = $request->note_project_id;
        $temp->save();
        $this->store_histo("ajouté","note",$temp->project_id);

        $note = Note::withTrashed()->where('id', '=', $temp->id)->with('user')->first();
        $check = "";
        $count = Note::all()->count();
        if (is_null($note)) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'count' => $count - 1,
            'note' => $note,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $edit, $id)
    {
        if ($edit == "edit") {
            $validator = Validator::make($request->all(), [

                'note_titre' => 'required',
                'note_description' => 'required',
               
            ]);


            if ($validator->fails()) {

                return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
            }

            $temp = Note::withTrashed()
                ->where('id', $id)
                ->first();
                $temp->titre = $request->note_titre;
                $temp->note = $request->note_description;
                $this->store_histo("modifié","note",$temp->project_id);
                $temp->save();
            $done = true;
        }

        $note = Note::withTrashed()
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
            'note' => $note,
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
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
