<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cursos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function prueba(){
        return view('prueba');
    }

    public function indexcurso(){
        return view('cursos.index');
    }

    public function createCurso(){
        return view('cursos.create');
    }

    public function registerPrelation(){
        $cursos = cursos::paginate(10);
        $cursoss = cursos::coursePrelacion()->get();
        //if(Auth::user()->hasRole('Administrador')){
            return view('cursos.prelacion', ['course' => $cursos,'cursoss'=>$cursoss]);
        //}elseif(Auth::user()->hasRole('Cliente')){
            //return view('/paquetesn', ['packages' => $packages]);
        //}else{
          //  return redirect('/');
        //}
    }
}
