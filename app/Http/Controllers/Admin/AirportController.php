<?php

namespace App\Http\Controllers\Admin;

use App\Locations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Airport;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airports = Airport::with('location')->orderBy('id','DESC')->get();
        return view('backend.airport.index',compact('airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Locations::select('location_name','id')->get()->pluck('location_name','id');

        return view('backend.airport.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate(Airport::$rules);

        Airport::create($attributes);

        return redirect()->route('airports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Airport $airport)
    {
        $locations = Locations::select('location_name','id')->get()->pluck('location_name','id');

        return view('backend.airport.edit',compact('airport','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airport $airport)
    {
        $attributes = request()->validate(Airport::$rules);

        $airport->fill($attributes)->save();

        return redirect()->route('airports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airport $airport)
    {
        $airport->delete();
        return redirect()->back();
    }
}
