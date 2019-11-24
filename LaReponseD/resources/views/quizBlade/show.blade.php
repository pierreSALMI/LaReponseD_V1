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
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Birth Date</td>
                <td>Telephone</td>
                <td>Address</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$quiz->id}}</td>
                <td>{{$quiz->titre}}</td>
                <td>{{$quiz->theme}}</td>
                <td>{{$question->id}}</td>
                <td>{{$question->question}}</td>
            </tr>
            </tbody>
        </table>
        <div>
@endsection
