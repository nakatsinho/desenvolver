<?php

namespace APDS\Http\Controllers;

use APDS\Models\Curso;
use APDS\Models\Distrito;
use APDS\Models\Morada;
use APDS\Models\Pais;
use APDS\Models\Pedido;
use APDS\Models\Provincia;
use APDS\Models\User;
use APDS\Models\UserCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUser = Auth::user();
        $cursos = UserCurso::where('user_id', $authUser->id)->get();
        $todos = Curso::all();

        $recents = Pedido::where('user_id', $authUser->id)->orderBy('created_at', 'DESC')->limit(5)->get();
        $antigos = Pedido::where('user_id', $authUser->id)->orderBy('created_at', 'ASC')->limit(10)->get();
        return view('perfil.index', compact('cursos', 'todos', 'recents', 'antigos'));
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
        $user = User::findOrFail($id);
        $pais = Pais::pluck('nome', 'id');
        $provincia = Provincia::pluck('nome', 'id');
        $distrito = Distrito::pluck('nome', 'id');
        return view('perfil.edit', compact('user', 'pais', 'provincia', 'distrito'));
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
        $morada = Morada::leftJoin('users','moradas.user_id','=','users.id')
                        ->where('moradas.user_id', $id)
                        ->first();

        $authUser = Auth::user();
        $formInput = $request->except('foto');

        $image =  $request->foto;
        if (!is_null($image)) {
            $imageName = $image->getClientOriginalName();
            $image->move('assets/img/users', $imageName);
            $formInput['foto'] = $imageName;
        }

        if (is_null($morada)) {
            $novaMorada = new Morada();
            $novaMorada->local = $request->local;
            $novaMorada->user_id = $authUser->id;
            $novaMorada->pais_id = $request->pais_id;
            $novaMorada->provincia_id = $request->provincia_id;
            $novaMorada->distrito_id = $request->distrito_id;
            $novaMorada->save();
        } else {
            $morada->update([
                $morada->local = $request->local,
                $morada->pais_id = $request->pais_id,
                $morada->provincia_id = $request->provincia_id,
                $morada->distrito_id = $request->distrito_id,
            ]);
            $formInput['morada_id'] = $morada->id;
        }

        User::findOrFail($id)->update($formInput);

        return redirect()->back()->with('info', 'Dados do usuario actualizados com sucesso!');
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
