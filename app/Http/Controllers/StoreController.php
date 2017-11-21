<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Product;
use App\Service;
use App\Event;
Use Image;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stores= Store::all();
      return view('stores.index')->with('stores',$stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('stores.create');
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
            'storeName'=> 'required',
            'storeDesc'=> 'required',
            'storeAddress'=> 'required',
            'storeRepresentative1'=>'required',
            'representativeNum1'=>'required',
            'representativeEmail1'=>'required',
            'storeRepresentative2'=>'required',
            'representativeNum2'=>'required',
            'representativeEmail2'=>'required'
        ]);

        //Create New Store
        //Store::create($request->all());
        $store = new Store;
        $store->storeName = $request->input('storeName');
        $store->storeDesc = $request->input('storeDesc');
        $store->storeAddress = $request->input('storeAddress');
        if($request->hasFile('storeImage')){
          $filename = $request->input('storeName').'_'.time().'-'.'.'.$request->file('storeImage')->getClientOriginalExtension();
          $location = public_path('/image/stores/' . $filename);
          Image::make($request->file('storeImage'))->save($location);
          $store->image = $filename;
        }
        $store->storeRepresentative1 = $request->input('storeRepresentative1');
        $store->representativeNum1 = $request->input('representativeNum1');
        $store->representativeEmail1 = $request->input('representativeEmail1');
        $store->storeRepresentative2 = $request->input('storeRepresentative2');
        $store->representativeNum2 = $request->input('representativeNum2');
        $store->representativeEmail2 = $request->input('representativeEmail2');
        $store->orgID = $request->input('orgID');
        //Save Store
        $store->save();

        //Redirect
        return redirect('org/show/' . $request->input('orgID'))->with('storeAdded','New Store, '.$request->input('storeName').' Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
      $storeID = $store->id;
      $products = product::all()->where('storeID', '=',  $storeID)->where('productStatus', '!=',  'DELETED');
      //$services = service::all()->where('storeID', '=',  $storeID);
      //$events = event::all()->where('storeID', '=',  $storeID);
      return view('stores.show')->with('store',$store)->with('products',$products)->with('storeid',$storeID);//->with('services',$services)->with('events',$events);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
      return view('stores.edit')->with('store',$store);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
      if($request->hasFile('storeImage')){
        if($store->image != 'store.png'){
          unlink(public_path('/image/stores/' . $store->image));
        }
        $filename = $request->input('storeName').'_'.time().'-'.'.'.$request->file('storeImage')->getClientOriginalExtension();
        $location = public_path('/image/stores/' . $filename);
        Image::make($request->file('storeImage'))->save($location);
        $store->image = $filename;
      }
      $store->update($request->all());

      return redirect('org/show/' . $request->input('orgID'))->with('storeAdded',$request->input('storeName').' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
      $store->status = 'Deleted';
      $store->save();
      return redirect('org/show/' . $store->orgID)->with('storeDeleted',$store->storeName.' Deleted');
    }

    public function addNewProduct($storeid){
      return view('products.create')->with('storeid',$storeid);
    }
    public function addNewService($storeid){
      return view('services.create')->with('storeid',$storeid);
    }
    public function addNewEvent($storeid){
      return view('events.create')->with('storeid',$storeid);
    }
}
