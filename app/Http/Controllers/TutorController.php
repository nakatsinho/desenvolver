<?php

namespace APDS\Http\Controllers;

use APDS\Models\Tutor;
use APDS\Models\TutorCurso;
use APDS\Models\User;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{
    use RedirectsUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.tutoregister');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.tutoregister');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function redirectTo()
    {
        $role = Auth::user();

        if($role->status_id == 1)
        {
            return ($role->role_id == '1')?'/admin':'/home';
        }
        else
        {
            return ($role->role_id == '1')?'/adminpanel':'/userpanel';
        }
    }

    public function store(Request $request)
    {
        $formInput = request()->except('foto');

        $formInput['role_id'] = 1;
        $formInput['status_id'] = 1;
        $formInput['password'] = bcrypt($request->password);

        $user = User::create($formInput);

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectTo());
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function registered(Request $request, $user)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \APDS\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $cursos = TutorCurso::where('user_id',$user->id)->get();
        return view('perfil.tutor.show',compact('user','cursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \APDS\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutor $tutor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \APDS\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutor $tutor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \APDS\Models\Tutor  $tutor   
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutor $tutor)
    {
        //
    }
}
