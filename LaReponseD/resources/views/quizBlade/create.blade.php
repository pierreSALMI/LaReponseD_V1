@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Share
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
            
            <form method="post" action="{{ route('quiz.store') }}">
                @csrf
                <!-- TITRE DU QUIZs -->
                <div class="form-group">
                    <label for="titre">Titre :</label>
                    <input type="text" class="form-control" id="titre" name="titre" required/>
                </div>

                <!-- THEME DU QUIZs -->
                <label for="theme">Thème :</label>
                <select name="theme" id="theme" required>
                    <option value="coucou">--Please choose an option--</option>
                    <option value="nourriture">nourriture</option>
                    <option value="jeu">jeu</option>
                    <option value="Internet">Internet</option>
                </select></br></br>

                <button type="submit" class="btn btn-primary">Créer</button>
            </form>

        </div>
    </div>
@endsection
