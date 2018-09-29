<?php

namespace App\Http\Controllers\Admin;

use App\SeatClasses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeatClassesController extends Controller
{
    public function index()
    {
        $seatClasses = SeatClasses::all();
        return view('backend.seatClasses.index',compact('seatClasses'));
    }

    public function create()
    {
        return view('backend.seatClasses.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'seat_name' => 'required|max:255',
        ]);

        $data = $request->all();
        SeatClasses::create($data);
        return redirect()->route('seatClasses.index');
    }

    public function edit($id)
    {
        $seatClasses = SeatClasses::find($id);
        return view('backend.seatClasses.edit',compact('seatClasses'));
    }

    public function update($id,Request $request)
    {
        $this->validate($request, [
            'seat_name' => 'required|max:255',
        ]);

        $seatClasses = SeatClasses::find($id);

        $seatClasses->seat_name = $request->seat_name;
        $seatClasses->save();
        return redirect()->route('seatClasses.index');
    }

    public function destroy($id)
    {
        // delete
        $seatClasses = SeatClasses::find($id);
        $seatClasses->delete();

        return redirect()->route('seatClasses.index');
    }
}
