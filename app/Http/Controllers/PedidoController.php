<?php

namespace APDS\Http\Controllers;

use APDS\Models\Curso;
use APDS\Models\Pedido;
use APDS\Models\UserCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userAuth = Auth::user();
        $pedidos = Pedido::leftJoin('cursos','pedidos.curso_id','=','cursos.id')
            ->where('pedidos.user_id',$userAuth->id)
            ->get();
        if(!is_null($pedidos)){
            return view('cursos.pedidos.index',compact('pedidos'));
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \APDS\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authUser = Auth::user();
        $curso = Curso::leftJoin('pedidos','cursos.id','=','pedidos.curso_id')
            ->where('cursos.id',$id)
            ->where('pedidos.user_id',$authUser->id)
            ->first();
        $status = UserCurso::where('curso_id',$curso->id)
            ->where('user_id',$curso->user_id)
            ->first();
        return view('cursos.pedidos.show', compact('curso','status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \APDS\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \APDS\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \APDS\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
