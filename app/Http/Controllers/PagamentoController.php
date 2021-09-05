<?php

namespace APDS\Http\Controllers;

use APDS\Helpers\OrderDataHelper;
use APDS\Models\Curso;
use APDS\Models\Distrito;
use APDS\Models\Pagamento;
use APDS\Models\Pais;
use APDS\Models\Pedido;
use APDS\Models\Provincia;
use APDS\Models\TutorCurso;
use APDS\Models\User;
use APDS\Models\UserCurso;
use Illuminate\Http\Request;
use CalvinChiulele\MPesaMz\Facades\MPesaMz;
use Illuminate\Support\Facades\Auth;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $order = Pedido::latest()->first();
        $valor = $request->total;
        $contacto = $request->contacto;
        $user = User::where('id', $order->user_id)->first();

        $result = MPesaMz::payment('+258' . $contacto, $valor, "RENTFOOD,LDA", bin2hex(random_bytes(6)));

        // $query = MPesaMz::query(181917);

        if (!$result->getDescription() == "Internal Error") {
            return redirect()->back()->with('warning', $result->getDescription() . '' . 'Entre em contato com o desenvolvedor do site ou ');
        } else
            return view('cursos.checkout.update')->with('success', 'Pagamento efectuado com sucesso! Obrigado');

        dd(
            $result,
            $result->getTransactionStatus(),
            $result->getTransactionID(),
            $result->getCode(),
            $result->getDescription(),
            $result->getResponse(),
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \APDS\Models\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()) {
            return redirect()->route('login')->with('warning', 'Porfavor, faça o seu login antes de aceder aos cursos! Ou');
        }
        $curso = Curso::where('id', $id)->first();
        $user = User::where('id', Auth::user()->id)->first();
        $getTutor = TutorCurso::where('curso_id',$id)->get();
        $pais = Pais::pluck('nome','id');
        $distrito = Distrito::pluck('nome','id');
        $provincia = Provincia::pluck('nome','id');

        return view('cursos.checkout.index', compact('curso', 'user','getTutor','pais','distrito','provincia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \APDS\Models\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagamento $pagamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \APDS\Models\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::where('id', $id)->first();

        if (is_null($curso)) {
            abort(403, 'Curso Invalido!');
        }

        $authUser = Auth::user();
        $usercurso = UserCurso::where('user_id', $authUser->id)->where('curso_id', $curso->id)->first();
        if ((!is_null($usercurso)) && ($authUser->role->id != 1)) {
            abort(403, 'Voçe ja possui acesso para esse curso!');
        } else {

            $order = Pedido::latest()->first();
            $valor = $request->total;
            $contacto = $request->contacto;

            $result = MPesaMz::payment('+258' . $contacto, $valor, "RENTFOOD,LDA", bin2hex(random_bytes(6)));

            if (!$result->getDescription() == "Internal Error") {
                return redirect()->back()->with('warning', $result->getDescription() . '' . 'Entre em contato com o desenvolvedor do site ou ');
            } else {
                $transactionId = $request->transaction_id;
                $orderData = array();

                OrderDataHelper::getOrderData($orderData, $request, $authUser, $curso->nome, $transactionId);
                $orders = new Pedido();
                foreach ($orderData as $key => $orderValue) {
                    $orders->$key = $orderData[$key];
                }
                $orders->save();

                $userCurso = UserCurso::where('user_id', $authUser->id)->where('curso_id', $curso->id)->first();
                if (is_null($userCurso)) {
                    $newUserCurso = new UserCurso;
                    $newUserCurso->user_id = $authUser->id;
                    $newUserCurso->curso_id = $curso->id;
                    $newUserCurso->save();
                }
                return view('cursos.checkout.update', compact('curso'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \APDS\Models\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagamento $pagamento)
    {
        //
    }
}
