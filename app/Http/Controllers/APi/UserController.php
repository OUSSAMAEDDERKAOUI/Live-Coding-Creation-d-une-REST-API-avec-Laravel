<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
            return response()->json($users,200);

     
    }

 
    public function store(Request $request)
    {
$validateData=$request->validate([
    'name'=>'required|max:100',
    'email'=>'required|email|unique:users',
    'password'=>'required|min:8',
]);
$user= User::create([
    'name'=>$validateData['name'],
    'email'=>$validateData['email'],
    'password'=>bcrypt($validateData['password']),
]);

return response()->json($user,201);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validation des champs fournis dans la requête
        $validateData = $request->validate([
            'name' => 'required|string|max:100', 
            'email' => 'nullable|email|unique:users,email,' . $user->id, 
            'password' => 'nullable|min:8', 
        ]);
    
        if ($request->has('name')) {
            $user->name = $validateData['name'];
        }
    
        if ($request->has('email')) {
            $user->email = $validateData['email'];
        }
    
        if ($request->has('password')) {
            $user->password = bcrypt($validateData['password']);
        }
    
        $user->save();
    
        return response()->json($user); 
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
$user->delete();
return response()->json();
}
}
