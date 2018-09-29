<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Airplanes;

class AirplanesController extends Controller
{
    public function index()
    {
        $airplanes = Airplanes::all();
        return view('backend.airplanes.index', compact('airplanes'));
    }

    public function create()
    {
        return view('backend.airplanes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'airplane_code' => 'required|max:255',
            'airplane_name' => 'required',
        ]);

        $data = $request->all();
        $airplanes = Airplanes::create($data);
        return redirect()->route('airplanes.index');
    }

    public function edit($id)
    {
        $airplanes = Airplanes::find($id);
        return view('backend.airplanes.edit', compact('airplanes'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'airplane_code' => 'required|max:255',
            'airplane_name' => 'required',
        ]);

        $airplanes = Airplanes::find($id);

        $airplanes->airplane_code = $request->airplane_code;
        $airplanes->airplane_name = $request->airplane_name;
        $airplanes->save();
        return redirect()->route('airplanes.index');
    }

    public function destroy($id)
    {
        // delete
        $airplanes = Airplanes::find($id);
        $airplanes->delete();

        return redirect()->route('airplanes.index');
    }
}
