<?php

namespace App\Http\Controllers\Admin;

use App\AirplaneClass;
use App\SeatClasses;
use App\Airplanes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AirplaneClassController extends Controller
{
    public function index()
    {
        $airplaneClasses = AirplaneClass::with('airplane', 'seatClass')->get();
        return view('backend.airplaneClass.index', compact('airplaneClasses'));
    }

    public function create()
    {
        $airplanes = Airplanes::select('airplane_name', 'id')->get()->pluck('airplane_name', 'id');
        $seatClasses = SeatClasses::select('seat_name', 'id')->get()->pluck('seat_name', 'id');


        return view('backend.airplaneClass.create', compact('airplanes', 'seatClasses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'seat_class_id' => 'required|max:255',
            'airplane_id' => 'required',
            'seat_num' => 'required'
        ]);

        $data = $request->all();
        AirplaneClass::create($data);
        return redirect()->route('airplaneClass.index');
    }

    public function edit($id)
    {
        $airplanes = Airplanes::select('airplane_name', 'id')->get()->pluck('airplane_name', 'id');
        $seatClasses = SeatClasses::select('seat_name', 'id')->get()->pluck('seat_name', 'id');
        $airplaneClasses = AirplaneClass::find($id);
        return view('backend.airplaneClass.edit', compact('airplaneClasses','airplanes','seatClasses'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'seat_class_id' => 'required|max:255',
            'airplane_id' => 'required',
            'seat_num' => 'required'
        ]);

        $airplaneClasses = AirplaneClass::find($id);

        $airplaneClasses->seat_class_id = $request->seat_class_id;
        $airplaneClasses->airplane_id = $request->airplane_id;
        $airplaneClasses->seat_num = $request->seat_num;
        $airplaneClasses->save();
        return redirect()->route('airplaneClass.index');
    }

    public function destroy($id)
    {
        // delete
        $airplaneClasses = AirplaneClass::find($id);
        $airplaneClasses->delete();

        return redirect()->route('airplaneClass.index');
    }
}
