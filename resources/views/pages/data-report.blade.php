@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Data Report of Analysis | Sistem Report of Analysis')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Data Report of Analysis'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between mb-0">
                    <h6>Data Report of Analysis</h6>
                </div>

                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive">
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
                                        Principal
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Standard
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Attention
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Date Reported
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($report as $item)
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->analisa->job_no }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->analisa->lab_sample_id }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->principal }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->analisa->standard }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->attention }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ \Carbon\Carbon::parse($item->date_reported)->format('d F Y') }}</p>
                                        </td>
                                        <td>
                                            {{-- <a class="text-xs mbb-0"
                                                @if ($item->analisa->standard == 'ASTM') href="{{ route('print-preview-astm', $item->id) }}" @elseif($item->analisa->standard == 'RAPID') href="{{ route('print-preview-rapid', $item->id) }}" @endif
                                                target="_blank">
                                                <u><i class="fas fa-print"></i>&nbsp;Print</u>
                                            </a> --}}
                                            @if ($item->analisa->astm_id != null || $item->analisa->iso_id != null)
                                                <a class="text-xs mb-0" href="{{ route('print-report', $item->id) }}">
                                                    <u><i class="fas fa-print"></i>&nbsp;Print</u>
                                                </a>
                                            @else
                                                <p class="mb-0 text-xxs">Hasil analisa lab belum diinput!</p>
                                            @endif

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
