<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Airline;
use function Psy\debug;

class AirlineController extends Controller
{
    public function index()
    {
        $airlines = Airline::orderBy('id','DESC')->get();
        return view('backend.airline.index',compact('airlines'));
    }

    public function create()
    {
        return view('backend.airline.create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate(Airline::$rules);

        Airline::create($attributes);

        return redirect()->route('airlines.index');
    }

    public function edit(Airline $airline)
    {
        return view('backend.airline.edit',compact('airline'));
    }

    public function update(Airline $airline, Request $request)
    {
        $attributes = request()->validate(Airline::$rules);

        $airline->fill($attributes)->save();

        return redirect()->route('airlines.index');

    }

    public function destroy(Airline $airline)
    {
        $airline->delete();
        return redirect()->back();
    }
}
