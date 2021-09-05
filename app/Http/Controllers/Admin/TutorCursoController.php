<?php

namespace APDS\Http\Controllers\Admin;

use Illuminate\Http\Request;
use APDS\Http\Controllers\Controller;
use APDS\Models\Curso;
use APDS\Models\TutorCurso;
use Illuminate\Support\Facades\Auth;

class TutorCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::pluck('nome', 'id');
        $tutoria = TutorCurso::where('user_id', Auth::user()->id)->get();

        return view('admin.cursos.tutor.index', compact('cursos', 'tutoria'));
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
        $formInput = $request->except('foto');

        $nome = Curso::where('id', $request->curso_id)->first();
        $tutoria = TutorCurso::all();

        foreach ($tutoria as $value) {
            if (!null) {
                if (Auth::user()->id == $value->user_id && $value->curso_id == $nome->id) {
                    return redirect()->back()->with('warning', 'Ja foi inscrito como monitor desse Modulo');
                } else {
                    $formInput['nome'] = $nome->nome;
                    TutorCurso::create($formInput);

                    return redirect()->back()->with('info', 'Associou-se ao curso como monitor com sucesso!');
                }
            }
        }
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
