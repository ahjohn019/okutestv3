@extends('master.marketmenu')

@section('content')
<div class="container">
<div class="panel panel-default">
<div class="panel-heading"><h3><strong>Shopping Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></strong></h3></div>
<div class="panel-body">

{{ Form::open(array('action' => 'PaymentController@getPayment', 'method' => 'get')) }}
    @if(count($cartItems) > 0)
<?php $total=0; ?>
    <table name="cart" class="table">
    <tr>
        <td><strong>Item</strong></td>
        <td><strong>Name</strong></td>
        <td><strong>Unit Price</strong></td>
        <td><strong>Quantity</strong></td>
        <td><strong>Delivery Method</strong></td>
        <td><strong>Subtotal</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    @include('include.messages')
    @foreach($cartItems as $cartItem)
    @foreach($products as $product)
    @if ($cartItem->ProductID == $product->id )
    <tr>
        <td align="center"><img src="/image/products/{{$product->productImage1}}" style="max-height: 50px" class="img-responsive" ></td>
        <td>{{$product->productName}}</td>
        <td>RM {{$product->productPrice}}</td>
        <td>{{$cartItem->Quantity}}</td>
        <td>{{$cartItem->DeliveryMethod}}</td>
        <td>RM {{$product->productPrice * $cartItem->Quantity}}</td>
        <?php $total += $product->productPrice * $cartItem->Quantity ?>

        <td>
          {!! Form::open(array('route'=>['cartItem.destroy',$cartItem->id], 'method'=>'DELETE')) !!}

            {{link_to_route('cartItem.edit','',[$cartItem->id],['class'=>'btn btn-primary fa fa-pencil-square-o fa-lg'])}}
            {{Form::button('',['class'=>'btn btn-danger fa fa-times-circle fa-lg', 'type'=>'submit'])}}
            {!! Form::close() !!}

        </td>
    </tr>
    @endif
    @endforeach
    @endforeach
    <tr>
      <td name="grandTotal" align="right" colspan="5">Total :</td>
      <td>RM {{$total}}</td>
      <td><button type="submit" class="btn btn-success fa fa-check-square-o fa-lg">Checkout</button></td>
    </tr>
    </table>
    {{ Form::hidden('productName', $product->productName) }}
    {{ Form::hidden('productPrice', $product->productPrice) }}
    {{ Form::hidden('quantity', $cartItem->Quantity) }}
    {{ Form::hidden('total', $total) }}
    {!! Form::close() !!}
</div>
</div>
@endif
</div>
@endsection
