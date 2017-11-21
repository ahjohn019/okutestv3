@extends('admin.profile')

@section('content')
<div class="container">
<div class="page-header" id="features">
         <h2><span style="font-size:30px;cursor:pointer" >
    <a style="font-size:30px;cursor:pointer" onclick="openNav()">
        <img src="{{URL::to('image/sidemenu.png')}}" alt="sidemenu">
    </a></span>Create Organizations</h2>

</div>

<div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>View</h3>
          <a href="{{route('org.dashboard')}}">Back To Organizations</a>
</div>
@include('include.messages')
<h1>Showing {{$organizations->name}}</h1>
<div class="jumbotron text-left">
        <p>
            <strong>Logo: </strong><img class ="myImg" src="{{asset('images/'.$organizations->image)}}" height="100" weight="150" ><br>
            <strong>Address:</strong> {{ $organizations->addr }}<br>
            <strong>Region:</strong> {{ $organizations->region }}<br>
            <strong>Phone No:</strong> {{ $organizations->phone_no }}<br>
            <strong>Register Date:</strong> {{ $organizations->reg_date }}<br>
            <strong>Artist List: </strong>
            @foreach ($organizations->artist as $artist)
            <span class="label label-default">{{$artist->Name}}</span>
            @endforeach
        </p>
</div>
<div class="panel panel-default">
  <div class="panel panel-heading"><h4><strong>Stores</strong><h4></div>
    <div class="panel panel-body">
      @if(count($stores) > 0)
      <table class="table">
      <tr>
          <td></td>
          <td><strong>Name</strong></td>
          <td><strong>Description</strong></td>
          <td><strong>Address</strong></td>
          <td><strong>Representative Name</strong></td>
          <td><strong>Contact No.</strong></td>
          <td><strong>Email</strong></td>
          <td><strong>Action</strong></td>
      </tr>
          @foreach($stores as $store)
          <tr>
              <td align="center"><img src="/image/stores/{{$store->image}}" style="max-height: 100px" class="img-responsive" ></td>
              <td>{{$store->storeName}}</td>
              <td><p>{{$store->storeDesc}}</p></td>
              <td>{{$store->storeAddress}}</td>
              <td>{{$store->storeRepresentative1}}</td>
              <td>{{$store->representativeNum1}}</td>
              <td>{{$store->representativeEmail1}}</td>
              <td>{{link_to_route('store.show','View details',[$store->id],['class'=>'btn btn-info'])}}</td>
          </tr>
          @endforeach
          </table>
          @endif
          <div>
            {{link_to_route('organization.addNewStore','Add new store',[$organizations->id],['class'=>'btn btn-primary'])}}
          </div>
    </div>
</div>


@endsection
