@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Data Hasil Analisa | Sistem Report of Analysis')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Data Hasil Analisa'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            {{-- <div class="alert alert-light" role="alert">
                This feature is available in <strong>Argon Dashboard 2 Pro Laravel</strong>. Check it
                <strong>
                    <a href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        here
                    </a>
                </strong>
            </div> --}}
            <div class="card mb-4">
                <div class="card-header pb-0 mb-0">
                    <h6>Data Hasil Analisa</h6>

                </div>

                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Lab Sample ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Job No.
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Kode
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Standard
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Kode Sample
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Client
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">dawda2daw</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Admin</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Admin</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">22/03/2022</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">22/03/2022</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">22/03/2022</p>
                                    </td>
                                    <td class="text-center">
                                        {{-- <div class="d-flex justify-content-center ">
                                            <a class="btn btn-sm btn-success text-xs" href="#">
                                                Edit</a>&nbsp;
                                            <a class="btn btn-sm btn-danger text-xs" href="#">
                                                Delete
                                            </a>
                                        </div> --}}
                                        <a href="#" class="text-xs mb-0">
                                            <u><i class="fas fa-edit"></i>Edit</u>
                                        </a>&nbsp;
                                        <a href="#" class="text-xs mb-0">
                                            <u><i class="fas fa-trash"></i>Delete</u>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        $('#myTable').DataTable();
    </script>
@endsection
