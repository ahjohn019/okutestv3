@extends('admin.profile')

@section('content')
@if (Session::has('message'))
 <div class="col-md-12">
 <div class="alert alert-info">
 {{ Session::get('message') }}
 </div>
 </div>
@endif
<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span></h2>
    
</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>Event</h3>
          <a href="{{route('event.create')}}">Create New</a>
          <a href="#">View All</a>
          <a href="{{route('admin.dashboard')}}">Back To Admin</a>
</div>

<!-- Search -->
<div class="col-md-5 text-left">
<form action="{{route('event.dashboard')}}" method="get" class="form-inline">
<div class="form-group"><i class="fa fa-search" aria-hidden="true"></i>
<input type = "text" class="form-control" name="s" placeholder="Keyword" value="{{ isset($s) ? $s : ''}}">
<div class="form-group">
<button class="btn btn-success" type="submit">Search</button>
</div>
</form>

</div>
</div>

<table class="table table-striped table-bordered">
<thead>
<tr class="bg-primary">
      <th>Name</th>
      <th>Description</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Place</th>
      <th>Type</th>
      <th>Created By</th>
    </tr>
</thead>
<tbody>
@foreach($events as $event)
<tr>

      <td class="bg-info">{{$event->name}}</td>
      <td>{{$event->desc}}</td>
      <td class="bg-info">{{$event->start_date}}</td>
      <td>{{$event->end_date}}</td>
      <td class="bg-info">{{$event->place}}</td>
      <td>{{$event->type}}</td>
      <td class="bg-info">{{$event->organization['name']}}</td>
      
      
      <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
     
    
      <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
      <td><a href="{{URL::to('event/show/' . $event->id)}}" class="btn btn-small btn-success" >View</a></td>
      <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
      <td><a href="{{URL::to('event/edit/' . $event->id)}}" class="btn btn-small btn-info" >Update</a></td>
       <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
       @if(Auth::user()->id == $event->admin_id).<!-- authenticate user id for permission to delete -->
       <td> 
        

       {!! Form::open(['method' => 'DELETE','route' => ['event.delete', $event->id]]) !!}
       <div class="form-group">
       {!! Form::submit('Delete ?', ['class' => 'btn btn-danger']) !!}
       </div>
       {!! Form::close() !!}
       </td>
       @endif
</tr>
@endforeach
</tbody>
</table>
{{$events->appends(['s'=>$s])->links()}}
@endsection