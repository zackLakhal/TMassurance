<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  null ;
        switch (auth()->user()->role_id) {
            case 1:
                $users = User::withTrashed()->with('role')->with('group')->get();
                break;
            
            case 4:
                $users = User::withTrashed()->where('group_id','=',auth()->user()->group_id)->with('role')->with('group')->get();
                break;
            case 3:
                $users = User::withTrashed()->whereNotIn('role_id',[1,3])->with('role')->with('group')->get();
                break;
        }

        
        return response()->json($users);
    }

    

    public function detail($id)
    {
        $user = User::withTrashed()->where('id', $id)->with('role')->with('group')->first();

        return response()->json($user);
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

    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|gt:0',
            'nom' => 'required|min:3',
            'prenom' => 'required',
            'tel' => 'required|max:8',
            'sexe' => 'required',
        ]);


        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
        }

        $user = new User();
        $temp = explode("@", $request->email);
        $user->name = $temp[0];
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role;
        $request->group != 0 ? $user->group_id = $request->group : $user->group_id = 999 ;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->tel = $request->tel;
        $user->sexe = $request->sexe;
        $user->save();

        $user = User::where('email', $request->email)->first();


        $check = "";
        $count = User::all()->count();
        if (is_null($user)) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'count' => $count - 1,
            'user' => $user,
            'role' => $user->role,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $done = false;
        if ($request->is('user/delete/*')) {

            $user = User::find($id);
            $user->delete();
            $done = true;
        }
        if ($request->is('user/restore/*')) {
            $user = User::onlyTrashed()
                ->where('id', $id)
                ->first();
            $user->restore();
            $done = true;
        }
        if ($request->is('user/edit/*')) {

            $user = User::withTrashed()
                ->where('id', $id)
                ->first();

            $validator = null;

            if ($request->filled('email') && $request->email == $user->email) {
                $validator = Validator::make($request->all(), [

                    'email' => 'required|email',
                    
                    'role' => 'required|gt:0',
                    'nom' => 'required',
                    'prenom' => 'required',
                    'tel' => 'required',
                    'sexe' => 'required',
                ]);
            } else {
                
                    $validator = Validator::make($request->all(), [

                        'email' => 'required|email|unique:users',
                        
                        'role' => 'required|gt:0',
                        'nom' => 'required',
                        'prenom' => 'required',
                        'tel' => 'required',
                        'sexe' => 'required',
                    ]);
               
            }

            if ($validator->fails()) {

                return response()->json(['error' => $validator->errors(), 'inputs' => $request->all()]);
            }

            $temp = explode("@", $request->email);
            $user->name = $temp[0];
            $user->email = $request->email;
            $user->role_id = $request->role;
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->tel = $request->tel;
            $request->group != 0 ? $user->group_id = $request->group : $user->group_id = 999 ;
            $user->sexe = $request->sexe;
            $user->save();

            if ($request->filled('adresse')) {
                $user->adresse = $request->adresse;
                $user->save();
            }

            if ($request->filled('dateNaissance')) {
                $user->dateNaissance = $request->dateNaissance;
                $user->save();
            }


            if ($request->file('photo')) {
                $file = $request->file('photo');
                $image = time() . '.' . $file->getClientOriginalExtension();
                $path = $request->file('photo')->storeAs(
                    'avatars',
                    $user->id . "_" . $image,
                    'public'
                );
                $user->photo = $path;
                $user->save();
            } 

            $done = true;
        }

        $user = User::withTrashed()
            ->where('id', $id)->with('role')->with('group')
            ->first();

        $check = "";
        if (!$done) {
            $check = "faile";
        } else {
            $check = "done";
        }

        $objet =  [
            'check' => $check,
            'user' => $user,
            'role' => $user->role,
            'inputs' => $request->all()
        ];
        return response()->json($objet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
