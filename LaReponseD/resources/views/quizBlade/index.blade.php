@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-danger">
                {{ session()->get('success') }}
            </div><br />
        @endif

        <div class="container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @if(session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div><br />
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>Titre</td>
                                        <td>theme</td>
                                        <td>Créateur</td>
                                    </tr>
                                    </thead>
                            </div>

                            <div class="card-body">
                                    <tbody>
                                        @foreach($quizs as $quiz)
                                            <tr>
                                                <td>{{$quiz->titre}}</td>
                                                <td>{{$quiz->theme}}</td>
                                                <td>{{ DB::table('users')->where('id', $quiz->user_id)->first()->name}}</td>
                                                <td><button type="button" class="btn btn-primary float-right" onclick="window.location='{{ url('quiz/show/'.$quiz->id) }}'">Jouer</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
@endsection
