<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function register(Request $request){

    
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|min:5',
            'email' => 'required|unique:users,email',
            "password"=> "required|min:8",
            'username' => 'required|unique:users,username',
        ]);
        if ($validator->fails()) {
            return response( $validator-> errors());
        }
        $newUser = User::create($request->all());

        return response()->json([
            'data' => $newUser,
            'message' => 'Resigted account successfullly !',
            "status"=> 'success'
        ]);

    }

    public function login(Request $request){
      
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('accessToken',  ['*'], now()->addWeek())->plainTextToken;        
            return response()->json([
                'data' => ['userInfo' =>  $user,
                            "accessToken" =>  $token 
                          ],
                'message' => 'Successfully logged in',
                "status"=> 'success'
            ]);
        }
        
        return response()->json([
            'message' => 'Login failed !',
            "status"=> 'failed'
        ]);

      
       
    }
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out',
            'status' => "success"
    ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
