<?php

namespace App\Http\Controllers;

use App\Document;
use App\Historique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $documents = Document::withTrashed()->where('project_id', '=', $request->projet_link)->get();

        return response()->json($documents);
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
            'doc_type' => 'required',
            'doc_file' => 'required'
        ]);


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
        }

        $document = new Document();
        $document->type = $request->doc_type;
        $document->project_id = $request->doc_project_id;
        $file = $request->file('doc_file');
        $document->size = $file->getSize();
        $document->ext = $file->getClientOriginalExtension();
        $nom =  time()."" .$file->getClientOriginalName();
        $document->nom = $nom;
        $path = $request->file('doc_file')->storeAs(
            'documents',
            $nom,
            'public'
        );
        $document->path = $path;
        $document->save();

        $document = DB::table('documents')->where('project_id', $request->doc_project_id)->latest()->first();

        $check = "";
        $count = Document::where('project_id', $request->doc_project_id)->get()->count();
        if (is_null($document)) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'count' => $count - 1,
            'document' => $document,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$edit,$id)
    {
        if ($edit == "delete") {
           
            $temp = Document::withTrashed()
                ->where('id', $id)
                ->first();
                $temp->delete() ;
               
                $this->store_histo("supprimé","document",$temp->project_id);
                $temp->save();
            $done = true;
        }

        $document = Document::withTrashed()
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
            'document' => $document,
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
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
