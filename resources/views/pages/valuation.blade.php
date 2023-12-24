@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-4">
                <!-- Data Tables -->
                <div class="col-12">
                    <div class="card p-4">
                        <div class="table-responsive">
                            <table id="table" class="table" style="width:100%">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-truncate">Code Name</th>
                                        <th class="text-truncate">Description</th>
                                        <th class="text-truncate">Status</th>
                                        <th class="text-truncate">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($valuations as $v)
                                        <tr>
                                            <td class="text-truncate">{{ $v->code_name }}</td>
                                            <td class="text-truncate">{{ $v->description }}</td>
                                            <td class="text-truncate">{{ $v->status }}</td>
                                            <td class="text-truncate">
                                                <button class="btn btn-outline-warning" data-bs-toggle="modal"
                                                    data-bs-target="#edit{{ $v->valuation_id }}">
                                                    <span class="mdi mdi-pen"></span></button>
                                            </td>
                                        </tr>


                                        {{-- Edit Valuation --}}
                                        <div class="modal fade" id="edit{{ $v->valuation_id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ route('valuation.update', ['id' => $v->valuation_id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel1">Update
                                                                Valuation
                                                            </h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col mb-4 mt-2">
                                                                    <div class="form-floating form-floating-outline">
                                                                        <input type="text" id="codeName"
                                                                            class="form-control" name="code_name"
                                                                            placeholder="Masukkan Nama Kode"
                                                                            value="{{ $v->code_name }}" />
                                                                        <label for="codeName">Kode Kriteria</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mb-4 mt-2">
                                                                    <div class="form-floating form-floating-outline">
                                                                        <input type="text" id="description"
                                                                            class="form-control" name="description"
                                                                            placeholder="Masukkan Description"
                                                                            value="{{ $v->description }}" />
                                                                        <label for="description">Deskripsi</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-4 mt-2">
                                                                    <div class="form-floating form-floating-outline">
                                                                        <select class="form-select"
                                                                            id="exampleFormControlSelect1"
                                                                            aria-label="Default select example"
                                                                            name="status">
                                                                            <option selected hidden>{{ $v->status }}
                                                                            </option>
                                                                            <option value="Benefit">Benefit</option>
                                                                            <option value="Cost">Cost</option>
                                                                        </select>
                                                                        <label
                                                                            for="exampleFormControlSelect1">Status</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-outline-success">Save
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        {{-- End Edit Valuation --}}
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <!--/ Data Tables -->
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
            $('#table').DataTable();
        });

        // change income to currency format
        var income = document.querySelectorAll('#income');
        income.forEach(function(item) {
            item.innerHTML = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(item.innerHTML);
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
