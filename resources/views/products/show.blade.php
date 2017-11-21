@extends('master.marketmenu')

@section('content')
</br></br></br>
<div class="container">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="">{{$product->storeID}}</span></a>
                <h3 class="modal-title">{{$product->productName}}</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img" style="padding:20px">
                      <a href="/image/products/{{$product->productImage1}}">
                        <img src="/image/products/{{$product->productImage1}}" style="max-height:280px" class="img-responsive"></a>
                    </div>
                    <div class="col-md-6 product_content">
                      {!! Form::model($product,array('route'=>['product.addToCart',$product->id], 'method'=>'PUT')) !!}
                    <h4>Product ID: <span>{{$product->id}} </span></h4>
                    <h5>{{$product->productCategory}}</h5>

                        <p>{{$product->productDesc}}</p>

                        <h3 class="cost"><span class="">RM {{$product->productPrice}}
                          <h5>{{$product->productQuantity}} unit(s) available.</h5> </span></h3>
                        <div class="row">

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                {{Form::text('Quantity', '1',['class' => 'form-control', 'placeholder' => 'Purchasing Quantity'])}}
                            </div>
                            <div class="col-md-6 col-sm-14">
                              {{Form::select('DeliveryMethod', ['SELF-PICKUP' => 'Self-Pickup','DELIVERY-COURIER' => 'Delivery-Courier'],null,['class' => 'form-control'])}}
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                        </br>
                            @if (Auth::guard('web')->check())
                            {{Form::text('userid',Auth::user()->id,['class' => 'hidden'])}}
                            {{Form::button(' Add To Cart',['class'=> 'btn btn-danger  fa fa-cart-plus fa-lg', 'type'=>'submit'])}}
                            @else
                              {{link_to_route('user.signin',' Sign in to add to cart',null,['class'=>'btn btn-primary fa fa-sign-in'])}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

@endsection
