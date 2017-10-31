<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Service;
use Session;

class ServiceController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:admin');        
    }
   /**
     * Display a listing of the resource.
     *
     * @return Response
     */
     public function index(Request $request)
     {
        $s = $request->input('s');
        
                $services = Service::latest()
                ->search($s)
                ->paginate(4);

                return view('service.index', compact('services','s')); //

     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return Response
      */
     public function createService()
     {
        return View('service.create');//
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @return Response
      */
     public function store()
     {
         //validate
         $rules = array(
            'name' => 'required|max:30',
            'desc' => 'required',
            'type' => 'required',
            'price' => 'required',
            
        );
        $validator = Validator::make(Input::all(),$rules);

        if ($validator -> fails()){
            return Redirect::to('service/create')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } else {
            $services = new Service;
            $services->name = Input::get('name');
            $services->desc = Input::get('desc');
            $services->type = Input::get('type');
            $services->price = Input::get('price');
            //authentication
            $services->admin_id = auth()->user()->id;
            $services->save();

             // redirect
         Session::flash('message', 'Successfully created services');
         return Redirect::to('service');
         }
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return Response
      */
     public function show($id)
     {
        $services = Service::find($id);
        return view('service.show', ['services'=> $services]);//
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return Response
      */
     public function edit($id)
     {
        $services = Service::find($id);
        return view('service.edit', ['services'=> $services]);//
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  int  $id
      * @return Response
      */
     public function update($id)
     {
          //validate
          $rules = array(
            'name' => 'required|max:30',
            'desc' => 'required',
            'type' => 'required',
            'price' => 'required',
            
        );
        $validator = Validator::make(Input::all(),$rules);

        if ($validator -> fails()){
            return Redirect::to('service/edit'.$id)
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } else {
            $services = Service::find($id);
            $services->name = Input::get('name');
            $services->desc = Input::get('desc');
            $services->type = Input::get('type');
            $services->price = Input::get('price');
            //authentication
            $services->admin_id = auth()->user()->id;
            $services->save();

             // redirect
         Session::flash('message', 'Successfully updated services');
         return Redirect::to('service');
         }//
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return Response
      */
     public function destroy($id)
     {
        //delete
        $services = Service::find($id);
        $services->delete();
        // redirect
        Session::flash('message', 'Successfully deleted services');
        return Redirect::to('service');
     }
 
}
