<?php

namespace App\Http\Controllers\Admin;

use App\Airline;
use App\BaggagePrices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaggagePricesController extends Controller
{
    public function index()
    {
        $baggagePrices = BaggagePrices::with('airline')->get();
        return view('backend.baggagePrices.index', compact('baggagePrices'));
    }

    public function create()
    {
        $airlines = Airline::select('airline_name', 'id')->get()->pluck('airline_name', 'id');

        return view('backend.baggagePrices.create', compact('airlines'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'weight' => 'required|integer',
            'unit' => 'required',
            'airline_id' => 'required',
            'baggage_price' => 'required|numeric|between:0,500000'
        ]);

        $data = $request->all();
        BaggagePrices::create($data);
        return redirect()->route('baggagePrices.index');
    }

    public function edit($id)
    {
        $airlines = Airline::select('airline_name', 'id')->get()->pluck('airline_name', 'id');
        $baggagePrices = BaggagePrices::find($id);
        return view('backend.baggagePrices.edit', compact('baggagePrices','airlines'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'weight' => 'required|integer',
            'unit' => 'required',
            'airline_id' => 'required',
            'baggage_price' => 'required|numeric|between:0,99.99',
        ]);

        $baggagePrices = BaggagePrices::find($id);

        $baggagePrices->weight = $request->weight;
        $baggagePrices->unit = $request->unit;
        $baggagePrices->airline_id = $request->airline_id;
        $baggagePrices->baggage_price = $request->baggage_price;
        $baggagePrices->save();
        return redirect()->route('baggagePrices.index');
    }

    public function destroy($id)
    {
        // delete
        $baggagePrices = BaggagePrices::find($id);
        $baggagePrices->delete();

        return redirect()->route('baggagePrices.index');
    }
}
