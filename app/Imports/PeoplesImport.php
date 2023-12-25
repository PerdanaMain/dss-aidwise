<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PeoplesImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // collect data
        $data = $collection->toArray();

        // remove header
        unset($data[0]);
        // insert data
        $excel = [];
        foreach ($data as $key => $value) {
            $excel[] = [
                'code_name' => $value[0],
                'name' => $value[1],
                'phone' => $value[2],
                'address' => $value[3],
            ];
        }
        // delete value is code_name already exist
        foreach ($excel as $key => $value) {
            $people = \App\Models\People::where('code_name', $value['code_name'])->first();
            if ($people) {
                unset($excel[$key]);
                return back()->with('add_failed', 'Data gagal ditambahkan, code name ' . $value['code_name'] . ' sudah ada');
            }
        }
        \App\Models\People::insert($excel);
    }
}