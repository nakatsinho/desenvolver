<?php

namespace APDS\Http\Controllers;

use APDS\Models\Capitulo;
use APDS\Models\Curso;
use APDS\Models\Modulo;
use APDS\Models\ModuloTestType;
use APDS\Models\ModuloType;
use APDS\Models\Question;
use APDS\Models\QuestionsOption;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulo = Modulo::all();
        return view ('cursos.modulos.index', compact('modulo'));
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
     * @param  \APDS\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nome = Curso::select('nome')->where('id',$id)->first();
        $modulo =  Modulo::where('curso_id',$id)->get();
        $capitulos = Capitulo::where('curso_id',$id)->get();
        
        return view('cursos.modulos.show',compact('nome','capitulos','modulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \APDS\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulo $modulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \APDS\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modulo $modulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \APDS\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulo $modulo)
    {
        //
    }
}
