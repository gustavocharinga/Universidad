<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cursos;
use Illuminate\Support\Facades\App;

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

    public function buscar(Request $request,$id){
        $id=$request['id'];
        $resultado= cursos::findOrFail($id)->coursePrelacion;
        //var_dump($resultado);
        if (@empty($resultado)){
            $resultado=null;
            return compact('resultado');
        };
        /*return response()->json([
            'prelacion'=> $resultado
        ],200);*/
        return compact('resultado');
    }

    public function registerPrelation(){
        $cursos = cursos::paginate();
        $cursoss = cursos::find('II0324V1');
        //$cursoss->coursePrelacion();
        //if(Auth::user()->hasRole('Administrador')){
        //var_dump($cursoss->coursePrelacion);
        /*foreach ($cursoss as $cursoss->coursePrelacion) {
             echo $cursoss->code_course_in;
        }*/

        //exit();
        //die();
            return view('cursos.prelacion', ['course' => $cursos,'cursoss'=>$cursoss]);
        //}elseif(Auth::user()->hasRole('Cliente')){
            //return view('/paquetesn', ['packages' => $packages]);
        //}else{
          //  return redirect('/');
        //}
    }
}
