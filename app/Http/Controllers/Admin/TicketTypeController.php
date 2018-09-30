<?php

namespace App\Http\Controllers\Admin;

use App\TicketType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketTypes = TicketType::all();
        return view('backend.ticketType.index',compact('ticketTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ticketType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate(TicketType::$rules);

        TicketType::create($attributes);

        return redirect()->route('ticketType.index');
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
    public function edit(TicketType $ticketType)
    {

        return view('backend.ticketType.edit',compact('ticketType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketType $ticketType)
    {
        $attributes = request()->validate(TicketType::$rules);

        $ticketType->fill($attributes)->save();

        return redirect()->route('ticketType.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketType $ticketType)
    {
        $ticketType->delete();
        return redirect()->route('ticketType.index');
    }
}
