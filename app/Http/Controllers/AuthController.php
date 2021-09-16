<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use DB;

class AuthController extends Controller
{
    
 /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('JWT', ['except' => ['login','signup']]);
    }

    // 

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    { //echo '<pre>'.print_r($request).'</pre>';exit;

         $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $user->createToken($request->device_name)->plainTextToken;
        /*$token = $user->createToken($request->device_name)->plainTextToken;
        $response = [
            'user'=>$user,
            'token' =>$token
        ];

        return response ($response, 201); */
    }


    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {  
        //auth()->logout();

        //return response()->json(['message' => 'Successfully logged out']);

        $request->user()->currentAccessToken()->delete();

        return response()->json(['msg' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }



    public function register(Request $request){
     
     $validateData = $request->validate([
       'email' => 'required|unique:users|max:255',
       'first_name' => 'required',
       'password' => 'required|min:6|confirmed'

     ]);

     $data = array();
     $data['name'] = $request->first_name;
     $data['email'] = $request->email;
     $data['password'] = Hash::make($request->password);
     DB::table('users')->insert($data);

     return $this->login($request);



    }




    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'first_name' => auth()->user()->name,
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
        ]);
    }








}
 