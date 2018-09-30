<?php

namespace App\Http\Controllers\Admin;

use App\Airline;
use App\Airplanes;
use App\Flight;
use App\TicketType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Route;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::with('route', 'airline', 'airplane')->get();
        return view('backend.flight.index', compact('flights'));
    }

    public function create()
    {
        $airplanes = Airplanes::select('airplane_name', 'id')->get()->pluck('airplane_name', 'id');
        $airlines = Airline::select('airline_name', 'id')->get()->pluck('airline_name', 'id');
        $routes = Route::select('route_name', 'id')->get()->pluck('route_name', 'id');

        return view('backend.flight.create', compact('airplanes', 'airlines', 'routes'));
    }

    public function store(Request $request)
    {
        $attributes = request()->validate(Flight::$rules);

        Flight::create($attributes);

        return redirect()->route('flights.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        $airplanes = Airplanes::select('airplane_name', 'id')->get()->pluck('airplane_name', 'id');
        $airlines = Airline::select('airline_name', 'id')->get()->pluck('airline_name', 'id');
        $routes = Route::select('route_name', 'id')->get()->pluck('route_name', 'id');

        return view('backend.flight.edit', compact('flight', 'airplanes', 'airlines', 'routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {

        $attributes = request()->validate(Flight::$rules);

        $flight->fill($attributes)->save();

        return redirect()->route('flights.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->back();
    }

}
