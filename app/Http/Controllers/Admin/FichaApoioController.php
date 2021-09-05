<?php

namespace APDS\Http\Controllers\Admin;

use APDS\Http\Controllers\Controller;
use APDS\Models\Curso;
use APDS\Models\FichaApoio;
use APDS\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FichaApoioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fichas = FichaApoio::where('user_id',Auth::user()->id)->get();
        return view('admin.cursos.ficha.index',compact('fichas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = Curso::pluck('nome','id');
        $modulo = Modulo::pluck('nome','id');
        return view('admin.cursos.ficha.create',compact('curso','modulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('path','user_id');
        $this->validate($request, [
            'nome' => ['required', 'string'],
        ]);

        $image =  $request->path;
        $imageName = $image->getClientOriginalName();
        $image->move('adminn/assets/img/files', $imageName);
        $formInput['path'] = $imageName;
        
        $formInput['user_id'] = Auth::user()->id;
        FichaApoio::create($formInput);

        $to_email = Auth::user()->email;
        $name = $request->surname;

        return redirect()->route('admin.ficha.index')->with('info','Ficheiro submetido com sucesso!');
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
