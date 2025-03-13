<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('bookingsystem.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bookingsystem.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $userRoles = $user->roles->pluck('name','name')->all();
        $roles = Role::pluck('name','name')->all();
        return view('bookingsystem.users.edit',compact('user','roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {   
        $request->validate([
            'first_name'=>'required|string|max:255',
            'second_name'=>'required|string|max:255',
            'email'=>'required|string|max:255',
            'phone_number'=> 'required|string|max:14',
            'roles'=>'required',
        ]);

        $data = [
            'first_name'=> $request->first_name,
            'second_name'=> $request->second_name,
            'email'=> $request->email,
            'phone_number'=> $request->phone_number,
            'credit'=>$request->credit,
            'roles[]'=> $request->role_id,
        ];
        
        $user->update($data);
        $user->syncRoles($request->roles);
        
        return redirect('users')->with('success','Room updated correctly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect('users')->with('status','User deleted successfully');
    }
}
