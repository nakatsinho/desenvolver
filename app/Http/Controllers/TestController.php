<?php

namespace APDS\Http\Controllers;

use APDS\Models\Curso;
use APDS\Models\Modulo;
use APDS\Models\Question;
use APDS\Models\QuestionsOption;
use APDS\Models\Test;   
use APDS\Models\TestAnswer;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Http\Request;

class TestController extends Controller
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
     * Store a newly solved Test in storage with results.
     *
     * @param  \Imof\Http\Requests\StoreResultsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = 0;

        $test = Test::create([
            'user_id' => FacadesAuth::id(),
            'result'  => $result,
        ]);

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            if ($request->input('answers.'.$question) != null
                && QuestionsOption::find($request->input('answers.'.$question))->correct
            ) {
                $status = 1;
                $result++;
            }
            TestAnswer::create([
                'user_id'     => FacadesAuth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),
                'correct'     => $status,
            ]);
        }

        $test->update(['result' => $result]);

        return redirect()->route('resultados.show', [$test->id]);
    }
    public function show($id)
    {
        // $questions = Question::inRandomOrder()->limit(10)->get();
        $questions = Question::where('modulo_id', $id)->inRandomOrder()->limit(10)->get();
        $module = Modulo::where('id',$id)->first();
        $curso = Curso::where('id',$module->curso_id)->first();
        foreach ($questions as &$question) {
            $question->options = QuestionsOption::where('question_id', $question->id)->inRandomOrder()->get();
        }
        
        return view('cursos.test.create', compact('questions','curso'));
    }

    public function update(Request $request)
    {
        $result = 0;

        $test = Test::create([
            'user_id' => FacadesAuth::id(),
            'result'  => $result,
        ]);

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            if ($request->input('answers.'.$question) != null
                && QuestionsOption::find($request->input('answers.'.$question))->correct
            ) {
                $status = 1;
                $result++;
            }
            TestAnswer::create([
                'user_id'     => FacadesAuth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),
                'correct'     => $status,
            ]);
        }

        $test->update(['result' => $result]);

        return redirect()->route('resultados.show', [$test->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \APDS\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
