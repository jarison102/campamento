<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\reviews;

class reviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "success"=> true,
             "data"=> reviews::all()
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //verificar los datos del payload
      return response()->json([
        "success"=>true,
        "data"=>reviews::create($request->all())
      ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            "success"=>true,
            "data"=>reviews::find($id)
        ],200);
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
         //1. consultar el bootcamp
     $b =reviews::find($id); 
     //2. actualizar el bootcamp
     $b->update($request->all());  
     //3. enviar el boot camp actualizado 
     return response()->json([
      "success"=>true,
      "data"=>$b
      
     ],200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b=reviews::find($id);
        $b->delete();
        return response()->json([
            "success"=>true,
            "data"=>$b
        ],200);
    }
}
