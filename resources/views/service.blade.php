@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Create At</th>
                            <th scope="col">Upadate At</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($all_users as $user)
                          <tr>
                            <th >{{$user->name}}</th>
                            <th >{{$user->email}}</th>
                            <th >{{$user->created_at}}</th>
                            <th >{{$user->updated_at}}</th>

                          </tr>
                           @endforeach
                        </tbody>
                      </table>






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
