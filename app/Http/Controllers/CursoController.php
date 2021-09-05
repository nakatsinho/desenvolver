<?php

namespace APDS\Http\Controllers;

use APDS\Models\Curso;
use APDS\Models\TutorCurso;
use APDS\Models\User;
use APDS\Models\UserCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos =  Curso::all();
        return view('cursos.index', compact('cursos'));
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
     * @param  \APDS\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::where('id', $id)->first();
        $overview = DB::table('overviews')->where('curso_id', $id)->first();
        $getTutor = TutorCurso::where('curso_id',$id)->get();
        $authUser = Auth::user();
        if (is_null($curso)) {
            abort(403, 'The package has not been found!');
        }

        $userBoughtCourse = false;
        if (!is_null($authUser)) {
            $userCourse = UserCurso::where('user_id', $authUser->id)->where('curso_id', $curso->id)->first();
            if (!is_null($userCourse)) {
                $userBoughtCourse = true;
            }
        }
        return view('cursos.show', compact('curso', 'overview','userBoughtCourse','getTutor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \APDS\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \APDS\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \APDS\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
    }
}
