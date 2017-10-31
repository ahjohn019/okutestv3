@extends('master.marketmenu')

@section('content')

<div class="container">
<header class="clearfix">
				<h1>Handicrafts <span>Product List</span></h1>	
</header>

@foreach($handicrafts->chunk(3) as $handicraftsChunk)
<div class="row">
@foreach($handicraftsChunk as $handicraft)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
    <img class ="myImg" src="{{asset('images/'.$handicraft->image)}}" height="150" weight="200" >
      <div class="caption">
        <h3>{{$handicraft->title}}</h3>
        <p class="description">{{$handicraft->description}}</p>
        <div class="pull-left price"><p>RM{{$handicraft->price}}</p></div>
        <div class="clearfix"><p><a href="{{route('front.addToCart', ['id' => $handicraft->id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a> </p></div> 
        <hr>
        <div class="clearfix"><p><a href="{{route('front.addToCart', ['id' => $handicraft->id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a> </p></div> 
      </div>
    </div>
  </div> 
  @endforeach   
  </div>
@endforeach
<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
</div>

</div>
@endsection