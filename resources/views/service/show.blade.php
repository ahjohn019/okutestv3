@extends('admin.profile')

@section('content')

<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Create Service</h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>View</h3>
          <a href="{{route('service.dashboard')}}">Back To Service</a>
</div>

<h1>Showing: {{$services->name}}</h1>
<div class="jumbotron text-left">
        <h2>{{ $services->name }}</h2>
        <p>
            <strong>Description:</strong> {{ $services->desc }}<br>
            <strong>Type:</strong> {{ $services->type }}<br>
            <strong>Price:</strong> {{ $services->price }}<br>
        </p>
</div>
@endsection