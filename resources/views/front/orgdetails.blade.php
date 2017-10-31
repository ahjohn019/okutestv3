@extends('master.marketmenu')

@section('content')
<div class="container">
        <div class="page-header" id="features">
            <h1>Details</h1>
        </div>

<div class="row">
        <div class="col-md-4">
        <img class ="myImg" src="{{asset('images/'.$organizations->image)}}" height="200" weight="200" >
        </div>
        <div class="col-md-8">
                <h3>{{$organizations->name}}</h3>
                <p><strong>Description: </strong>{{$organizations->desc}}</p>
                <p><strong>Address:</strong> {{$organizations->addr}}</p>
                <p><strong>Region: </strong>{{$organizations->region}}</p>
                <p><strong>Phone Number: </strong>{{$organizations->phone_no}}</p>
                <p><strong>Register Date: </strong>{{$organizations->reg_date}}</p>

        </div><!-- end col-md 8 -->
</div><!-- end of row -->
    <div class="spacer"></div>
<div class="row">
            <h3>You may also like..</h3>
            @foreach($interested as $organizations)
            <div class="col-md-3">
            <div class="thumbnail">
            <div class="caption text-center">
            <a href="{{url('org/details',[$organizations->id])}}"><img class ="myImg" src="{{asset('images/'.$organizations->image)}}" height="150" weight="200" ></a>
            <a href="{{url('org/details',[$organizations->id])}}"><p>{{$organizations->name}}</p></a>
            </div>
          
            
            </div><!--end thumbnail-->
            </div><!--end col-md-3-->
            @endforeach
        </div>
        <div class="spacer"></div>
</div><!--End of Container-->

@endsection