@extends('layouts.app')

@section('content')
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
          Profile :
        </div>
        <div>
          <table class="table table-striped">
            <thead>
              <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Birth Date</td>
                <td>Telephone</td>
                <td>Address</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$profile->firstName}}</td>
                <td>{{$profile->lastName}}</td>
                <td>{{$profile->birthDate}}</td>
                <td>{{$profile->telNbr}}</td>
                <td>{{$profile->address}}</td>

                @if( $profile->id == Auth::id() )
                <td>
                  <a class="dropdown-item" href="{{ route('edit') }}"
                    onclick="event.preventDefault();
                      document.getElementById('edit-form').submit();">
                    {{ __('Edit Profile') }}
                  </a>
                  <form id="edit-form" action="{{ route('edit') }}" method="GET" style="display: none;">
                    @csrf
                  </form>
                </td>
                @endif
              </tr>
            </tbody>
          </table>
          @hasrole('Admin')
          <div>
            <h2>Modifier le Role : </h2>
            <form method="post" action="{{ route('setRole', ['profileId' => $profile->id]) }}" autocomplete="off">
              @csrf
              <button type="submit" name="aled" value="moderator" class="btn btn-primary">Moderateur</button>
              <button type="submit" name="aled" value="user" class="btn btn-primary">Utilisateur</button>
            </form>
          </div>
          @endhasrole
          </div>
        </div>
      </div>
    </div>
</div>
@endsection