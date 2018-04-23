<?php

namespace App\Http\Controllers;

use App\Estudiantes;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes=Estudiantes::paginate();
        return response()->json([
            'estudiantes'=>$estudiantes
        ],200);
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
    public function store(Request $request)
    {
        //
        Estudiantes::created()->json($request->all());
        return response()->json([
            'mensaje'=>'Estudiante Creado'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Estudiantes $estudiantes)
    public function update(Request $request, $id)
    {
        //
        $estudiante=Estudiantes::find($id);
        $estudiante->update($request->all());
        return response()->json([
            'mensaje'=>'Los datos del Estudiante han sido Actualizados'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    //public function destroy(Estudiantes $estudiantes)
    public function destroy($id)
    {
        //
        $estudiante=Estudiantes::find($id);
        $estudiante->delete();
        return response()->json([
            'mensaje'=>'Estudiante Borrado'
        ],200);
    }
}
