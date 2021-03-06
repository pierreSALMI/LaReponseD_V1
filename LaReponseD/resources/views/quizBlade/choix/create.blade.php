@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
            <div class="card">
                <div class="card-header">
                    {{$quiz->titre}}
                    {{$question->question}}
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('choix.store', ['reponses' => $reponses]) }}">
                        @csrf

                        <!--##############################-->
                        <!--          QUESTION 1          -->
                        <div class="form-group">
                            <label for="name">Question :</label>
                            {{$question->question}}
                        </div>

                        <!-- REPONSES -->
                        @foreach($reponses as $reponse)
                        <div>
                            <label for="name">Réponse :</label>
                            <input type="radio" value="{{$reponse}}" name="quest1">
                            <input type="hidden" name="reponses[]" value="{{$reponse}}">
                            <label for="q1r1">{{$reponse}}</label>
                        </div>
                        @endforeach

                        <button type="submit" class="btn btn-primary" name="action" value="again">Question Suivante</button>
                        <button type="submit" class="btn btn-primary" name="action" value="end">Fin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
