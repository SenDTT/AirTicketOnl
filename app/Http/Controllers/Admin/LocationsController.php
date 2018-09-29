<?php

namespace App\Http\Controllers\Admin;

use App\Locations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationsController extends Controller
{
    public function index()
    {
        $locations = Locations::all();
        return view('backend.locations.index',compact('locations'));
    }

    public function create()
    {
        return view('backend.locations.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'location_code' => 'required|max:255',
            'location_name' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();
        $location = Locations::create($data);
        return redirect()->route('locations.index');
    }

    public function edit($id)
    {
        $locations = Locations::find($id);
        return view('backend.locations.edit',compact('locations'));
    }

    public function update($id,Request $request)
    {
        $this->validate($request, [
            'location_code' => 'required|max:255',
            'location_name' => 'required',
            'description' => 'required',
        ]);

        $locations = Locations::find($id);

        $locations->location_code = $request->location_code;
        $locations->location_name = $request->location_name;
        $locations->description = $request->description;
        $locations->save();
        return redirect()->route('locations.index');
    }

    public function destroy($id)
    {
        // delete
        $location = Locations::find($id);
        $location->delete();

        return redirect()->route('locations.index');
    }
}
