@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Data Hasil Analisa | Sistem Report of Analysis')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Data Hasil Analisa'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-light alert-dismissable fade show d-flex justify-content-between" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between mb-0">
                    <h6>Data Hasil Analisa</h6>
                </div>

                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Job No.
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Lab Sample ID
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
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Tgl. Sample
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($analisa as $item)
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->job_no }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->lab_sample_id }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->kode }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->standard }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->kode_sampel }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->client }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ \Carbon\Carbon::parse($item->tgl_sampel)->format('d F Y') }}</p>
                                        </td>
                                        <td class="text-center">
                                            <a @if ($item->standard == 'RAPID') href="{{ route('edit-rapid-analisa', $item->id) }}" @elseif($item->standard == 'ASTM') href="{{ route('edit-astm-analisa', $item->id) }}" @endif
                                                class="text-xs mb-0">
                                                <u><i class="fas fa-edit"></i>Edit</u>
                                            </a>&nbsp;
                                        </td>
                                    </tr>
                                @endforeach

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
