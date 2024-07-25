@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Print Data Report of Analysis | Sistem Report of Analysis')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Print Data Report of Analysis'])
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="row mt-4 mx-4">

        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between mb-0">
                    <h6>Input Method Data Report of Analysis</h6>
                    <a href="{{ route('data-report') }}" class="btn btn-sm btn-warning">Cancel</a>
                </div>

                <div class="card-body pt-3 pb-2">
                    @if ($report->analisa->standard == 'RAPID')
                        <form action="{{ route('update-method-rapid', $report->analisa->iso->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Ash Content</label>
                                    <input type="text" value="{{ $report->analisa->iso->ash }}"
                                        class="form-control form-control-sm text-center" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Method</label>
                                    <input type="text" name="method_ash" id="method_ash"
                                        value="{{ old('method_ash', $report->analisa->iso->method_ash) }}"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Total Sulfur</label>
                                    <input type="text" value="{{ $report->analisa->iso->sulfur }}"
                                        class="form-control form-control-sm text-center" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Method</label>
                                    <input type="text" name="method_sulfur" id="method_sulfur"
                                        value="{{ old('method_sulfur', $report->analisa->iso->method_sulfur) }}"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-sm col-12"
                                        id="btn-edit">Submit</button>
                                </div>
                            </div>
                        </form>
                    @elseif($report->analisa->standard == 'ASTM')
                        <form action="{{ route('update-method-astm', $report->analisa->astm->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="mb-0">Total Moisture Method</label>
                                    <input type="text" name="method_tm" class="form-control form-control-sm mb-2"
                                        value="{{ old('method_tm', $report->analisa->astm->totalMoist->tm_method) }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="mb-0">Moisture in the Analysis Sample Method</label>
                                    <input type="text" name="method_moist" class="form-control form-control-sm mb-2"
                                        value="{{ old('method_moist', $report->analisa->astm->proximate->moist->mo_method) }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="mb-0">Ash Content Method</label>
                                    <input type="text" name="method_ash" class="form-control form-control-sm mb-2"
                                        value="{{ old('method_ash', $report->analisa->astm->proximate->ash->ash_method) }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="mb-0">Volatile Matter Method</label>
                                    <input type="text" name="method_volatile" class="form-control form-control-sm mb-2"
                                        value="{{ old('method_volatile', $report->analisa->astm->proximate->volatile->vo_method) }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="mb-0">Fixed Carbon Method</label>
                                    <input type="text" name="method_carbon" class="form-control form-control-sm mb-2"
                                        value="{{ old('method_carbon', $report->analisa->astm->proximate->carbon->ca_method) }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="mb-0">Total Sulfur Method</label>
                                    <input type="text" name="method_ts" class="form-control form-control-sm mb-2"
                                        value="{{ old('method_ts', $report->analisa->astm->sulfur->su_method) }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="mb-0">Gross Calorific Value Method</label>
                                    <input type="text" name="method_gross" class="form-control form-control-sm mb-2"
                                        value="{{ old('method_gross', $report->analisa->astm->gross->gr_method) }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-sm col-12"
                                        id="btn-edit">Submit</button>
                                </div>
                            </div>
                        </form>
                    @endif
                    <hr class="mt-0">
                    <p class="text-sm fw-bold">Terdapat {{ $count }} Data Report of Analysis (ROA) dengan No. Job:
                        [{{ $report->analisa->job_no }}] ini. Silahkan pilih halaman untuk data ROA ini pada tombol
                        <strong>"Print"</strong>.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between mb-0">
                    <h6>Print Preview</h6>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle mb-0"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-print"></i>
                            Print
                        </button>
                        <ul class="dropdown-menu">
                            @if ($report->analisa->standard == 'RAPID')
                                @if ($count > 1)
                                    <li><a class="dropdown-item" target="_blank"
                                            href="{{ route('print-preview-rapid', ['id' => $report->id, 'count' => $count, 'page' => 1]) }}">Page
                                            1</a>
                                    </li>
                                    <li><a class="dropdown-item" target="_blank"
                                            href="{{ route('print-preview-rapid', ['id' => $report->id, 'count' => $count, 'page' => 2]) }}">Page
                                            2</a>
                                    </li>
                                @elseif($count <= 1)
                                    <li><a class="dropdown-item" target="_blank"
                                            href="{{ route('print-preview-rapid', ['id' => $report->id, 'count' => $count, 'page' => 1]) }}">Page
                                            1</a>
                                    </li>
                                @endif
                            @elseif ($report->analisa->standard == 'ASTM')
                                @if ($count > 1)
                                    <li><a class="dropdown-item" target="_blank"
                                            href="{{ route('print-preview-astm', ['id' => $report->id, 'count' => $count, 'page' => 1]) }}">Page
                                            1</a>
                                    </li>
                                    <li><a class="dropdown-item" target="_blank"
                                            href="{{ route('print-preview-astm', ['id' => $report->id, 'count' => $count, 'page' => 2]) }}">Page
                                            2</a>
                                    </li>
                                @elseif($count <= 1)
                                    <li><a class="dropdown-item" target="_blank"
                                            href="{{ route('print-preview-astm', ['id' => $report->id, 'count' => $count, 'page' => 1]) }}">Page
                                            1</a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="card-body pt-0 pb-2">
                    @if ($report->analisa->standard == 'RAPID' && $report->analisa->iso_id != null)
                        @include('layouts.print.preview-rapid')
                    @elseif ($report->analisa->standard == 'ASTM' && $report->analisa->astm_id != null)
                        @include('layouts.print.preview-astm')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
@endsection
