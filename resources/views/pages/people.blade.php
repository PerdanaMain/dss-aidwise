@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-4">
                <!-- Data Tables -->
                <div class="col-12">
                    <div class="card p-4">

                        {{-- Add People --}}
                        <div class="d-block">
                            <button type="button" class="btn btn-outline-primary my-3" data-bs-toggle="modal"
                                data-bs-target="#basicModal">
                                Add People
                            </button>
                            <button type="button" class="btn btn-outline-warning my-3 ms-2" data-bs-toggle="modal"
                                data-bs-target="#addPeoples">
                                Add Peoples
                            </button>
                        </div>

                        <!-- Modal People -->
                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('people.store') }}" method="post">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel1">New People</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-2 mt-2">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="codeName" class="form-control"
                                                            name="code_name" placeholder="Masukkan Nama Kode"
                                                            value="A{{ count($peoples) + 1 }}" readonly />
                                                        <label for="codeName">Kode Alternatif</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2 g-2">
                                                <div class="col mb-2">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="name" class="form-control"
                                                            name="name" placeholder="Masukkan Nama" />
                                                        <label for="input-income">Nama</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-2">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" id="phone" class="form-control"
                                                            name="phone" placeholder="Masukkan No Telp" />
                                                        <label for="phone">No Telp</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-4">
                                                    <div class="form-floating form-floating-outline">
                                                        <textarea class="form-control h-px-100" id="address" name="address" placeholder="Masukkan Alamat"></textarea>
                                                        <label for="address">Alamat</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-outline-success">Save </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- Modal Peoples --}}
                        <div class="modal fade" id="addPeoples" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('people.store') }}" method="post">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel1">Add Peoples</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 mb-2 mt-2">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="file" id="people_excel" class="form-control"
                                                            name="people_excel" placeholder="Masukkan File Excel" />
                                                        <label for="people_excel">File Excel</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-2 mt-2">
                                                    <a href="" class="btn btn-warning">Template Data</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-outline-success">Save </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- End Add People --}}

                        <div class="table-responsive">
                            <table id="table" class="table" style="width:100%">
                                <thead class="table-light">
                                    <tr class="text-center">
                                        <th class="text-truncate">Code Name</th>
                                        <th class="text-truncate">Nama</th>
                                        <th class="text-truncate">No Telp</th>
                                        <th class="text-truncate">Alamat</th>
                                        <th class="text-truncate">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peoples as $p)
                                        <tr>
                                            <td class="text-truncate">{{ $p->code_name }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-sm me-3">
                                                        <img src="../assets/img/avatars/{{ rand(1, 5) }}.png"
                                                            alt="Avatar" class="rounded-circle" />
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 text-truncate">{{ $p->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-truncate">{{ $p->phone }}</td>
                                            <td class="text-truncate">{{ $p->address }}</td>
                                            <td class="text-truncate">
                                                <button class="btn btn-outline-warning"
                                                    data-bs-target="#update{{ $p->people_id }}" data-bs-toggle="modal">
                                                    <span class="mdi mdi-pen"></span></button>
                                                <button class="btn btn-outline-danger" data-id="{{ $p->people_id }}"
                                                    id="delete-people">
                                                    <span class="mdi mdi-trash-can-outline"></span></button>
                                            </td>
                                        </tr>

                                        {{-- Update People --}}
                                        <div class="modal fade" id="update{{ $p->people_id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ route('people.update', ['id' => $p->people_id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel1">Update People
                                                            </h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col mb-4 mt-2">
                                                                    <div class="form-floating form-floating-outline">
                                                                        <input type="text" id="codeName"
                                                                            class="form-control" name="code_name"
                                                                            placeholder="Masukkan Nama Kode"
                                                                            value="{{ $p->code_name }}" readonly />
                                                                        <label for="codeName">Kode Alternatif</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col mb-4 mt-2">
                                                                    <div class="form-floating form-floating-outline">
                                                                        <input type="text" id="name"
                                                                            class="form-control" name="name"
                                                                            placeholder="Masukkan Nama"
                                                                            value="{{ $p->name }}" />
                                                                        <label for="input-income">Nama</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row g-2">
                                                                <div class="col mb-2">
                                                                    <div class="form-floating form-floating-outline">
                                                                        <div
                                                                            class="form-floating form-floating-outline mb-4">
                                                                            <input type="email" id="email"
                                                                                class="form-control" name="email"
                                                                                placeholder="Masukkan Email"
                                                                                value="{{ $p->email }}" />
                                                                            <label for="input-income">Email</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col mb-2">
                                                                    <div class="form-floating form-floating-outline">
                                                                        <input type="text" id="phone"
                                                                            class="form-control" name="phone"
                                                                            placeholder="Masukkan No Telp"
                                                                            value="{{ $p->phone }}" />
                                                                        <label for="phone">No Telp</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col mb-4">
                                                                    <div class="form-floating form-floating-outline">
                                                                        <textarea class="form-control h-px-100" id="address" name="address" placeholder="Masukkan Alamat">{{ $p->address }}</textarea>
                                                                        <label for="address">Alamat</label>
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
                                        {{-- End Update People --}}
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

        // get delete valuation id
        $(document).on('click', '#delete-people', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this people?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/people/' + id,
                        type: 'DELETE',
                        data: {
                            _token: $("input[name=_token]").val()
                        },
                        success: function(response) {
                            console.log(response)
                            if (response.status == true) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                })
                            } else {
                                Swal.fire(
                                    'Failed!',
                                    'Your file has been failed to delete.',
                                    'error'
                                )
                            }
                        }
                    });
                }
            })
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
