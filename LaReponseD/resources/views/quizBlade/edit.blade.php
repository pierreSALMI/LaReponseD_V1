@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Modifier le Profile</h1>

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

            <form method="post" action="{{ route('quiz.update', $quiz->id) }}" autocomplete="off">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="theme">Theme :</label>
                    <input type="text" class="form-control" name="theme" value="{{ $quiz->theme }}" />
                </div>
                @foreach($quiz->questions as $question)
                    <div class="form-group">
                        <label for="question">Question :</label>
                        <input type="text" class="form-control" name="question" value="{{ $question->question }}" />
                    </div>

                    <div class="form-group">
                        <label for="choix_juste">choix Juste :</label>
                        <input type="text" class="form-control" name="choix_juste" value="{{ $question->choix->choix_juste }}" />
                    </div>

                    <div class="form-group">
                        <label for="choix2">choix2 :</label>
                        <input type="text" class="form-control" name="choix2" value="{{ $question->choix->choix2 }}" />
                    </div>
                @endforeach
                    <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection
