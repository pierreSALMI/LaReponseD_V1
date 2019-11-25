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

        <h2>{{$profile->titre}}</h2>
        <p>{{$profile->id}}</p>

        @foreach($questions as $question)
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Question</td>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$question->id}}</td>
                    <td>{{$question->question}}</td>
                </tr>
            </tbody>
        </table>
        @endforeach
        <div>
@endsection
