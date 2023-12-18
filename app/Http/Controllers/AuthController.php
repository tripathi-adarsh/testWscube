<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AlibPartnerAddressC;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use DB;
use App\RoleM;



class AuthController extends Controller
{

    //use AuthenticatesUsers;
   /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
  protected $username;

    public function __construct() {
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest', [ 'except' => 'logout' ]);
        $this->username = $this->findUsername();
    }

     public function findUsername() {
        $login = request()->input('login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        request()->merge([$fieldType => $login]);
        return $fieldType;
    }

       public function username() {
        return $this->username;
    }

    /*End login code!*/
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        
        $credentials = request(['email', 'password']);
        if(!Str::contains($request->email ,'@'))
        {
           $credentials['email'] =  User::where('username',$request->email)->get()->first()->email;
        }        
        if(!Auth::attempt($credentials))
        {
             return response()->json([
                'message' => 'User not found'
            ], 404);
        }   
        //get user details
        $user = $request->user();
        //get role details
        $role= AlibPartnerM::where('user_id',$user->id)->with('partnerRole')->get()->first();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
             'username' => $user->username,
             'role'=>$role->partnerRole->name,
            
        ]);
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }


     /*Start: create  users  */ 
    public function storeUsers(Request $request)
    {
        
        
    }
    
}
