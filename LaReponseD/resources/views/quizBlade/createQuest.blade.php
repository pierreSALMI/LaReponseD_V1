@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            {{$quiz->titre}}
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            
            <form method="post" action="{{ route('question.store') }}">
                @csrf

                <!--##############################-->
                <!--          QUESTION 1          -->
                <div class="form-group">
                    <label for="name">Question :</label>
                    <input type="text" class="form-control" name="question1"/>
                </div>

                <!-- REPONSE 1 DU QUIZs -->
                <div>
                    <label for="name">Réponse 1 :</label>
                    <input type="radio" id="q1r1" value="q1r1" name="quest1">
                    <label for="q1r1"><input type="text" class="form-control" name="1rep1"/></label>
                </div>

                <!-- REPONSE 2 DU QUIZs -->
                <div>
                    <label for="name">Réponse 2 :</label>
                    <input type="radio" id="q1r2" value="q1r2" name="quest1">
                    <label for="q1r2"><input type="text" class="form-control" name="1rep2"/></label>
                </div>

                <!-- REPONSE 3 DU QUIZs -->
                <div>
                    <label for="name">Réponse 3 :</label>
                    <input type="radio" id="q1r3" value="q1r3" name="quest1">
                    <label for="q1r3"><input type="text" class="form-control" name="1rep3"/></label>
                </div>

                <!-- REPONSE 4 DU QUIZs -->
                <div>
                    <label for="name">Réponse 4 :</label>
                    <input type="radio" id="q1r4" value="q1r4" name="quest1">
                    <label for="q1r4"><input type="text" class="form-control" name="1rep4"/></label>
                </div>
                <!--##############################-->

                <button type="submit" class="btn btn-primary" name="action" value="again">Question Suivante</button>
                <button type="submit" class="btn btn-primary" name="action" value="end">Fin</button>
            </form>

        </div>
    </div>
@endsection
