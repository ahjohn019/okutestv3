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
use App\Organization;
use View;
use DB;
class FrontController extends Controller
{
    public function index()
    {
        $events = Events::latest()->paginate(3);
        return view('front.marketmain', ['events'=> $events]);
    }
    
    public function master()
    {
        return view('master.marketmenu');
    }

     
}
