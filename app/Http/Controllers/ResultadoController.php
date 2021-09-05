<?php

namespace APDS\Http\Controllers;

use APDS\Models\Resultado;
use APDS\Models\Test;
use APDS\Models\TestAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
    }

    /**
     * Display a listing of Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Test::all()->load('user');

        $id = Auth::user()->id;

        $test = Test::find($id)->load('user');

        if ($test) {
            $results = Test::where('user_id', $id)
                ->get();
        }
        return view('cursos.resultados.index', compact('results'));
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
     * @param  \APDS\Models\Resultado  $resultado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id)->load('user');

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get();
        }
        return view('cursos.resultados.show', compact('test', 'results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \APDS\Models\Resultado  $resultado
     * @return \Illuminate\Http\Response
     */
    public function edit(Resultado $resultado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \APDS\Models\Resultado  $resultado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resultado $resultado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \APDS\Models\Resultado  $resultado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resultado $resultado)
    {
        //
    }
}
