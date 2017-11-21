@extends('admin.profile')

@section('content')

<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Create Event</h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>View</h3>
          <a href="{{route('event.dashboard')}}">Back To Event</a>
</div>

<h1>Showing: {{$events->name}}</h1>
<div class="jumbotron text-left">
        <h2>{{ $events->name }}</h2>
        <p>
            <strong>Description:</strong> {{ $events->desc }}<br>
            <strong>Start Date:</strong> {{ $events->start_date }}<br>
            <strong>End Date:</strong> {{ $events->end_date}}<br>
            <strong>Place:</strong> {{ $events->place}}<br>
            <strong>Type:</strong> {{ $events->type}}<br>
            <strong>Organization Name:</strong>{{$events->organization['name']}}<br>
        </p>
</div>
@endsection