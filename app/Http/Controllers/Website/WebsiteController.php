<?php

namespace App\Http\Controllers\Website;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Locations;
use App\Flight;

class WebsiteController extends Controller
{
    public function index()
    {
        $locations = Locations::all();
        return view('frontend.index')->with("locations", $locations);
    }

    public function search(Request $request)
    {
        $locations = Locations::all();

        $from = $request->get('from');
        $to = $request->get('to');
        $toDate = $request->get('toDate');
        $returnDate = $request->get('returnDate');
        $adult = $request->get('adult');
        $child = $request->get('child');
        $baby = $request->get('baby');

        // viet cau truy van

        $flights = Flight::with('route', 'airline', 'airplane')->select(
            'flights.id as id', 'flights.name as name', 'flights.route_id as route_id',
            'flights.airline_id as airline_id', 'flights.airplane_id as airplane_id',
            'flights.depart_date as depart_date', 'flights.arrive_date as arrive_date',
            'flights.flight_time as flight_time', 'flights.flight_price as flight_price',
            'routes.route_code as route_code', 'routes.airport_id_from as airport_id_from',
            'routes.airport_id_to as airport_id_to', 'routes.location_code_from as location_code_from',
            'routes.location_code_to as location_code_to',
            'airlines.airline_code as airline_code', 'airlines.airline_name as airline_name',
            'airlines.carry_on as carry_on', 'airlines.check_in_baggage', 'airlines.airline_img as airline_img',
            'airplanes.airplane_code as airplane_code', 'airplanes.airplane_name as airplane_name'
        )
            ->leftJoin('routes', 'routes.id', '=', 'flights.route_id')
            ->leftJoin('airlines', 'airlines.id', '=', 'flights.airline_id')
            ->leftJoin('airplanes', 'airplanes.id', '=', 'flights.airplane_id')
            ->where('routes.location_code_from', $from)
            ->where('routes.location_code_to', $to)
            ->whereDate('flights.depart_date', '=', $toDate)
            ->get();

        foreach ($flights as $key => $flight) {
            $flights[$key]['ticket'] = Flight::findTicketTypePrice($flight['id']);
        }

        return view('frontend.search', ['locations' => $locations, 'flights' => $flights, 'from' => $from, 'to' => $to,
            'date' => $toDate, 'returnDate' => $returnDate, 'adult' => (int)$adult,
            'child' => (int)$child, 'baby' => (int)$baby]);

    }


    public function cart()
    {
        $carts = Cart::getContent();
        return view('frontend.cart',compact('carts'));
    }

    public function addNewTicket(Request $request)
    {
        $id = $request->get('id');
        $number = $request->get('number');
        $name = $request->get('name');
        $price = $request->get('price');
        $flight_id = $request->get('flight_id');

        $ticket = array(
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'quantity' => $number,
            'attributes' => array(
                'flight_id' => $flight_id
            )
        );
        Cart::add($ticket);

        return response()->json([Cart::getContent()]);
    }


    public function removeTicket(Request $request)
    {
        $id = $request->get('id');

        Cart::remove($id);
        $carts = Cart::getContent();
        $html = (string)view('frontend.ajax.cart',compact('carts'));

        return response()->json(['html' =>$html]);
    }

    public function updateTicket(Request $request)
    {
        $id = $request->get('id');
        $number = $request->get('number');

        $ticket = array(
            'quantity' => array(
                'relative' => false,
                'value' => $number
            ),
        );
        Cart::update($id,$ticket);

        $carts = Cart::getContent();
        $html = (string)view('frontend.ajax.cart',compact('carts'));

        return response()->json(['html' =>$html]);
    }


}
