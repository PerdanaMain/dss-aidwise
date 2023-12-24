<?php

namespace App\Http\Controllers;

use App\Models\Valuation;

class ValuationController extends Controller
{
    public function index()
    {
        $valuations = Valuation::all();

        return view('pages.valuation', compact('valuations'));
    }

    public function store()
    {

        $data = request()->validate([
            'code_name' => 'required|unique:valuations',
            'description' => 'required|unique:valuations',
            "level" => "required|numeric",
        ]);

        Valuation::create($data);

        return redirect()->route('valuation')->with('add_success', 'Data berhasil ditambahkan');
    }

    public function update($id)
    {
        $data = request()->validate([
            'code_name' => 'required|unique:valuations,code_name,' . $id . ',valuation_id',
            'description' => 'required|unique:valuations,description,' . $id . ',valuation_id',
            "status" => "required",
        ]);

        Valuation::where('valuation_id', $id)->update($data);

        return redirect()->route('valuation')->with('update_success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        Valuation::where('valuation_id', $id)->delete();

        // return rest api
        return response()->json([
            'message' => 'Data berhasil dihapus',
            "status" => true,
        ])->setStatusCode(200);

    }
}
