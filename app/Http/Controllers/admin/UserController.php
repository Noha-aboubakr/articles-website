<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)  
    {   
        $data = $request->validate([  
            'firstname' => 'required|string|max:100',  
            'lastname' => 'required|string|max:100',  
            'username' => 'required|string|max:100',  
            'email' => 'required|email|max:100|unique:users,email',  
            'password' => 'required|string|min:5|confirmed', 
            'active' => 'nullable|boolean',   
        ]);  
        
        $data['password'] = Hash::make($data['password']);  
        $data['active']=isset($request->active);  
    
        User::create($data);  
        return redirect()->route('users.index');  
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)  
    {  
        $data = $request->validate([  
            'firstname' => 'required|string|max:100',  
            'lastname' => 'required|string|max:100',  
            'username' => 'required|string|max:100',  
            'email' => 'required|email|max:100',  
            'password' => 'nullable|string|min:5|confirmed', 
        ]);  
    
        if ($request->filled('password')) {  
            $data['password'] = Hash::make($data['password']);  
        }  
    
        $data['active']=isset($request->active);  
    
        User::where('id', $id)->update($data);  
        return redirect()->route('users.index');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
}

}