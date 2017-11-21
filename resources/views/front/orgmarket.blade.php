@extends('master.marketmenu')

@section('content')
<div class="container">
<header class="clearfix">
				<h1>Organization <span>Organization List</span></h1>	
</header>

@foreach($organizations->chunk(2) as $organizationsChunk)
<div class="row" > 
@foreach($organizationsChunk as $organization)

<div class="col-sm-6 col-md-6">
    <div class="thumbnail">
    <img class ="myImg" src="{{asset('images/'.$organization->image)}}" height="150" weight="200" >
      <div class="caption">
        <h3>{{$organization->name}}</h3>
        <p class="description">{{$organization->desc}}</p>
        <div class="clearfix"><p><a href="{{URL::to('org/details/' . $organization->id)}}" class="btn btn-success pull-right" >Details</a> </p></div>
      </div>
    </div>
  </div> 


@endforeach
</div>

@endforeach

@endsection