@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
            <div class="card">
                <div class="card-header">
                  Tous les utilisateurs
                </div>

                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <td>ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Birth Date</td>
                        <td>Telephone</td>
                        <td>Address</td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($profiles as $profile)
                      <tr>
                        <td>{{$profile->id}}</td>
                        <td>{{$profile->firstName}}</td>
                        <td>{{$profile->lastName}}</td>
                        <td>{{$profile->birthDate}}</td>
                        <td>{{$profile->telNbr}}</td>
                        <td>{{$profile->address}}</td>
                        <td><a href="{{ url('profiles/'.$profile->id) }}">Voir...</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                    {{ $profiles->links() }}
                </div>
            </div>
        </div>
    </div>
  </div>
<div>
@endsection
