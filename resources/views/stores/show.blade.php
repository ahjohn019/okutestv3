@extends('master.marketmenu')

@section('content')
<div class="container">
  {{--STORE DETAILS--}}
  <div class="panel panel-default">
    <div class="panel-heading"><h3><strong>{{$store->storeName}} </strong></h3></div>
    <div class="panel-body">
      @include('include.messages')
      <table class="table">
        <tr>
          <td rowspan="7"><img src="/image/stores/{{$store->image}}" style="max-height:200px"></td>
        </tr>
        <tr>
          <td>Description:</td><td colspan="3">{{$store->storeDesc}}</td>
        </tr>
        <tr>
          <td>Address:</td><td colspan="3">{{$store->storeAddress}}</td>
        </tr>
        <tr>
          <td>Store Representative 1:</td><td>{{$store->storeRepresentative1}}</td>
          <td>Store Representative 2:</td><td>{{$store->storeRepresentative2}}</td>
        </tr>
        <tr>
          <td>Contact Number [1]:</td><td>{{$store->representativeNum1}}</td>
          <td>Contact Number [2]:</td><td>{{$store->representativeNum2}}</td>
        </tr>
        <tr>
          <td>Email [1]:</td><td>{{$store->representativeEmail1}}</td>
          <td>Email [2]:</td><td>{{$store->representativeEmail2}}</td>
        </tr>
        <tr>
          <td colspan="4">
            {!! Form::open(array('route'=>['store.destroy',$store->id], 'method'=>'DELETE')) !!}
              {{link_to_route('store.edit',' Edit',[$store->id],['class'=>'btn btn-primary fa fa-pencil-square-o fa-lg'])}}
              {{Form::button(' Delete',['class'=>'btn btn-danger fa fa-times-circle fa-lg', 'type'=>'submit'])}}
            {!! Form::close() !!}
          </td>
        </tr>
      </table>
    </div>
  </div>
  {{--PRODUCT TABLE--}}
  <div class="panel panel-default">
    <div class="panel panel-heading"><h4><strong>Store products</strong><h4></div>
      <div class="panel panel-body">
        @if(count($products) > 0)
            <table class="table">
            <tr>
                <td>Name here</td>
                <td>Description</td>
                <td>Price</td>
                <td>image1</td>
                <td>image2</td>
                <td>image3</td>
                <td>Quantity</td>
                <td>Category</td>
                <td>Status</td>

                <td></td>
            </tr>

            @foreach($products as $product)
            @if($product->productStatus == 'ACTIVE' || $product->productStatus == 'DEACTIVE')
                <tr>
                    <td>{{$product->productName}}</td>
                    <td>{{$product->productDesc}}</td>
                    <td>{{$product->productPrice}}</td>
                    <td><img src="/image/products/{{$product->productImage1}}" style="max-height:100px"></td>
                    <td><img src="/image/products/{{$product->productImage2}}" style="max-height:100px"></td>
                    <td><img src="/image/products/{{$product->productImage3}}" style="max-height:100px"></td>
                    <td>{{$product->productQuantity}}</td>
                    <td>{{$product->productCategory}}</td>
                    <td>{{$product->productStatus}}</td>
                    <td>{!! Form::open(array('route'=>['product.destroy',$product->id], 'method'=>'DELETE')) !!}
                      {{link_to_route('product.edit','Edit',[$product->id],['class'=>'btn btn-primary'])}}
                      {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                      {!! Form::close() !!}</td>

                </tr>
              @endif
            @endforeach

            </table>
            @endif
            {{link_to_route('store.addNewProduct','Add new Product',[$store->id],['class'=>'btn btn-primary'])}}
      </div>
  </div>
  {{--SERVICE TABLE--}}
  <div class="panel panel-default">
    <div class="panel panel-heading"><h4><strong>Store services</strong><h4></div>
      <div class="panel panel-body">
        {{link_to_route('store.show','Add new Service',[$store->id],['class'=>'btn btn-primary'])}}
      </div>
  </div>
  {{--EVENT TABLE--}}
  <div class="panel panel-default">
    <div class="panel panel-heading"><h4><strong>Store events</strong><h4></div>
      <div class="panel panel-body">
        {{link_to_route('store.show','Add new Event',[$store->id],['class'=>'btn btn-primary'])}}
      </div>
  </div>
</div>
@endsection
