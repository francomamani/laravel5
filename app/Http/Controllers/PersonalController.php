<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
class PersonalController extends Controller
{
    /**
     * Despliega todos los registros activos de la tabla personals
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*        return response()->json(Personal::orderBy('created_at', 'desc')
                                ->with('compraMateriales')
                                ->get());      */  
        return response()->json(Personal::orderBy('id', 'desc')->get());
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
     * @param  \Illuminate\Http\Request  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function store(Request $solicitud)
    {
        return response()->json(Personal::create( $solicitud->all() ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Personal::with('compraMateriales')->find($id));
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
        //encuentra el recurso con $id
        $personal = Personal::find($id);
        //actualizacion de campos
        $personal->fill($request->all());
        //guarda en la base de datos
        $personal->save();
        //devuelve el recurso actualizado
        return response()->json($personal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personal = Personal::find($id);
        $personal->delete();
        return response()->json([
                'exito' => 'El personal ' . $personal->nombres . ' ha sido eliminado'
            ]);
    }

    public function personalPorCarnet($carnet)
    {
        $personal = Personal::where('carnet', $carnet)->first();
        return response()->json($personal);
    }
    public function personalPorNombres($nombres)
    {
        $personal = Personal::where('nombres', $nombres)->get();
        return response()->json($personal);
    }

    public function personalPorApellidos($apellidos)
    {
        $personal = Personal::where('apellidos', 'like', '%'. $apellidos .'%')->get();
        return response()->json($personal);
    }
    public function personalPorIds()
    {
        $personal = Personal::find([2, 3]);
        return response()->json($personal);
    }

    public function personalPorNombresPorCargo($nombres, $cargo = null)
    {
        $personal = [];
        if ($cargo != null) {
            $personal = Personal::where('nombres', $nombres)
                                ->where('cargo', $cargo)
                                ->get();
        }else{
            $personal = Personal::where('nombres', $nombres)->get();
        }
        return response()->json($personal);

    }
    public function mostrarEliminados()
    {
        return response()->json(Personal::onlyTrashed()->get());
    }
    public function mostrarTodos()
    {
        return response()->json(Personal::withTrashed()->get());
    }
    public function restaurar($id)
    {
        $personal = Personal::onlyTrashed()->find($id);
        //restaura registro eliminado logicamente
        //poniendo en null deleted_at
        $personal->restore();
        return response()->json($personal);   
    }
    /*
        Devuelve las compra de materiales hechas por el personal con $personal_id como identificador
    */
    public function compraMateriales($personal_id)
    {
        $compra_materiales = Personal::find($personal_id)->compraMateriales()->get();
        return response()->json($compra_materiales);
    }
}
