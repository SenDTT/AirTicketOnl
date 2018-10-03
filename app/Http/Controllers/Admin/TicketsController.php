<?php

namespace App\Http\Controllers\Admin;

use App\Flight;
use App\Reservations;
use App\Tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = Tickets::with('reservation', 'flight')->get();
        return view('backend.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $reservations = Reservations::select('reservation_code', 'id')->get()->pluck('reservation_code', 'id');
        $flights = Flight::select('name', 'id')->get()->pluck('name', 'id');

        return view('backend.tickets.create', compact('flights','reservations'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'reservation_id' => 'required|max:255',
            'flight_id' => 'required',
            'status' => 'required',
        ]);

        $data = $request->all();
        Tickets::create($data);
        return redirect()->route('tickets.index');
    }

    public function edit($id)
    {
        $reservations = Reservations::select('reservation_code', 'id')->get()->pluck('reservation_code', 'id');
        $flights = Flight::select('name', 'id')->get()->pluck('name', 'id');
        $tickets = Tickets::find($id);
        return view('backend.tickets.edit', compact('reservations','flights','tickets'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'reservation_id' => 'required|max:255',
            'flight_id' => 'required',
            'status' => 'required',
        ]);

        $tickets = Tickets::find($id);

        $tickets->reservation_id = $request->reservation_id;
        $tickets->flight_id = $request->flight_id;
        $tickets->status = $request->status;
        $tickets->save();
        return redirect()->route('tickets.index');
    }

    public function destroy($id)
    {
        // delete
        $tickets = Tickets::find($id);
        $tickets->delete();

        return redirect()->route('tickets.index');
    }
}
