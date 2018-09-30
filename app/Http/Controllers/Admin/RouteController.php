<?php

namespace App\Http\Controllers\Admin;

use App\Airport;
use App\Locations;
use App\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function Psy\debug;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::with('airportsFrom','airportsFrom')->orderBy('id','DESC')->get();
        return view('backend.routes.index',compact('routes'));
    }

    public function create()
    {
        $airports = Airport::select('airport_name','id')->get()->pluck('airport_name','id');

        return view('backend.routes.create',compact('airports'));
    }

    public function store(Request $request)
    {
        $attributes = request()->validate(Route::$rules);

        $location_code_from = Locations::find($request->airport_id_from);
        $location_code_to = Locations::find($request->airport_id_to);

        $attributes = array_merge($attributes,[
            'location_code_from' => $location_code_from->location_id,
            'location_code_to' => $location_code_to->location_id
        ]);

        Route::create($attributes);

        return redirect()->route('routes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $route)
    {
        $airports = Airport::select('airport_name','id')->get()->pluck('airport_name','id');

        return view('backend.routes.edit',compact('airports','route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route $route)
    {

        $attributes = request()->validate(Route::$rules);

        $location_code_from = Airport::find($request->airport_id_from);
        $location_code_to = Airport::find($request->airport_id_to);


        $attributes = array_merge($attributes,[
            'location_code_from' => $location_code_from->location_id,
            'location_code_to' => $location_code_to->location_id
        ]);


        $route->fill($attributes)->save();

        return redirect()->route('routes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $route->delete();
        return redirect()->back();
    }
}
