@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row gy-4">
                <h1 style="color:#11235A;font-size:36px;font-weight:bold;">Tabel Kriteria</h1>
                <div class="col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr class="text-center">
                                            <th class="text-truncate">Kriteria</th>
                                            <th class="text-truncate">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td class="text-truncate fw-bold">Status Kepemilikkan Rumah</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Milik Sendiri</td>
                                            <td class="text-truncate text-center">1</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Sewa</td>
                                            <td class="text-truncate text-center">5</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td class="text-truncate fw-bold">Pendapatan</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">
                                                < Rp. 1.000.000</td>
                                            <td class="text-truncate text-center">4</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Rp. 1.000.000 - Rp. 1.500.000</td>
                                            <td class="text-truncate text-center">3</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Rp. 1.500.000 - Rp. 2.000.000</td>
                                            <td class="text-truncate text-center">2</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">> Rp. 2.000.000</td>
                                            <td class="text-truncate text-center">1</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td class="text-truncate fw-bold">Jumlah Tanggungan Keluarga</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">
                                                >= 4 Anak</td>
                                            <td class="text-truncate text-center">5</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">
                                                3 Anak</td>
                                            <td class="text-truncate text-center">4</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">2 Anak</td>
                                            <td class="text-truncate text-center">3</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">1 Anak</td>
                                            <td class="text-truncate text-center">2</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Tidak Punya</td>
                                            <td class="text-truncate text-center">1</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td class="text-truncate fw-bold">Status KTP</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Asli</td>
                                            <td class="text-truncate text-center">5</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Luar Daerah</td>
                                            <td class="text-truncate text-center">1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr class="text-center">
                                            <th class="text-truncate">Kriteria</th>
                                            <th class="text-truncate">Cost / Benefit</th>
                                            <th class="text-truncate">Kode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($valuations as $v)
                                            <tr>
                                                <td class="text-truncate">{{ $v->description }}</td>
                                                <td class="text-truncate text-center">{{ $v->status }}</td>
                                                <td class="text-truncate text-center">{{ $v->code_name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-4 my-4">
                <h1 style="color:#11235A;font-size:36px;font-weight:bold;">Perhitungan Bobot dengan AHP</h1>
                <span class="text-muted fw-bold">Untuk memperoleh bobot yang digunakan dalam perhitungan WP, AidWise
                    memanfaatkan
                    Metode Analytical Hierarchy Process (AHP)</span>

                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-2" style="color:#11235A;font-size:30px;font-weight:bold;">1. Perbandingan
                                Prioritas</h3>
                            <span class="text-muted fw-bold">Pada kriteria yang telah ditentukan, didapatkan
                                perbandingan
                                prioritas sebagai berikut</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <p class="text-secondary fw-bold text-center mb-1">Perbandingan Prioritas</p>
                                    <thead class="table-light">
                                        <tr class="text-center">
                                            <th class="text-truncate">#</th>
                                            <th class="text-truncate">Status Rumah</th>
                                            <th class="text-truncate">Pendapatan</th>
                                            <th class="text-truncate">Jumlah Tanggungan</th>
                                            <th class="text-truncate">KTP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pcm as $p)
                                            @if ($p['name'] == 'Jumlah Kolom')
                                                <tr class="fw-bold">
                                                    <td class="text-truncate">{{ $p['name'] }}</td>
                                                    <td class="text-truncate">{{ $p['ownership'] }}</td>
                                                    <td class="text-truncate">{{ $p['income'] }}</td>
                                                    <td class="text-truncate">{{ $p['family_dependents'] }}</td>
                                                    <td class="text-truncate">{{ $p['citizen_status'] }}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td class="text-truncate">{{ $p['name'] }}</td>
                                                    <td class="text-truncate">{{ $p['ownership'] }}</td>
                                                    <td class="text-truncate">{{ $p['income'] }}</td>
                                                    <td class="text-truncate">{{ $p['family_dependents'] }}</td>
                                                    <td class="text-truncate">{{ $p['citizen_status'] }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-2" style="color:#11235A;font-size:30px;font-weight:bold;">2. Normalisasi Tiap
                                Kriteria</h3>
                            <span class="text-muted fw-bold">Dilakukan normalisasi dengan rumus sebagai berikut untuk
                                menentukan bobot:</span>
                        </div>
                        <div class="card-body">
                            <span class="fw-bold" style="color:#11235A;">Rumus</span>
                            <div class="row">
                                <div class="col-md-3 col-lg-3">
                                    <img src="{{ url('assets/img/rumus-normalisasi.png') }}" alt="Rumus Normalisasi">
                                </div>
                                <div class="col-lg-2">
                                    <p class="text-secondary fw-bold">Baris kriteria dibagi dengan jumlah dari baris </p>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="table-responsive">
                                    <table class="table">
                                        <p class="text-secondary fw-bold text-center mb-1">Normalisasi</p>
                                        <thead class="table-light">
                                            <tr class="text-center">
                                                <th class="text-truncate">#</th>
                                                <th class="text-truncate">Status Rumah</th>
                                                <th class="text-truncate">Pendapatan</th>
                                                <th class="text-truncate">Jumlah Tanggungan</th>
                                                <th class="text-truncate">KTP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($normalization as $n)
                                                @if ($n['name'] == 'Jumlah Kolom')
                                                    <tr class="fw-bold">
                                                        <td class="text-truncate">{{ $n['name'] }}</td>
                                                        <td class="text-truncate">{{ $n['ownership'] }}</td>
                                                        <td class="text-truncate">{{ $n['income'] }}</td>
                                                        <td class="text-truncate">{{ $n['family_dependents'] }}</td>
                                                        <td class="text-truncate">{{ $n['citizen_status'] }}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td class="text-truncate">{{ $n['name'] }}</td>
                                                        <td class="text-truncate">{{ $n['ownership'] }}</td>
                                                        <td class="text-truncate">{{ $n['income'] }}</td>
                                                        <td class="text-truncate">{{ $n['family_dependents'] }}</td>
                                                        <td class="text-truncate">{{ $n['citizen_status'] }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-2" style="color:#11235A;font-size:30px;font-weight:bold;">3. Eigen Vector
                                (Bobot)</h3>
                            <span class="text-muted fw-bold">Perhitunganntuan nilai bobot yang akan digunakan pada
                                perhitungan WP</span>
                        </div>
                        <div class="card-body">
                            <div class="row my-3">
                                <div class="table-responsive">
                                    <table class="table">
                                        <p class="text-secondary fw-bold text-center mb-1">Eigen Vector (Bobot)</p>
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-truncate">Deskripsi</th>
                                                <th class="text-truncate">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($eigen_vector as $e)
                                                @if ($e['description'] == 'Jumlah Kolom')
                                                    <tr class="fw-bold">
                                                        <td class="text-truncate">{{ $e['description'] }}</td>
                                                        <td class="text-truncate">{{ $e['value'] }}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td class="text-truncate">{{ $e['description'] }}</td>
                                                        <td class="text-truncate">{{ $e['value'] }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
