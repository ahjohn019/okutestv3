<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class OrgMarketController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return view('front.orgmarket',['organizations'=>$organizations]);
    }

    /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return Response
      */
      public function show($id)
      {
          
          //get the org
          $organizations = Organization::find($id);
          //random product
          $interested = Organization::where('id', '!=', $id)->get()->random(2);
          //show the view and pass the org to it
          return view('front.orgdetails')->with(['organizations'=> $organizations ,'interested'=>$interested]);
          
      }
}
