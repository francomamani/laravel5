<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\CompraMaterial;
class PersonalCompraMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     * api/personals/2/compra_materials - GET
     * @return \Illuminate\Http\Response
     */
    public function index($personal_id)
    {
        $compra_materiales = Personal::find($personal_id)->compraMateriales()
                            ->with('personal')
                            ->get();
        return response()->json($compra_materiales);
    }

    public function paginacion($personal_id)
    {
        return response()->json(Personal::find($personal_id)
                                        ->compraMateriales()
                                        ->paginate(2)
                                );
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
     * api/personals/1/compra_materials - POST
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($personal_id, Request $request)
    {
        //$personal = Personal::find($personal_id);
        $compra_material =  CompraMaterial::create([
                                'personal_id' => $personal_id,
                                'num_factura' => $request->input('num_factura'),
                                'fecha_compra' =>$request->input('fecha_compra')
                            ]);
        return response()->json($compra_material);
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
