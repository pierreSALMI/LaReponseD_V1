@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        </div>
        <div class="card col-md-11">
            @if(! $quiz)
                <div class="alert alert-success">
                    <p>Ce quiz n'existe pas</p>
                </div>
            @else
                <div class="card-header">
                    <h2 class="float-left">{{$quiz->titre}}</h2>

                    @if(Auth::user()->id == $quiz->user_id)
                        <button type="button" class="btn btn-primary float-right" onclick="window.location='{{ url('quiz/edit/'.$quiz->id) }}'">Modifier le quiz</button>
                    @endif
                </div>

                <?php
                    $quest = 0;
                ?>

                <div class="card-body">
                    <form method="post" action="{{ route('verify', ['reponses' => 'reponses']) }}">
                        @csrf
                        @foreach($quiz->questions as $question)
                        <?php
                        $reponses2 = [$question->choix->choix0,$question->choix->choix1,$question->choix->choix2,$question->choix->choix3];
                        ?>
                        <h5>{{$question->question}}</h5>
                        <input type="hidden" name="reponses[]" value='{{$question->choix->choix0}}'>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>Réponse 1</td>
                                    <td>Réponse 2</td>
                                    <td>Réponse 3</td>
                                    <td>Réponse 4</td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    @foreach($reponses2 as $reponse)
                                        <td>
                                        <input type="radio" value="{{$reponse}}" name='<?php echo $quest;?>'>
                                        <label for='<?php echo $quest;?>'>{{$reponse}}</label>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        <?php $quest += 1;?>
                        @endforeach
                        <button type="submit" class="btn btn-primary" name="action">Valider</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
