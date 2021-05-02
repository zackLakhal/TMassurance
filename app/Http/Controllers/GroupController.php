<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::withTrashed()->get();
        return response()->json($groups);
    }

    public function active_index()
    {
        $groups = Group::all();
        return response()->json($groups);
    }


    public function deleted()
    {

        $groups = Group::onlyTrashed();
        return response()->json($groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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

            'nom' => 'required|unique:groups',
        ]);


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
        }

        $group = new Group();
        $group->nom = $request->nom;
        $group->save();
        $check = "";
        $count = Group::all()->count();
        if (is_null($group)) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'count' => $count - 1,
            'group' => $group,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $edit, $id)
    {


        $done = false;
        if ($edit == "delete") {
            $group = Group::find($id);
            $group->delete();
            $done = true;
        }
        if ($edit == "restore") {
            $group = Group::onlyTrashed()
                ->where('id', $id)
                ->first();
            $group->restore();
            $done = true;
        }
        if ($edit == "edit") {
            $validator = Validator::make($request->all(), [

                'nom' => 'required|unique:groups',
            ]);


            if ($validator->fails()) {

                return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
            }

            $group = Group::withTrashed()
                ->where('id', $id)
                ->first();
            $group->nom = $request->nom;
            $group->save();
            $done = true;
        }

        $group = Group::withTrashed()
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
            'group' => $group,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
