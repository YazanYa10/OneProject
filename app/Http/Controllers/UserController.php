<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showuser()
    {
        return view('content.info');
    }
    public function index()
    {
        //
        $users = User::all();
        return view('content.showusers',compact('users'));
    }
    public function addRole(Request $request){
        $user = User::where('id',$request->id)->first();
        $user->roles()->detach();
        if(!empty($request->role_user) ){
            $user->roles()->attach(Role::where('name','user')->first());
        }
        if(!empty($request->role_editor)){
            $user->roles()->attach(Role::where('name','Editor')->first());
        }
        if(!empty($request->role_admin)){
            $user->roles()->attach(Role::where('name','admin')->first());
        }
        return back();
    }
    public function indexeditor()
    {
        $users = User::all();
        return view('content.showuserseditor',compact('users'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
