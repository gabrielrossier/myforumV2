<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $admins = Role::getAdmins();
        return view ('roles.index')->with(compact("users","admins"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = new Role();
        return view ('role.create')->with(compact('role'));
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

    public function setAdmin($id)
    {
        $user = User::find($id);
        $users = User::all();
        $admins = Role::getAdmins();
        $roles = Role::all();
        foreach($roles as $role)
        {
            if($role->name == "Administrateur")
            {
                $user->role_id = $role->id;
                break;
            }
        }    
        $user->save();
        return view ('roles.index')->with(compact("users","admins"))->with('message','Admin ajouté');
    }

    public function unsetAdmin($id)
    {
        $user = User::find($id);
        $users = User::all();
        $admins = Role::getAdmins();
        $roles = Role::all();
        foreach($roles as $role)
        {
            if($role->name == "Stud")
            {
                $user->role_id = $role->id;
                break;
            }
        }    
        $user->save();
        return view ('roles.index')->with(compact("users","admins"))->with('message','Admin destitué');
    }

}
