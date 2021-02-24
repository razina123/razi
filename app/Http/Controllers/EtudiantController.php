<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Dotenv\Exception\ValidationException as ExceptionValidationException;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $this->validate($request, [
            'FirstName'=>'required|string',
            'LastName'=>'required|string',
            'Email'=>'required|string',
            'UserName'=>'required|string',
            'PassWord'=>'required|string',
        ]);
     $etudiant=new Etudiant();
     $etudiant->FirstName = $request->input('FirstName');                         
     $etudiant->LastName = $request->input('LastName');
     $etudiant->Email = $request->input('Email');
     $etudiant->UserName = $request->input('UserName');
     $etudiant->PassWord = $request->input('PassWord'); 
     
     if($etudiant->save())
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

    public function login(Request $request){
    try{
        $this->validate($request, [
        'Username' => 'required|email|unique:_etudiant',
        'password' => 'required|string|min:8'
        ]);
      }catch(ExceptionValidationException $e){}

      $user = Etudiant::where('Username', $request->get('Username'))->first();

      if($user)
      {
          if($user->password === $request->input('password'))
          {
            return response()->json([
                'success' => ' accepter ',
            ],200);
          }else{
              return response()->json([
                  'failed' => ' Password Invalid ',
              ],404);
               }
      }else{
          return response()->json([
              'failed' => ' Email non valid ',
          ],404);
      }

    }
}
