@extends('layouts.register')

@section('content')

    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Créer son Profile</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif

            <form method="post" action="{{ route('profile.store') }}" autocomplete="off">
                @csrf
                <div class="form-group">

                    <label for="firstName">Prénom :</label>
                    <input type="text" class="form-control" name="firstname" required/>
                </div>

                <div class="form-group">
                    <label for="lastName">Nom :</label>
                    <input type="text" class="form-control" name="lastname" required/>
                </div>

                <div class="form-group">
                    <label for="birthDate">Date de naissance :</label>
                    <input type="date" class="form-control" name="birthDate" required/>
                </div>
                <div class="form-group">
                    <label for="telNbr">Téléphone :</label>
                    <input type="tel" pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" class="form-control" name="telNbr" required/>
                </div>
                <div class="form-group">
                    <label for="address">Adresse :</label>
                    <input type="text" class="form-control" name="address" required/>
                </div>
                <button type="submit" class="btn btn-primary">Créer !</button>
            </form>
        </div>
    </div>

@endsection
