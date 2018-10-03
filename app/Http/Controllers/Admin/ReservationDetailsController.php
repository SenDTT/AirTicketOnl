<?php

namespace App\Http\Controllers\Admin;

use App\ReservationDetails;
use App\Reservations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationDetailsController extends Controller
{
    public function index()
    {
        $reservationDetails = ReservationDetails::all();
        $reservations  = Reservations::select('reservation_code','id')->get()->pluck('reservation_code','id');
        return view('backend.reservationDetails.index', compact('reservationDetails','reservations'));
    }
}
