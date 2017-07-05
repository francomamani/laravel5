<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importo el modelo
use App\CompraMaterial;
class CompraMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(CompraMaterial::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $solicitud)
    {
        $compra_materiales = CompraMaterial::create($solicitud->all());
        return response()->json($compra_materiales);
    }

    /**
     * Display the specified resource.
     * api/personals/{personal_id}/compra_materials/{id}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($personal_id, $id)
    {
        $compra_material = CompraMaterial::where('personal_id', $personal_id)
                              ->where('id', $id)
                              ->firstOrFail();
        return response()->json($compra_material);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * api/personals/1/compra_materials/1   -   VERBO PUT
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $personal_id)
    {
        $compra_material = CompraMaterial::where('personal_id', $personal_id)
                                        ->where('id', $id)
                                        ->firstOrFail();
        $compra_material->fill($request->all());
        $compra_material->save();
        return response()->json($compra_material);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($personal_id, $id)
    {
        $compra_material = CompraMaterial::where('personal_id', $personal_id)
                                        ->where('id', $id)
                                        ->firstOrFail();
        $compra_material->delete();
        return response()->json(['exito'=> 'Compra id:'.$compra_material->id.' eliminada']); 
    }
}
