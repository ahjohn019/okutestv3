<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// This controller is to test MySQL db connection to see if you set it up correctly in the .env file
class TestDBController extends Controller
{
    public function index(Request $request){
        // Test database connection
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration.");
        }

        return view('testdb.index');
    }
}
