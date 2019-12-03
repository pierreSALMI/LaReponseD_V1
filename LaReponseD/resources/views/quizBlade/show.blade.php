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
            <div class="card-header">
                <h2 class="float-left">{{$quiz->titre}}</h2>
                @if(Auth::user()->id == $quiz->user_id)
                    <button type="button" class="btn btn-primary float-right" onclick="window.location='{{ url('quiz/edit/'.$quiz->id) }}'">Modifier le quiz</button>
                @endif
            </div>

            <div class="card-body">
                @foreach($quiz->questions as $question)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Question :</td>
                            <td>Réponse 1</td>
                            <td>Réponse 2</td>
                            <td>Réponse 3</td>
                            <td>Réponse 4</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$question->question}}</td>
                            <td>{{$question->choix->choix_juste}}</td>
                            <td>{{$question->choix->choix0}}</td>
                            <td>{{$question->choix->choix1}}</td>
                            <td>{{$question->choix->choix2}}</td>
                        </tr>
                    </tbody>
                </table>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
