@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    {{-- Dash Section --}}
                    <div id="dash-section">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-7">
                                        <div class="container">
                                            <h3 class="mb-4" style="color:#11235A;font-size:30px;font-weight:bold;">
                                                AidWise
                                            </h3>
                                            <span class="text-secondary">AidWise merupakan website sistem pendukung
                                                keputusan yang
                                                memberikan bantuan dengan cara yang bijaksana atau cerdas, menggunakan
                                                metode WP
                                                (Weighted Product) untuk menentukan warga yang layak menerima bantuan
                                                sembako.</span>
                                            <button type="button" class="btn btn-outline-warning d-block my-4"
                                                data-bs-toggle="modal" data-bs-target="#modalScrollable">
                                                Input Data
                                            </button>

                                            <!-- Modal Data Awal -->
                                            <div class="modal fade" id="modalScrollable" tabindex="-1"
                                                aria-labelledby="modalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                                                    <form action="{{ route('peoplevaluation.store') }}" method="post">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Input Data
                                                                    Awal</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive">
                                                                    <table id="table" class="datatables-basic table"
                                                                        style="width:100%">
                                                                        <thead class="table-light">
                                                                            <tr class="text-center">
                                                                                <th class="text-truncate text-center">#</th>
                                                                                @foreach ($valuations as $v)
                                                                                    <th class="text-truncate">
                                                                                        {{ $v->code_name }}</th>
                                                                                @endforeach
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($peoples as $p)
                                                                                <tr>
                                                                                    <td class="text-truncate">
                                                                                        {{ $p->code_name }}</td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="form-floating form-floating-outline mb-4">
                                                                                            <select class="form-select"
                                                                                                id="ownership"
                                                                                                name="ownership[]">
                                                                                                <option selected hidden
                                                                                                    value=0>==
                                                                                                    Status ==
                                                                                                </option>
                                                                                                <option value=5>Sewa
                                                                                                </option>
                                                                                                <option value=1>Milik
                                                                                                    Sendiri</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="ownership">Kepemilikkan
                                                                                                Rumah</label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="form-floating form-floating-outline mb-4">
                                                                                            <select class="form-select"
                                                                                                id="income"
                                                                                                name="income[]">
                                                                                                <option selected hidden
                                                                                                    value=0>==
                                                                                                    Pendapatan ==
                                                                                                </option>
                                                                                                <option value=4>
                                                                                                    < Rp. 1.000.000</option>
                                                                                                <option value=3>Rp.
                                                                                                    1.000.000 - Rp.
                                                                                                    1.500.000
                                                                                                </option>
                                                                                                <option value=2>Rp.
                                                                                                    1.500.000 - Rp.
                                                                                                    2.000.000
                                                                                                </option>
                                                                                                <option value=1>>Rp.
                                                                                                    2.000.000</option>
                                                                                            </select>
                                                                                            <label for="income">Pendapatan
                                                                                                Per
                                                                                                Bulan</label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="form-floating form-floating-outline mb-4">
                                                                                            <select class="form-select"
                                                                                                id="family_dependents"
                                                                                                name="family_dependents[]">
                                                                                                <option selected hidden
                                                                                                    value=0>==
                                                                                                    Tanggungan ==
                                                                                                </option>
                                                                                                <option value=5>
                                                                                                    >= 4 Orang</option>
                                                                                                <option value=4>3 Orang
                                                                                                </option>
                                                                                                <option value=3>2 Orang
                                                                                                </option>
                                                                                                <option value=2>1 Orang
                                                                                                </option>
                                                                                                <option value=1>Tidak Punya
                                                                                                </option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="family_dependents">Tanggungan
                                                                                                Keluarga</label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="form-floating form-floating-outline mb-4">
                                                                                            <select class="form-select"
                                                                                                id="citizen_status"
                                                                                                name="citizen_status[]">
                                                                                                <option selected hidden
                                                                                                    value=0>==
                                                                                                    Status KTP ==
                                                                                                </option>
                                                                                                <option value=1>
                                                                                                    Warga Asli Desa</option>
                                                                                                <option value=5>Bukan Warga
                                                                                                    Asli Desa
                                                                                                </option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="citizen_status">Status
                                                                                                KTP</label>
                                                                                        </div>
                                                                                        <input type="text"
                                                                                            name="people_id[]"
                                                                                            id="people_id{{ $p->people_id }}"
                                                                                            value={{ $p->people_id }}
                                                                                            hidden>
                                                                                        <input type="text"
                                                                                            name="code_name[]"
                                                                                            id="code_name{{ $p->code_name }}"
                                                                                            value={{ $p->code_name }}
                                                                                            hidden>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-outline-success">Hitung WP</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="{{ url('assets/img/dash-logo.png') }}" alt="Rumus Normalisasi">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h3 class="mb-4 text-center" style="color:#11235A;font-size:30px;font-weight:bold;">
                                    Our Method
                                </h3>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="container">
                                            <div class="card" style="background-color: #11235A; padding-bottom:20px;">
                                                <div class="card-body">
                                                    <h3 class="mb-4 text-center"
                                                        style="color:#C6CF9B;font-size:20px;font-weight:bold;">
                                                        Weighted Product (WP)
                                                    </h3>
                                                    <span class="text-white">Weighted Product (WP) adalah metode
                                                        pengambilan keputusan yang menggunakan pembobotan pada setiap
                                                        kriteria dan nilai preferensi untuk menilai opsi. Nilai terbobot
                                                        dari setiap kriteria dijumlahkan untuk menentukan opsi terbaik.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="container">
                                            <div class="card" style="background-color: #11235A;">
                                                <div class="card-body">
                                                    <h3 class="mb-4 text-center"
                                                        style="color:#C6CF9B;font-size:20px;font-weight:bold;">
                                                        Analytical Hierarchy Process (AHP)
                                                    </h3>
                                                    <span class="text-white">Analytical Hierarchy Process (AHP) adalah
                                                        metode pengambilan keputusan yang memecah kompleksitas keputusan
                                                        hierarkis menjadi sub-proses yang lebih kecil, dengan memberikan
                                                        bobot relatif pada kriteria dan sub-kriteria untuk menentukan
                                                        prioritas yang tepat.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Dash Section --}}


                    {{-- WP Method --}}
                    <div id="wp-method">
                        <div class="row gy-4">
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h1 style="color:#11235A;font-size:20px;font-weight:bold;"
                                            class="text-center mb-2">Hasil Perhitungan WP</h1>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="table-winner"
                                                class="datatables-basic table table-bordered text-center"
                                                style="width:100%">
                                                <thead class="table-light">
                                                    <tr class="text-center">
                                                        <th class="text-truncate text-center">Kode</th>
                                                        <th class="text-truncate text-center">Nama</th>
                                                        <th class="text-truncate text-center">No Telp</th>
                                                        <th class="text-truncate text-center">Alamat</th>
                                                        <th class="text-truncate text-center">Nilai</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @if ($highest_people != null)
                                                            <td class="text-truncate"> {{ $highest_people->code_name }}
                                                            </td>
                                                            <td class="text-truncate"> {{ $highest_people->name }}</td>
                                                            <td class="text-truncate"> {{ $highest_people->phone }}</td>
                                                            <td class="text-truncate"> {{ $highest_people->address }}</td>
                                                            <td class="text-truncate"> {{ $highest['value'] }}</td>
                                                        @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <h1 style="color:#11235A;font-size:20px;font-weight:bold;"
                                                class="text-center mb-2">Tabel Bobot Kepentingan</h1>
                                            <table class="datatables-basic table table-bordered text-center"
                                                style="width:100%">
                                                <thead class="table-light">
                                                    <tr class="text-center">
                                                        <th class="text-truncate text-center">#</th>
                                                        <th class="text-truncate text-center">Bobot Kepentingan</th>
                                                        <th class="text-truncate text-center">Pangkat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($bobot as $p)
                                                        <tr>
                                                            <td class="text-truncate">{{ $p['code_name'] }}</td>
                                                            <td class="text-truncate">{{ $p['eigen_vector'] }}</td>
                                                            <td class="text-truncate">{{ $p['rank'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <h1 style="color:#11235A;font-size:20px;font-weight:bold;"
                                                class="text-center mb-2">Tabel Kriteria</h1>
                                            <table class="datatables-basic table table-bordered text-center"
                                                style="width:100%">

                                                <thead class="table-light">
                                                    <tr class="text-center">
                                                        <th class="text-truncate text-center">#</th>
                                                        <th class="text-truncate text-center">Deskripsi</th>
                                                        <th class="text-truncate text-center">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($valuations as $v)
                                                        <tr>
                                                            <td class="text-truncate">{{ $v->code_name }}</td>
                                                            <td class="text-truncate">{{ $v->description }}</td>
                                                            <td class="text-truncate">{{ $v->status }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 style="color:#11235A;font-size:20px;font-weight:bold;"
                                            class="text-center mb-2">Tabel Inisialisasi</h1>
                                        <div class="table-responsive">
                                            <table id="table-nilai-kriteria-wp"
                                                class="datatables-basic table table-bordered text-center"
                                                style="width:100%">
                                                <thead class="table-light">
                                                    <tr class="text-center">
                                                        <th class="text-truncate text-center">#</th>
                                                        @foreach ($valuations as $v)
                                                            <th class="text-truncate">{{ $v->code_name }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pvs as $p)
                                                        <tr>
                                                            <td class="text-truncate">{{ $p['code_name'] }}</td>
                                                            <td class="text-truncate"> {{ $p['ownership'] }}</td>
                                                            <td class="text-truncate"> {{ $p['income'] }}</td>
                                                            <td class="text-truncate"> {{ $p['family_dependents'] }}
                                                            </td>
                                                            <td class="text-truncate"> {{ $p['citizen_status'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 style="color:#11235A;font-size:20px;font-weight:bold;"
                                            class="text-center mb-2">Tabel Vektor S</h1>
                                        <div class="table-responsive">
                                            <table id="table-vektor-s"
                                                class="datatables-basic table table-bordered text-center"
                                                style="width:100%">
                                                <thead class="table-light">
                                                    <tr class="text-center">
                                                        <th class="text-truncate text-center">Alternatif</th>
                                                        <th class="text-truncate text-center">Nilai</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($vektor_s as $vs)
                                                        <tr>
                                                            <td class="text-truncate"> {{ $vs['code_name'] }}</td>
                                                            <td class="text-truncate"> {{ $vs['value'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr class="text-center">
                                                        <td class="text-truncate fw-bold"> Total</td>
                                                        <td class="text-truncate fw-bold"> {{ $vektor_s_total }}</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 style="color:#11235A;font-size:20px;font-weight:bold;"
                                            class="text-center mb-2">Tabel Vektor V</h1>
                                        <div class="table-responsive">
                                            <table id="table-vektor-v"
                                                class="datatables-basic table table-bordered text-center"
                                                style="width:100%">
                                                <thead class="table-light">
                                                    <tr class="text-center">
                                                        <th class="text-truncate text-center">Alternif</th>
                                                        <th class="text-truncate text-center">Nilai</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($vektor_v as $vv)
                                                        <tr>
                                                            <td class="text-truncate"> {{ $vv['code_name'] }}</td>
                                                            <td class="text-truncate"> {{ $vv['value'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr class="text-center">
                                                        <td class="text-truncate fw-bold"> Total</td>
                                                        <td class="text-truncate fw-bold"> {{ $vektor_v_total }}</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 style="color:#11235A;font-size:20px;font-weight:bold;"
                                            class="text-center mb-2">Tabel Ranking Vektor V</h1>
                                        <div class="table-responsive">
                                            <table id="table-rank"
                                                class="datatables-basic table table-bordered text-center"
                                                style="width:100%">
                                                <thead class="table-light">
                                                    <tr class="text-center">
                                                        <th class="text-truncate text-center">Alternatif</th>
                                                        <th class="text-truncate text-center">Rank</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $num = 1; ?>
                                                    @foreach ($vektor_v as $vv)
                                                        <tr>
                                                            <td class="text-truncate"> {{ $vv['code_name'] }}</td>
                                                            <td class="text-truncate"> {{ $num++ }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End WP Method --}}
                </div>
            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        @include('layouts.footer')
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "paging": false,
                "ordering": false,
                "info": true
            });
            $('#table-nilai-kriteria-wp').DataTable({
                "paging": true,
                "ordering": true,
                "info": true
            });
            $('#table-vektor-s').DataTable({
                "paging": true,
                "ordering": true,
                "info": true
            });
            $('#table-vektor-v').DataTable({
                "paging": true,
                "ordering": true,
                "info": true
            });
            $('#table-rank').DataTable({
                "paging": true,
                "ordering": true,
                "info": true
            });

            // get pvs from session
            const pvs = @json(session('pvs'));
            $('#wp-method').hide();

            if (pvs) {
                $('#dash-section').hide();
                $('#wp-method').show();
            } else {
                $('#dash-section').show();
                $('#wp-method').hide();
            }

        });
    </script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ $error }}',
                })
            </script>
        @endforeach
    @endif
    @if (session('add_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success...',
                text: '{{ session('add_success') }}',
            })
        </script>
    @endif
    @if (session('update_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success...',
                text: '{{ session('update_success') }}',
            })
        </script>
    @endif
@endpush
