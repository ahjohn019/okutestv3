@extends('admin.profile')

@section('content')
<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Create Handicrafts</h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>View</h3>
          <a href="{{route('hand.dashboard')}}">Back To Handicraft</a>
</div>

<h1>Showing {{$handicrafts->title}}</h1>
<div class="jumbotron text-left">
        <h2>{{ $handicrafts->title }}</h2>
        <p>
            <strong>Description:</strong> {{ $handicrafts->description }}<br>
            <strong>Price:</strong> {{ $handicrafts->price }}<br>
            <strong>Image: </strong><img class ="myImg" src="{{asset('images/'.$handicrafts->image)}}" height="150" weight="200" ><br>
        </p>
</div>

@endsection