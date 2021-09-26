@extends('layouts.admin')

@section('content')
    <center>
        <div class="card my-4" style="max-width: 400px">
            <div class="card-body">
                <h2>
                    Admin Login
                </h2>
                <form action="{{url('admin/auth')}}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <div class="mb-3">
                          <label for="password" class="form-label">Username</label>
                          <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </center>
@endsection