@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    @hasrole("Admin")
                        <p>Hello you administrator</p>
                    @endhasrole
                    @hasrole("Modo")
                        <p>Hello you moderator</p>
                    @endhasrole
                    @hasrole("User")
                        <p>Hello you only user</p>
                    @endhasrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
