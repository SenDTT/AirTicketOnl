<?php

namespace App\Http\Controllers\Admin;

use App\ReservationDetails;
use App\Reservations;
use App\TicketTypePrices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationDetailsController extends Controller
{
    public function index()
    {
        $reservationDetails = ReservationDetails::all();
        $reservations  = Reservations::select('id','id')->get()->pluck('id','id');
        $ticketTypePrices  = TicketTypePrices::select('id','id')->get()->pluck('id','id');
        return view('backend.reservationDetails.index', compact('reservationDetails','reservations','ticketTypePrices'));
    }
}
