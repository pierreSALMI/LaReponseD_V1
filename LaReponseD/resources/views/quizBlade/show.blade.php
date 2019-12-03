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

                    {{ $random = random_int(0,3) }}
                    @if($random == 0)
                        <tbody>
                            <tr>
                                <td>{{$question->question}}</td>
                                <td>{{$question->choix->choix0}}</td>
                                <td>{{$question->choix->choix1}}</td>
                                <td>{{$question->choix->choix2}}</td>
                                <td>{{$question->choix->choix3}}</td>
                            </tr>
                        </tbody>

                    @elseif($random == 1)
                        <tbody>
                        <tr>
                            <td>{{$question->question}}</td>
                            <td> <input type="radio" name="choix3"> {{$question->choix->choix3}}</td>
                            <td> <input type="radio" name="choix0"> {{$question->choix->choix0}}</td>
                            <td> <input type="radio" name="choix2"> {{$question->choix->choix2}}</td>
                            <td> <input type="radio" name="choix1"> {{$question->choix->choix1}}</td>
                        </tr>
                        </tbody>

                    @elseif($random == 2)
                        <tbody>
                        <tr>
                            <td>{{$question->question}}</td>
                            <td> <input type="radio" name="choix2"> {{$question->choix->choix2}}</td>
                            <td> <input type="radio" name="choix3"> {{$question->choix->choix3}}</td>
                            <td> <input type="radio" name="choix0"> {{$question->choix->choix0}}</td>
                            <td> <input type="radio" name="choix1"> {{$question->choix->choix1}}</td>
                        </tr>
                        </tbody>

                    @elseif($random == 3)
                        <tbody>
                        <tr>
                            <td>{{$question->question}}</td>
                            <td> <input type="radio" name="choix0"> {{$question->choix->choix0}}</td>
                            <td> <input type="radio" name="choix2"> {{$question->choix->choix2}}</td>
                            <td> <input type="radio" name="choix3"> {{$question->choix->choix3}}</td>
                            <td> <input type="radio" name="choix1"> {{$question->choix->choix1}}</td>
                        </tr>
                        </tbody>
                    @else
                        <tbody>
                        <tr>
                            <td>{{$question->question}}</td>
                            <td> <input type="radio" name="choix3"> {{$question->choix->choix3}}</td>
                            <td> <input type="radio" name="choix2"> {{$question->choix->choix2}}</td>
                            <td> <input type="radio" name="choix1"> {{$question->choix->choix1}}</td>
                            <td> <input type="radio" name="choix0"> {{$question->choix->choix0}}</td>
                        </tr>
                        </tbody>
                    @endif


                </table>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
