@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif

        <h2>{{$quiz->titre}}</h2>

        @foreach($quiz->questions as $question)
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Question</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$question->id}}</td>
                        <td>{{$question->question}}</td>
                        <td>{{$question->choix->choix_juste}}</td>
                        <td>{{$question->choix->choix2}}</td>
                        <td>{{$question->choix->choix3}}</td>
                        <td>{{$question->choix->choix4}}</td>
                    </tr>
                </tbody>
            </table>
        @endforeach
        <div>
@endsection
