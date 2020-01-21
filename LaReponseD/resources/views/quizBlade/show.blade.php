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

                <div class="card-body">
                    <form method="post">
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

                            <span hidden>{{ $random = random_int(0,3) }}</span>
                            @if($random == 0)
                                <tbody>
                                    <tr>
                                        <td>{{$question->question}}</td>
                                        <td><input type="radio" name="choix0" value="{{$question->choix->choix0}}">{{$question->choix->choix0}}</td>
                                        <td><input type="radio" name="choix1" value="{{$question->choix->choix1}}">{{$question->choix->choix1}}</td>
                                        <td><input type="radio" name="choix2" value="{{$question->choix->choix2}}" >{{$question->choix->choix2}}</td>
                                        <td><input type="radio" name="choix3" value="{{$question->choix->choix3}}">{{$question->choix->choix3}}</td>
                                    </tr>
                                </tbody>

                            @elseif($random == 1)
                                <tbody>
                                <tr>
                                    <td>{{$question->question}}</td>
                                    <td> <input type="radio" name="choix3" value="{{$question->choix->choix3}}"> {{$question->choix->choix3}}</td>
                                    <td> <input type="radio" name="choix0" value="{{$question->choix->choix0}}"> {{$question->choix->choix0}}</td>
                                    <td> <input type="radio" name="choix2" value="{{$question->choix->choix2}}"> {{$question->choix->choix2}}</td>
                                    <td> <input type="radio" name="choix1" value="{{$question->choix->choix1}}"> {{$question->choix->choix1}}</td>
                                </tr>
                                </tbody>

                            @elseif($random == 2)
                                <tbody>
                                <tr>
                                    <td>{{$question->question}}</td>
                                    <td> <input type="radio" name="choix2" value="{{$question->choix->choix2}}"> {{$question->choix->choix2}}</td>
                                    <td> <input type="radio" name="choix3" value="{{$question->choix->choix3}}"> {{$question->choix->choix3}}</td>
                                    <td> <input type="radio" name="choix0" value="{{$question->choix->choix0}}"> {{$question->choix->choix0}}</td>
                                    <td> <input type="radio" name="choix1" value="{{$question->choix->choix1}}"> {{$question->choix->choix1}}</td>
                                </tr>
                                </tbody>

                            @elseif($random == 3)
                                <tbody>
                                <tr>
                                    <td>{{$question->question}}</td>
                                    <td> <input type="radio" name="choix0" value="{{$question->choix->choix0}}"> {{$question->choix->choix0}}</td>
                                    <td> <input type="radio" name="choix2" value="{{$question->choix->choix2}}"> {{$question->choix->choix2}}</td>
                                    <td> <input type="radio" name="choix3" value="{{$question->choix->choix3}}"> {{$question->choix->choix3}}</td>
                                    <td> <input type="radio" name="choix1" value="{{$question->choix->choix1}}"> {{$question->choix->choix1}}</td>
                                </tr>
                                </tbody>
                            @else
                                <tbody>
                                <tr>
                                    <td>{{$question->question}}</td>
                                    <td> <input type="radio" name="choix3" value="{{$question->choix->choix3}}"> {{$question->choix->choix3}}</td>
                                    <td> <input type="radio" name="choix2" value="{{$question->choix->choix2}}"> {{$question->choix->choix2}}</td>
                                    <td> <input type="radio" name="choix1" value="{{$question->choix->choix1}}"> {{$question->choix->choix1}}</td>
                                    <td> <input type="radio" name="choix0" value="{{$question->choix->choix0}}"> {{$question->choix->choix0}}</td>
                                </tr>
                                </tbody>
                            @endif

                        </table>
                        @endforeach
                        <button type="submit" class="btn btn-primary" name="action">Valider</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
