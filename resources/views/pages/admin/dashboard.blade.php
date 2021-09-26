@extends('layouts.admin')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{url('admin/edit/' . $user->id)}}" class="btn btn-primary">
                        Edit
                    </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
    </div>
@endsection