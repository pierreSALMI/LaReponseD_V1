<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quiz;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use http\Exception\InvalidArgumentException;
use function Symfony\Component\HttpKernel\Tests\Controller\controller_function;
use function Symfony\Component\HttpKernel\Tests\controller_func;
use Illuminate\Support\Facades\Session;


class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quizBlade.quiz');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('quizBlade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedQuiz = $request->validate([
            'titre' => 'required',
            'theme' => 'required',
        ]);

        $newQuiz = new Quiz;

        $newQuiz->titre = $request->titre;
        $newQuiz->theme = $request->theme;
        $newQuiz->user_id = Auth::user()->id;

        $newQuiz->save();

        return view('quizBlade.question.create', ['quiz' => $newQuiz]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$questions = Question::where('quiz_id', $quiz_id)->get();
        $quiz = Quiz::with('questions.choix')->find($id);
        return view('quizBlade.show', ['quiz' => $quiz]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$questions = Question::where('quiz_id', $quiz_id)->get();
        $quiz = Quiz::with('questions.choix')->find($id);
        return view('quizBlade.edit', ['quiz' => $quiz]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quiz = Quiz::with('questions.choix')->find($id);
        $request->validate([
            'theme'=>'required|string',
            'question'=>'required|string',
            'choix_juste'=>'required|string',
            'choix0'=>'required|string',
            ]);

        $quiz->theme = $request->get('theme');
        foreach ($quiz->questions as $question) {
            $question->question = $request->get('question');
            $question->save();
            $question->choix->choix_juste = $request->get('choix_juste');
            $question->choix->choix0 = $request->get('choix0');
            $question->choix->save();
        }
        $quiz->save();

        return redirect('/quiz/show/'.$id)->with('success', 'Quiz mis à jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
