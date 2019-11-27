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

                <hr>

                <!-- REPONSE 1 DU QUIZs -->
                <div>
                    <label for="name">Réponse 1 :</label>
                    <input type="text" class="form-control" name="rep2"/>
                </div>

                <!-- REPONSE 2 DU QUIZs -->
                <div>
                    <label for="name">Réponse 2 :</label>
                    <input type="text" class="form-control" name="rep3"/>
                </div>

                <!-- REPONSE 3 DU QUIZs -->
                <div>
                    <label for="name">Réponse 3 :</label>
                    <input type="text" class="form-control" name="rep4"/>
                </div>

                <!-- REPONSE 4 DU QUIZs -->
                <div>
                    <label for="name">Réponse 4 :</label>
                    <input type="text" class="form-control" name="rep5"/>
                </div>
                <!--##############################-->

                <button type="submit" class="btn btn-primary" name="action" value="next">Réponses</button>
            </form>

        </div>
    </div>
@endsection
