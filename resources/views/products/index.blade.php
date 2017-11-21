@extends('master.marketmenu')

@section('content')

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1><b>Products</b></h1>

  <form action="/searchProduct" method="POST" role="search">
    {{ csrf_field() }}
    <div class="details" style="display:none">
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="{{$searchResult or 'Search By Product Name'}}"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search fa fa-search fa-lg"></span>
            </button>
            <button type="submit" class="btn btn-default" name="submitsearch"><span class="glyphicon glyphicon-search fa fa-times-circle fa-lg"></span></button>
        </span>
    </div></div>
    <span class="glyphicon glyphicon-search fa fa-search"></span>
    <a id="more" href="#" onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'Hide Search':'Show Search');});">Show Search</a>
</form>
</div>
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
          @if(count($products) > 0)
            @foreach ($products as $product)
                @if($product->productStatus == 'ACTIVE')

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" >
                        <img src="/image/products/{{$product->productImage1}}"  style="max-height:200px; vertical-align: middle" class="img-responsive">
                        <div class="caption">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <h3>{{$product->productName}}</h3>
                                </div>
                                <div class="col-md-6 col-xs-6 price">
                                    <h3>
                                        <label>RM {{$product->productPrice}}</label></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-6">
                                    {{link_to_route('product.show','View',[$product->id],['class'=>'btn btn-success pull-right'])}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            @endif
        </div>

    </div>
</div>




@endsection
