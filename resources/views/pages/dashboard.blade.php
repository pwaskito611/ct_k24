@extends('layouts.app')

@section('content')
   <div class="container mb-4">
    <center>
        <h2 class="mt-4">
            You are logged! 
            <a href="{{url('user/data')}}" class="text-blue" target="_blank">
                Click here to see all user data
            </a>
        </h2>
    </center>
    
    @if (\Auth::user()->photo_path !== null)
        <img src="{{url(\Auth::user()->photo_path)}}" style="max-width: 200px; max-height : 200px">
    @else
        <img src="{{url('assets/man.png')}}" style="max-width: 200px; max-height : 200px">
    @endif

    <ul>
        <li>id : {{Auth::user()->id}}</li>
        <li>nama : {{Auth::user()->name}}</li>
        <li>email : {{Auth::user()->email}}</li>
        <li>gender : {{Auth::user()->gender}}</li>
        <li>nomor ktp : {{Auth::user()->no_ktp}}</li>
        <li>nomor hp : {{Auth::user()->phone_number}}</li>
        <li>tanggal lahir : {{Auth::user()->date_of_birth}}</li>
    </ul> 
   </div>
@endsection