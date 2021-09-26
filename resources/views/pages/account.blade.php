@extends('layouts.app')

@section('content')

<div class="container">
    <form class="mt-4" action="{{url('/account/update')}}" method="POST" enctype="multipart/form-data">
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
            <p>Profile Picture (max 1mb)</p>
            <img src="{{url(Auth::user()->photo_path)}}" 
            style="max-width: 200px; max-height : 200px;">
            <input type="file" class="form-control" id="image" name="image"
            accept="image/png, image/gif, image/jpeg" />
          </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email"
          value="{{Auth::user()->email}}">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name"
            value="{{Auth::user()->name}}">
        </div>

        <div class="mb-3">
            <p>Gender</p>
            
            @if (Auth::user()->gender == 'l')
            <input type="radio"  id="male" name="gender" value="l"  checked>
            <label for="male" class="form-label">Laki-laki</label>
            @else
            <input type="radio"  id="male" name="gender" value="l" >
            <label for="male" class="form-label">Laki-laki</label>
            @endif

            @if (Auth::user()->gender == 'p')
            <input type="radio"  id="female" name="gender"  value="p" checked>
            <label for="female" class="form-label">perempuan</label>
            @else
            <input type="radio"  id="male" name="gender" value="p" >
            <label for="female" class="form-label">perempuan</label>
            @endif
        </div>

        <div class="mb-3">
            <label for="no_ktp" class="form-label">Nomor ktp</label>
            <input type="text" class="form-control" id="no_ktp" name="no_ktp"
            value="{{Auth::user()->no_ktp}}">
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Nomor handphone</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number"
            value="{{Auth::user()->phone_number}}">
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Tanggal lahir</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
            value="{{Auth::user()->date_of_birth}}">
        </div>
       
    
        <button type="submit" class="btn btn-primary mb-4">Update</button>
        <a href="{{url('dashboard')}}" class="btn btn-secondary ms-2 mb-4">Back to dashboard</a>
       
      </form>
</div>
@endsection