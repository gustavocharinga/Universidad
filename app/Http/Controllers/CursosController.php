<?php

namespace App\Http\Controllers;

use App\cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses=cursos::paginate();
        return response()->json([
            'cursos'=>$courses
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
        cursos::create($request->all());
        return response()->json([
            'mensaje'=>'Curso Creado'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show(cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit(cursos $cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, cursos $cursos)
    public function update(Request $request,$id)
    {
        //
        $curso=cursos::find($id);
        $curso->update($request->all());
        return response()->json([
            'mensaje'=>'Curso Actualizado'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    //public function destroy(cursos $cursos)
    public  function destroy($id)
    {
        //
        $curso=cursos::find($id);
        $curso->delete();
        return response()->json([
            'mensaje'=>'Curso Eliminado'
        ],200);
    }
}
