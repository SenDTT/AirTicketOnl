<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Locations;

class HomeController extends Controller
{
    public function index(){
        $locations = Locations::all();

        return view('frontend.home')->with("locations", $locations);
    }


}
