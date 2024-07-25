@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Input Hasil Analisa | Sistem Report of Analysis')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Input Hasil Analisa'])
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
                <div class="card-header pb-0">
                    <h6>Form Input Data Hasil Analisa (Standard RAPID)</h6>
                    <hr>
                </div>
                <form action="{{ route('input-analisa-rapid') }}" method="POST">
                    @csrf
                    <div class="card-body pt-0 pb-2">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="mb-1">Job No.</label>
                                <input type="text" name="job_no" id="job_no"
                                    class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Kode</label>
                                <input type="text" name="kode" id="kode"
                                    class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Kode Sample</label>
                                <input type="text" name="kode_sampel" id="kode_sampel"
                                    class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Client</label>
                                <input type="text" name="client" id="client"
                                    class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Kode Seam</label>
                                <input type="text" name="kode_seam" id="kode_seam"
                                    class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Kontraktor</label>
                                <input type="text" name="kontraktor" id="kontraktor"
                                    class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Lab Sample ID</label>
                                <input type="text" name="sampel_id" id="sampel_id"
                                    class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Status</label>
                                <input type="text" name="status" id="status"
                                    class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">TAT</label>
                                <input type="number" min="0" name="tat" id="tat"
                                    class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Tgl. Sample</label>
                                <input type="date" name="tgl_sampel" id="tgl_sampel"
                                    class="form-control form-control-sm mb-2">
                            </div>
                        </div>
                        <hr>
                        <h6><u>Nilai Parameter Hasil Analisa (%)</u></h6>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="mb-1">Ash Content(ASH-A)</label>
                                <input type="number" step="any" min="0" name="ash" id="ash"
                                    class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Total Sulfur(TS-A)</label>
                                <input type="number" step="any" min="0" name="sulfur" id="sulfur"
                                    class="form-control form-control-sm mb-2">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-0 pb-0 pt-0">
                        <hr class="mt-0">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>&nbsp;
                            <a href="{{ route('data-hasil-analisa') }}" class="btn btn-sm btn-success">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')

@endsection
