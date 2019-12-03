<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quiz;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_id = Auth::user()->id;
        $quiz = Quiz::where('user_id', $current_id)->latest('created_at')->first();

        return View::make('quizBlade.createQuest', ['quiz' => $quiz]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $current_id = Auth::user()->id;
        $quiz = Quiz::where('user_id', $current_id)->latest('created_at')->first();

        // $validatedQuiz = $request->validate([
        //     'question1' => 'required',
        //     'rep2' => 'required',
        //     'rep3' => 'required',
        //     'rep4' => 'required',
        //     'rep5' => 'required',
        // ]);
    
        if (isset($request->question1) && isset($request->rep2) && isset($request->rep3) && isset($request->rep4) && isset($request->rep5)) {
            $newQuestion = new Question;

            $newQuestion->question = $request->question1;
            $newQuestion->quiz_id = $quiz->id;

            $newQuestion->save();

            $reponses = array('rep1' => $request->request->get('rep2'),
                        'rep2' => $request->request->get('rep3'),
                        'rep3' => $request->request->get('rep4'),
                        'rep4' => $request->request->get('rep5'));

            return view('quizBlade.choix.create', ['quiz' => $quiz,'question' => $newQuestion, 'reponses' => $reponses]);
        } else {
            $messages = "Vous n'avez pas remplis tous les champs";
            return view('quizBlade.question.create', ['quiz' => $quiz])->with('error','Vous n\'avez pas rentré tous les champs requis')->withErrors($messages);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_id) {
        $question = Question::where('quiz_id', $quiz_id)->first();
        return $question;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
