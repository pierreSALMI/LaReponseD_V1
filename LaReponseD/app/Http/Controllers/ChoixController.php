<?php

namespace App\Http\Controllers;

use App\Choix;
use App\Question;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChoixController extends Controller
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
        //
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
        $question = Question::where('quiz_id', $quiz->id)->latest('created_at')->first();

        $reponses = array($request->reponses[0],$request->reponses[1],$request->reponses[2],$request->reponses[3]);

        $newRep = new Choix;

        if ($request->quest1 == $reponses[0]) {
            $newRep->choix_juste = $reponses[0];
            $newRep->choix0 = $reponses[1];
            $newRep->choix1 = $reponses[2];
            $newRep->choix2 = $reponses[3];
        } elseif ($request->quest1 == $reponses[1]) {
            $newRep->choix_juste = $reponses[1];
            $newRep->choix0 = $reponses[2];
            $newRep->choix1 = $reponses[3];
            $newRep->choix2 = $reponses[0];
        } elseif ($request->quest1 == $reponses[2]) {
            $newRep->choix_juste = $reponses[2];
            $newRep->choix0 = $reponses[3];
            $newRep->choix1 = $reponses[0];
            $newRep->choix2 = $reponses[1];
        } elseif ($request->quest1 == $reponses[3]) {
            $newRep->choix_juste = $reponses[3];
            $newRep->choix0 = $reponses[0];
            $newRep->choix1 = $reponses[1];
            $newRep->choix2 = $reponses[2];
        } else {
            $messages = "Veuillez choisir une option";
            return view('quizBlade.choix.create', ['quiz' => $quiz,'question' => $question, 'reponses' => $reponses])->withErrors($messages);
        }
        

        // for ($i=0; $i < sizeof($reponses); $i++) { 
        //     if ($reponses[$i] != $request->quest1){
        //         $j = ($i+2)%3;
        //         $aled = "choix{$j}";
        //         $newRep->$aled = $reponses[$i];
        //     } else {
        //         $newRep->choix_juste = $reponses[$i];
        //     }
        // }

        $newRep->question_id = $question->id;

        $newRep->save();

        if ($_POST['action'] == 'again') {
            return view('quizBlade.question.create', ['quiz' => $quiz]);
        } else if ($_POST['action'] == 'end') {
            return redirect('home')->with('success','Bravo, vous avez créé votre quiz !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Choix  $choix
     * @return \Illuminate\Http\Response
     */
    public function show(Choix $choix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Choix  $choix
     * @return \Illuminate\Http\Response
     */
    public function edit(Choix $choix)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Choix  $choix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Choix $choix)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Choix  $choix
     * @return \Illuminate\Http\Response
     */
    public function destroy(Choix $choix)
    {
        //
    }
}
