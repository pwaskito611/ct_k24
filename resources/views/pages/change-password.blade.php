@extends('layouts.app')

@section('content')
<div class="container">
    <form class="mt-4" action="{{url('/account/update-password')}}" method="POST">
        @csrf
        @method('put')

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
          <label for="current_password" class="form-label">Current password</label>
          <input type="password" class="form-control" id="current_password" 
          placeholder="current_password" name="current_password">
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label" >New password</label>
            <input type="password" class="form-control" id="new_password" 
          placeholder="new password" name="new_password">
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label" >Confirm new Password</label>
            <input type="password" class="form-control" id="confirmm_password" 
          placeholder="confirm new password" name="confirm_password">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection