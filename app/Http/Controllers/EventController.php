<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Events;
use Session;
use DB;
use App\Organization;

class EventController extends Controller
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
        
                $events = Events::latest()
                ->search($s)
                ->paginate(4);
                
                return view('event.index', compact('events','s')); //
    
     }
 
     
     /**
      * Show the form for creating a new resource.
      *
      * @return Response
      */
     public function createEvent()
     {
        $organizations = Organization::all();
        return View('event.create')->withOrganizations($organizations);
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @return Response
      */
     public function store(Request $request)
     {
         //validate
         $rules = array(
            'name'         => 'required|max:30',
            'desc'         => 'required',
            'start_date'   => 'required',
            'end_date'     => 'required',
            'place'        => 'required',
            'type'         => 'required',
            'org_id'       => 'required|integer'
        );
        $validator = Validator::make(Input::all(),$rules);

        if ($validator -> fails()){
            return Redirect::to('event/create')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } else {
            
            $events = new Events;
            $events->name = Input::get('name');
            $events->desc = Input::get('desc');
            $events->start_date = Input::get('start_date');
            $events->end_date = Input::get('end_date');
            $events->place = Input::get('place');
            $events->type = Input::get('type');
            $events->org_id = Input::get('org_id');
            //authentication
            $events->admin_id = auth()->user()->id;
            $events->save();

             // redirect
         Session::flash('message', 'Successfully created event');
         return Redirect::to('event');
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
        $events = Events::find($id);
        $organizations = Organization::all();
        return view('event.show', ['events'=> $events]);
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return Response
      */
     public function edit($id)
     {
        $events = Events::find($id);
        $organizations = Organization::all();
        $orgs = array();
        foreach ($organizations as $org) {
            $orgs[$org->id] = $org->name;
        }
        return view('event.edit')->withEvents($events)->withOrganizations($orgs);
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
            'name'         => 'required|max:30',
            'desc'         => 'required',
            'start_date'   => 'required',
            'end_date'     => 'required',
            'place'        => 'required',
            'type'         => 'required',
            'org_id'       => 'required|integer'
        );
        $validator = Validator::make(Input::all(),$rules);
 
 
        if ($validator -> fails()){
         return Redirect::to('event/create'.$id)
         ->withErrors($validator)
         ->withInput(Input::except('password'));
     } else {
         $events = Events::find($id);
         $events->name = Input::get('name');
         $events->desc = Input::get('desc');
         $events->start_date = Input::get('start_date');
         $events->end_date = Input::get('end_date');
         $events->place = Input::get('place');
         $events->type = Input::get('type');
         $events->org_id = Input::get('org_id');
          //authentication
          $events->admin_id = auth()->user()->id;
         $events->save();
 
          // redirect
      Session::flash('message', 'Successfully created event');
      return Redirect::to('event');
      }
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return Response
      */
     public function destroy($id)
     {
         // delete
        $events = Events::find($id);
        $events->delete();

        // redirect
        Session::flash('message', 'Successfully deleted events');
        return Redirect::to('event');
     }
 
}
