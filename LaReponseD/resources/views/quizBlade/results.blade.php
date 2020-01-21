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
                </div>

                <div class="card-body">
                    <p>{{$points}}/{{$points_max}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
