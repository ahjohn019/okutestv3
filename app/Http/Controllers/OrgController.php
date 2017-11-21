<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Organization;
use App\Artist;
use App\Store;
use Session;
use Auth;
use Image;

class OrgController extends Controller
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
     public function getOrganization(Request $request)
     {
        $s = $request->input('s');

        $organizations = Organization::latest()
        ->search($s)
        ->paginate(4);

        return view('organizations.index', compact('organizations','s')); //
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return Response
      */
     public function createOrganization()
     {

        // load the create form (app/views/organizations/create.blade.php)
        $artists=Artist::all();
        return View('organizations.create')->withArtists($artists); //
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
             'name' => 'required|max:30',
             'addr' => 'required',
             'desc' => 'required',
             'region' => 'required',
             'phone_no' => 'required',
             'reg_date' => 'required',
         );
         $validator = Validator::make(Input::all(),$rules);

         //process the login
         if ($validator -> fails()){
             return Redirect::to('org/create')
             ->withErrors($validator)
             ->withInput(Input::except('password'));
         } else {
           // store
           $organizations = new Organization($request->all());
           $organizations->name = Input::get('name');
           $organizations->addr = Input::get('addr');
           $organizations->desc = Input::get('desc');
           $organizations->region = Input::get('region');
           $organizations->phone_no = Input::get('phone_no');
           $organizations->reg_date = Input::get('reg_date');
           //authentication
           $organizations->admin_id = auth()->user()->id;
           //store image
           if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('images/'.$filename);
                Image::make($image)->resize(200,150)->save($location);
                $organizations->image=$filename;
           }
           $organizations->save();
           $organizations->artist()->sync($request->artists,false);
         // redirect
         Session::flash('message', 'Successfully created organizations');
         return Redirect::to('org');
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

         //get the org
         $organizations = Organization::find($id);
         $stores = Store::all()->where('orgID', '=',  $id)->where('status','=','Active');

         //show the view and pass the org to it
         return view('organizations.show', ['organizations'=> $organizations])->with('stores',$stores);

     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return Response
      */
     public function edit($id)
     {
         //get the organizations
         $organizations = Organization::find($id);

         $artists = Artist::all();
         $artists2 = array();
         foreach ($artists as $art) {
             $artists2[$art->id] = $art->Name;
         }
         //show the edit form and pass the org to it
         return view('organizations.edit')->withOrganizations($organizations)->withArtists($artists2);


     }

     /**
      * Update the specified resource in storage.
      *
      * @param  int  $id
      * @return Response
      */
     public function update(Request $request,$id)
     {
         //validate
         $rules = array(
            'name' => 'required|max:30',
            'desc' => 'required',
            'addr' => 'required',
            'region' => 'required',
            'phone_no' => 'required',
            'reg_date' => 'required',
        );
        $validator = Validator::make(Input::all(),$rules);

        //process the login
         if ($validator -> fails()){
             return Redirect::to('org/edit'.$id)
             ->withErrors($validator)
             ->withInput(Input::except('password'));
         } else{
           // store
           $organizations = Organization::find($id);
           $organizations->name = Input::get('name');
           $organizations->desc = Input::get('desc');
           $organizations->addr = Input::get('addr');
           $organizations->region = Input::get('region');
           $organizations->phone_no = Input::get('phone_no');
           $organizations->reg_date = Input::get('reg_date');
           //authenticate
           $organizations->admin_id = auth()->user()->id;
           $organizations->save();

           if(isset($request->artists)){
            $organizations->artist()->sync($request->artists);
           }
           else
           {
            $organizations->artist()->sync(array());
           }

            //store image
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('images/'.$filename);
                Image::make($image)->resize(200,150)->save($location);
                $organizations->image = $filename;
                $organizations->update(Input::all());
            }

         // redirect
         Session::flash('message', 'Successfully updated organizations');
         return Redirect::to('org');
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
        $organizations = Organization::find($id);

        $organizations->delete();

        // redirect
        Session::flash('message', 'Successfully deleted organizations');
        return Redirect::to('org');
     }
     public function addNewStore($organizationID){
       return view('stores.create')->with('organizationID',$organizationID);
     }
}
