<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banks;

class BanksController extends Controller
{
    public function index()
    {
        $banks = Banks::all();
        return view('backend.banks.index',compact('banks'));
    }

    public function create()
    {
        return view('backend.banks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bank_name' => 'required|max:255',
            'account_number' => 'required',
            'account_name' => 'required',
            'branch' => 'required',
            'bank_img' => 'required',
        ]);

        $data = $request->all();
        $banks = Banks::create($data);
        return redirect()->route('banks.index');
    }

    public function edit($id)
    {
        $banks = Banks::find($id);
        return view('backend.banks.edit',compact('banks'));
    }

    public function update($id,Request $request)
    {
        $this->validate($request, [
            'bank_name' => 'required|max:255',
            'account_number' => 'required',
            'account_name' => 'required',
            'branch' => 'required',
            'bank_img' => 'required',
        ]);

        $banks = Banks::find($id);

        $banks->bank_name = $request->bank_name;
        $banks->account_number = $request->account_number;
        $banks->account_name = $request->account_name;
        $banks->branch = $request->branch;
        $banks->bank_img = $request->bank_img;
        $banks->save();
        return redirect()->route('banks.index');
    }

    public function destroy($id)
    {
        // delete
        $bank = Banks::find($id);
        $bank->delete();

        return redirect()->route('banks.index');
    }
}
