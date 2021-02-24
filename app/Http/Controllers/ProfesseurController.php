<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professeur;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Professeur::all();
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
     $professeur=new Professeur();
     $professeur->FirstName = $request->input('FirstName');                         
     $professeur->LastName = $request->input('LastName');
     $professeur->Email = $request->input('Email');
     $professeur->UserName = $request->input('UserName');
     $professeur->PassWord = $request->input('PassWord'); 
     
     if($professeur->save())
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
}
