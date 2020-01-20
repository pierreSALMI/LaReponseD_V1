@extends('layouts.app')

@section('content')
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
                    <h2 class="float-left">Dashboard</h2>
                    <button type="button" class="btn btn-primary float-right" onclick="window.location='{{ url('quiz/create') }}'">CrÃ©er un quiz</button>
                </div>

                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
