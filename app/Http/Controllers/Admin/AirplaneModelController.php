<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AirplaneModel;
use App\Airplanes;

class AirplaneModelController extends Controller
{
    public function index()
    {
        $airplaneModels = AirplaneModel::with('airplane')->get();
        return view('backend.airplaneModel.index', compact('airplaneModels'));
    }

    public function create()
    {
        $airplanes = Airplanes::select('airplane_name', 'id')->get()->pluck('airplane_name', 'id');

        return view('backend.airplaneModel.create', compact('airplanes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'model_code' => 'required|max:255',
            'airplane_id' => 'required',
        ]);

        $data = $request->all();
        AirplaneModel::create($data);
        return redirect()->route('airplaneModel.index');
    }

    public function edit($id)
    {
        $airplanes = Airplanes::select('airplane_name', 'id')->get()->pluck('airplane_name', 'id');
        $airplaneModels = AirplaneModel::find($id);
        return view('backend.airplaneModel.edit', compact('airplaneModels','airplanes'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'model_code' => 'required|max:255',
            'airplane_id' => 'required',
        ]);

        $airplaneModels = AirplaneModel::find($id);

        $airplaneModels->model_code = $request->model_code;
        $airplaneModels->airplane_id = $request->airplane_id;
        $airplaneModels->save();
        return redirect()->route('airplaneModel.index');
    }

    public function destroy($id)
    {
        // delete
        $airplaneModels = AirplaneModel::find($id);
        $airplaneModels->delete();

        return redirect()->route('airplaneModel.index');
    }
}
