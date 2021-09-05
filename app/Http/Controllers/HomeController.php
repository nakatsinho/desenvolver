<?php

namespace APDS\Http\Controllers;

use APDS\Models\Curso;
use APDS\Models\Pedido;
use APDS\Models\TutorCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $cursos = Curso::where('id',1)->get();
        $authUser = Auth::user();
        $cursos = Pedido::leftJoin('cursos', 'pedidos.curso_id','=','cursos.id')
            ->where('pedidos.user_id',$authUser->id)
            ->orderBy('pedidos.id', 'DESC')
            ->paginate(6);
        return view('home',compact('cursos'));
    }
}
