<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Store;
use App\Product;
use App\CartItem;
Use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products= Product::all();
      return view('products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store)
    {
        $storeID = $store->id;
        return view('products.create')->with('storeid',$storeID);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'productName'=> 'required',
          'productDesc'=> 'required',
          'productPrice'=> 'required',
          'productQuantity'=>'required',
          'productCategory'=>'required',
          'productStatus'=>'required',
          'storeID'=>'required'
      ]);

      //Create New product
      $product = new product;
      $product->productName = $request->input('productName');
      $product->productDesc = $request->input('productDesc');
      $product->productPrice = $request->input('productPrice');
      if($request->hasFile('productImage1')){
        $filename = $request->input('productName').'1'.'_'.time().'-'.'.'.$request->file('productImage1')->getClientOriginalExtension();
        $location = public_path('/image/products/' . $filename);
        Image::make($request->file('productImage1'))->save($location);
        $product->productImage1 = $filename;
      }
      if($request->hasFile('productImage2')){
        $filename = $request->input('productName').'2'.'_'.time().'-'.'.'.$request->file('productImage2')->getClientOriginalExtension();
        $location = public_path('/image/products/' . $filename);
        Image::make($request->file('productImage2'))->save($location);
        $product->productImage2 = $filename;
      }
      if($request->hasFile('productImage3')){
        $filename = $request->input('productName').'3'.'_'.time().'-'.'.'.$request->file('productImage3')->getClientOriginalExtension();
        $location = public_path('/image/products/' . $filename);
        Image::make($request->file('productImage3'))->save($location);
        $product->productImage3 = $filename;
      }
      $product->productQuantity = $request->input('productQuantity');
      $product->productCategory = $request->input('productCategory');
      $product->productStatus = $request->input('productStatus');
      $product->storeID = $request->input('storeID');
      //Save Store
      $product->save();

      //Redirect
      return redirect('store/' . $request->input('storeID'))->with('productAdded','New Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      //$productID = $product->id;
      //$products = product::all()->where('id', '=',  $productID);
      return view('products.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit')->with('product',$product);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
      $product->update($request->all());
      return redirect('store/' . $request->input('storeID'))->with('productUpdated','Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->productStatus = 'DELETED';

        $product->save();
        return redirect('store/' . $product -> storeID)->with('productDeleted','Product has been removed!');
    }

    public function searchProduct(){
      $q = Input::get ( 'q' );

      if( empty($q))
      {$products= Product::all();
      return view('products.index')->with('products',$products);}
      else
      {$products = product::where('productName','LIKE','%'.$q.'%')->get();}

      return view('products.index')->with('products',$products)->with('searchResult',$q);
    }

    public function addToCart(Request $request, $id){
      $product = product::find($id);
      $item = new CartItem;

      $item->userid = $request->input('userid');
      $item->productID = $product->id;
      $item->Quantity = $request->input('Quantity');
      $item->DeliveryMethod = $request->input('DeliveryMethod');
      $item->DeliveryCharges = 0;
      $item->save();
      return redirect()->route('product.index');
    }

}
