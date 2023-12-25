<?php

namespace App\Http\Controllers;

use App\Models\People;
use Excel;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
        $peoples = People::all();
        return view('pages.people', compact('peoples'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'phone' => 'required|numeric|regex:/(08)[0-9]{9}/',
            'address' => 'required',
            'code_name' => 'required|unique:peoples',
        ]);

        $arr = [
            "ownership" => 0,
            "income" => 0,
            "citizen_status" => 0,
            "family_dependents" => 0,
        ];

        array_push($data, $arr);

        People::create($data);

        return redirect()->route('people')->with('add_success', 'Data berhasil ditambahkan');
    }
    public function stores(Request $request)
    {
        $data = $request->validate([
            "people_excel" => "required|mimes:xls,xlsx",
        ]);
        // process excel
        Excel::import(new \App\Imports\PeoplesImport, $data["people_excel"]);

        return redirect()->route('people')->with('add_success', 'Data berhasil ditambahkan');
    }

    public function update($id)
    {
        $data = request()->validate([
            'name' => 'required',
            'phone' => 'required|numeric|regex:/(08)[0-9]{9}/',
            'address' => 'required',
            'code_name' => 'required|unique:peoples,code_name,' . $id . ',people_id',
        ]);
        $arr = [
            "ownership" => 0,
            "income" => 0,
            "citizen_status" => 0,
            "family_dependents" => 0,
        ];

        array_push($data, $arr);
        People::where('people_id', $id)->update($data);

        return redirect()->route('people')->with('update_success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        People::where('people_id', $id)->delete();

        // return rest api
        return response()->json([
            'message' => 'Data berhasil dihapus',
            "status" => true,
        ])->setStatusCode(200);

    }
}
