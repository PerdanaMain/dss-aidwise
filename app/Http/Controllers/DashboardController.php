<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Valuation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // select only  coden_name from valuataion
        $valuations = Valuation::all();

        // select only  coden_name from people
        $peoples = People::all();

        // get pvs from session
        $pvs = session()->get('pvs');
        if ($pvs == null) {
            for ($i = 0; $i < count($peoples); $i++) {
                $pvs[] = [
                    'people_id' => $peoples[$i]->people_id,
                    'code_name' => $peoples[$i]->code_name,
                    'income' => 0,
                    "ownership" => 0,
                    "citizen_status" => 0,
                    "family_dependents" => 0,
                ];
            }
        }

        // priority comparison matrix
        $pcm = [
            "ownership" => [
                "name" => "Status Rumah",
                "ownership" => 1,
                "income" => 0.2,
                "family_dependents" => 0.33,
                "citizen_status" => 0.33,
            ],
            "income" => [
                "name" => "Pendapatan",
                "ownership" => 5,
                "income" => 1,
                "family_dependents" => 3,
                "citizen_status" => 3,
            ],
            "family_dependents" => [
                "name" => "Jumlah Tanggungan",
                "ownership" => 3,
                "income" => 0.33,
                "family_dependents" => 1,
                "citizen_status" => 1,
            ],
            "citizen_status" => [
                "name" => "KTP",
                "ownership" => 3,
                "income" => 0.33,
                "family_dependents" => 1,
                "citizen_status" => 1,
            ],
            "total" => [
                "name" => "Jumlah Kolom",
                "ownership" => 1 + 5 + 3 + 3,
                "income" => 0.2 + 1 + 0.33 + 0.33,
                "family_dependents" => 0.33 + 3 + 1 + 1,
                "citizen_status" => 0.33 + 3 + 1 + 1,
            ],
        ];

        // normalisasi kriteria
        $normalization = [];

        // loop pcm
        foreach ($pcm as $key => $value) {
            $normalization[] = [
                'name' => $value['name'],
                'ownership' => $value['ownership'] / $pcm['total']['ownership'],
                'income' => $value['income'] / $pcm['total']['income'],
                'family_dependents' => $value['family_dependents'] / $pcm['total']['family_dependents'],
                'citizen_status' => $value['citizen_status'] / $pcm['total']['citizen_status'],
            ];
        }

        // eigen vector
        $eigen_vector = [];

        //loop normalisasi
        foreach ($normalization as $key => $value) {
            $eigen_vector[] = [
                'description' => $value['name'],
                'value' => ($value['ownership'] + $value['income'] + $value['family_dependents'] + $value['citizen_status']) / 4,
            ];
        }

        $bobot = [];
        // loop eigen vector and valuation
        foreach ($eigen_vector as $key => $value) {
            foreach ($valuations as $key2 => $value2) {
                $bobot[] = [
                    'code_name' => $value2['code_name'],
                    'description' => $value2['description'],
                    'status' => $value2['status'],
                    'eigen_vector' => $value['value'],
                    'rank' => $value2['status'] == 'Benefit' ? $value['value'] * 1 : $value['value'] * -1,
                ];
            }
        }
        // unset array bobot index 5 to 19
        for ($i = 4; $i < 20; $i++) {
            unset($bobot[$i]);
        }

        $vektor_s = [];
        $vektor_v = [];
        $vektor_s_total = 0;
        $vektor_v_total = 0;

        if ($pvs != null) {
            foreach ($pvs as $key => $value) {
                $vektor_s[] = [
                    'people_id' => $value['people_id'],
                    'code_name' => $value['code_name'],
                    'value' =>
                    pow($value['ownership'], $bobot[0]['rank']) *
                    pow($value['income'], $bobot[1]['rank']) *
                    pow($value['citizen_status'], $bobot[2]['rank']) *
                    pow($value['family_dependents'], $bobot[3]['rank']),
                ];
            }
        }
        // count total value vektor s
        foreach ($vektor_s as $key => $value) {
            $vektor_s_total += $value['value'];
        }

        // loop vektor s
        if ($vektor_s_total != 0) {
            foreach ($vektor_s as $key => $value) {
                $vektor_v[] = [
                    'people_id' => $value['people_id'],
                    'code_name' => $value['code_name'],
                    'value' => $value['value'] / $vektor_s_total,
                ];
            }
        };
        // sort vektor v by value
        $vektor_v = collect($vektor_v)->sortByDesc('value')->toArray();

        // get highest value and people_id vektor v
        $highest = collect($vektor_v)->sortByDesc('value')->first();
        // count total value vektor v
        foreach ($vektor_v as $key => $value) {
            $vektor_v_total += $value['value'];
        }

        // get people from highest people_id
        if ($highest != null) {
            $highest_people = People::where('people_id', $highest['people_id'])->first();
        } else {
            $highest_people = null;
        }
        // dd($bobot, $pvs, $vektor_s, $vektor_v, $highest, $highest_people);

        // save to session
        session()->put('pcm', $pcm);
        session()->put('normalization', $normalization);
        session()->put('eigen_vector', $eigen_vector);

        return view(
            'pages.dashboard',
            compact(
                'valuations',
                'peoples',
                'pvs',
                'bobot',
                'vektor_s',
                'vektor_s_total',
                'vektor_v',
                'vektor_v_total',
                'highest',
                'highest_people'
            )
        );
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $pvs = [];

        // get all peoples
        $peoples = People::all();

        for ($i = 0; $i < count($peoples); $i++) {
            $pvs[] = [
                'people_id' => (int) $data['people_id'][$i],
                'code_name' => $data['code_name'][$i],
                'income' => (int) $data['income'][$i],
                "ownership" => (int) $data['ownership'][$i],
                "citizen_status" => (int) $data['citizen_status'][$i],
                "family_dependents" => (int) $data['family_dependents'][$i],
            ];
        };
        // save pvs to session
        session()->put('pvs', $pvs);

        return back()->with('add_success', 'Data berhasil ditambahkan');
    }

    public function ahpView()
    {
        // get valuation
        $valuations = Valuation::all();

        // get pcm from session
        $pcm = session()->get('pcm');
        $normalization = session()->get('normalization');
        $eigen_vector = session()->get('eigen_vector');

        return view('pages.ahp', compact('valuations', 'pcm', 'normalization', 'eigen_vector'));
    }

    public function template()
    {
        // Download AidWise Template.xlsx from storage/app/public/template
        return response()->download(storage_path('app/public/Template AidWise.xlsx'));
    }
}
