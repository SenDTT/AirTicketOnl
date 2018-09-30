<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Locations;
use App\Flight;

class PostController extends Controller
{
    public function getHome(){
        $locations = Locations::all();

        return view('frontend.flights')->with(['locations' => $locations]);
    }

    public function getFlights($from, $to, $date, $returnDate, $adult, $child, $baby){
        $locations = Locations::all();

        // viet cau truy van

        $flights = Flight::with('route')->select('*')
            ->join('routes', 'routes.id', '=', 'flights.route_id')
            ->where('routes.location_code_from',$from)
            ->where('routes.location_code_to',$to)
            ->where(function ($q) use ($date, $returnDate){
                $q->whereDate('flights.depart_date', '=', $date)
                    ->orWhereDate('flights.depart_date', '=', $returnDate);
            })
            ->get();

        return view('frontend.flights',['locations' => $locations, 'flights' => $flights,'from' => $from, 'to' => $to,
            'date' => $date, 'returnDate' => $returnDate, 'adult' => (int)$adult,
            'child' => (int)$child, 'baby' => (int)$baby]);

    }

    public function postHome(Request $request){
        $locations = Locations::all();
        $validator =  Validator::make($request->all(),
            [
                'txtFrom' => 'required',
                'txtTo' => 'required',
            ],
            [
                'txtFrom.required' => 'Vui lòng chọn điểm đi',
                'txtTo.required' => 'Vui lòng chọn điểm đến',
            ],
            [
                'txtFrom' => 'from',
                'txtTo' => 'to',
                'txtDate' => 'date',
                'cbReturnDate' => 'cbReturnDate',
                'txtReturnDate' => 'returnDate',
                'txtAdult' => 'adult',
                'txtChild' => 'child',
                'txtBaby' => 'baby',
            ]
        );

        if($validator->fails()){
            return redirect('home')->withErrors($validator)->withInput();
        }else{
            $from = $request->txtFrom;
            $to = $request->txtTo;
            $date = $request->txtDate;
            if (isset($request->cbReturnDate)) {
                $returnDate = $request->txtReturnDate;
            } else {
                $returnDate = 'NA';
            }

            $adult = $request->txtAdult;
            $child = $request->txtChild;
            $baby = $request->txtBaby;

            return redirect("/flights/".$from."/".$to."/".$date."/".$returnDate."/".$adult."/".$child."/".$baby)->with(['locations' => $locations]);
        }
    }
}
