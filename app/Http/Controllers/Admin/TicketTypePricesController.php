<?php

namespace App\Http\Controllers\Admin;

use App\Flight;
use App\TicketType;
use App\TicketTypePrices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketTypePricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketTypePrices = TicketTypePrices::all();
        return view('backend.ticketTypePrices.index',compact('ticketTypePrices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flights = Flight::select('name','id')->get()->pluck('name','id');
        $ticketType = TicketType::select('ticket_type_name','id')->get()->pluck('ticket_type_name','id');

        return view('backend.ticketTypePrices.create',compact('flights','ticketType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate(TicketTypePrices::$rules);

        TicketTypePrices::create($attributes);

        return redirect()->route('ticketTypePrices.index');
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
    public function edit(TicketTypePrices $ticketTypePrice)
    {
        $flights = Flight::select('name','id')->get()->pluck('name','id');
        $ticketType = TicketType::select('ticket_type_name','id')->get()->pluck('ticket_type_name','id');
        return view('backend.ticketTypePrices.edit',compact('ticketTypePrice','flights','ticketType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketTypePrices $ticketTypePrice)
    {
        $attributes = request()->validate(TicketTypePrices::$rules);

        $ticketTypePrice->fill($attributes)->save();

        return redirect()->route('ticketTypePrices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketTypePrices $ticketTypePrice)
    {
        $ticketTypePrice->delete();
        return redirect()->route('ticketTypePrices.index');
    }
}
