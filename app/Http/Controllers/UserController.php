<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ValidationException;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Dotenv\Exception\ValidationException as ExceptionValidationException;
use Illuminate\Foundation\Auth\User as AuthUser;

class UserController extends Controller
{
    public function login(Request $request)
    {
     /* try{
           $this->validate($request, [
           'Username' => 'required|email|unique:users',
           'password' => 'required|string|min:8'
           ]);
         }catch(ExceptionValidationException $e){}*/

         $user = DB::table('users')->where('email', $request->get('email'))->first();

         if($user)
         {
             if($user->password === $request->input('password'))
             {
                return response()->json([
                    'oper' => 'ok',
                ]);
             }
            else{
                return response()->json([
                   'oper' => 'incorrect',
               ]);
               }
         }
        
    }
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Firstname'=>'required|string',
            'Lastname'=>'required|string',
            'Username'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
        ]);
     $user=new User();
     $user->Firstname = $request->input('Firstname');                         
     $user->Lastname = $request->input('Lastname');
     $user->Username = $request->input('Username');
     $user->email = $request->input('email');
     $user->password = $request->input('password'); 
     
     if($user->save())
     {
         return response()->json([
             'success'=>' Données enregistré'
         ]);
     }else{
         
         return response()->json([
             'error'=>' pas enregistré'
         ]);
     }

    }
}

  
