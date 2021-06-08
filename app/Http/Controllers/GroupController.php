<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Group;
use App\User;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::withTrashed()->where('id', '<>', 999)->get();
        return response()->json($groups);
    }

    public function active_index()
    {
        $groups = Group::where('id', '<>', 999)->get();
        return response()->json($groups);
    }


    public function deleted()
    {

        $groups = Group::onlyTrashed()->where('id', '<>', 999)->get();
        return response()->json($groups);
    }

    public function index_users($id_g)
    {
        $users =  null;
        $supervisor = null;

        $users = User::withTrashed()->where([['group_id', '=', $id_g], ['role_id', '<>', 4]])->with('role')->get();
        $supervisor = User::withTrashed()->where([['group_id', '=', $id_g], ['role_id', '=', 4]])->with('role')->first();

        $objet =  [
            'users' => $users,
            'supervisor' => $supervisor
        ];

        return response()->json($objet);
    }

    public function list_sup($id_g)
    {
        $supervisors = User::withTrashed()->where([['group_id', '<>', $id_g], ['role_id', '=', 4]])->with('role')->get();
        return response()->json($supervisors);
    }

    public function list_user(Request $request, $id_g)
    {
        $users = User::withTrashed()->where([['id', '<>', $request->user_id], ['group_id', '<>', $id_g], ['role_id', '<>', 4]])->with('role')->get();
        return response()->json($users);
    }

    public function attach_sup(Request $request, $id_g)
    {
        $old_supervisor = User::withTrashed()->where([['group_id', '=', $id_g], ['role_id', '=', 4]])->with('role')->first();
        if ($old_supervisor != null) {
            $old_supervisor->group_id = 999;
            $old_supervisor->save();
        }
        $new_supervisor = User::withTrashed()->where('id', '=', $request->new_sup)->with('role')->first();
        $new_supervisor->group_id = $id_g;
        $new_supervisor->save();
        return response()->json($new_supervisor);
    }
    public function attach_user(Request $request, $id_g)
    {
        $old_user = User::withTrashed()->where('id', '=', $request->user_id)->with('role')->first();
        if ($old_user != null) {
            $old_user->group_id = 999;
            $old_user->save();
        }
        $new_user = User::withTrashed()->where('id', '=', $request->new_user)->with('role')->first();
        $new_user->group_id = $id_g;
        $new_user->save();
        $count =  User::withTrashed()->where([['group_id', '=', $id_g], ['role_id', '<>', 4]])->count();
        $objet =  [
            'old_user' => $old_user,
            'count' => $count - 1,
            'new_user' => $new_user
        ];
        return response()->json($objet);
    }

    public function detach_sup($id_g)
    {
        $old_supervisor = User::withTrashed()->where([['group_id', '=', $id_g], ['role_id', '=', 4]])->with('role')->first();
        if ($old_supervisor != null) {
            $old_supervisor->group_id = 999;
            $old_supervisor->save();
        }
        $new_supervisor = User::withTrashed()->where([['group_id', '=', $id_g], ['role_id', '=', 4]])->with('role')->first();
        return response()->json($new_supervisor);
    }

    public function detach_user(Request $request, $id_g)
    {
        $old_user = User::withTrashed()->where('id', '=', $request->user_id)->with('role')->first();
        if ($old_user != null) {
            $old_user->group_id = 999;
            $old_user->save();
        }

        return response()->json($old_user);
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
        $count = Group::all()->count() - 1;
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
            $users = User::withTrashed()->where('group_id', '=', $id)->get();

            foreach ($users as $user) {
                $user->group_id = 999;
                $user->save();
            }
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
