<?php

namespace App\Http\Controllers\Admin;

use App\Reservations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationsController extends Controller
{
    public function index()
    {
        $reservations  = Reservations::all();
        return view('backend.reservations.index', compact('reservations'));
    }

}
