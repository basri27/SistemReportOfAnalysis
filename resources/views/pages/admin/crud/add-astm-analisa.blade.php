@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Input Hasil Analisa (Standard ASTM) | Sistem Report of Analysis')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Input Hasil Analisa'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Form Input Data Hasil Analisa (Standard ASTM)</h6>
                    <hr>
                </div>
                <form action="{{ route('create-analisa-astm') }}" method="POST">
                    @csrf
                    <div class="card-body pt-0 pb-2">
                        <h6><u>Draft Report</u></h6>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="mb-1">Job No.</label>
                                <input type="text" name="job_no" id="job_no" value="{{ old('job_no') }}"
                                    class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Kode</label>
                                <input type="text" name="kode" id="kode" value="{{ old('kode') }}"
                                    class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Kode Sample</label>
                                <input type="text" name="kode_sampel" id="kode_sampel" value="{{ old('kode_sampel') }}"
                                    class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Client</label>
                                <input type="text" name="client" id="client" value="{{ old('client') }}"
                                    class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Kode Seam</label>
                                <input type="text" name="kode_seam" id="kode_seam" value="{{ old('kode_seam') }}"
                                    class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Kontraktor</label>
                                <input type="text" name="kontraktor" id="kontraktor" value="{{ old('kontraktor') }}"
                                    class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Lab Sample ID</label>
                                <input type="text" name="sampel_id" id="sampel_id" value="{{ old('sampel_id') }}"
                                    class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Status</label>
                                <input type="text" name="status" id="status" value="{{ old('status') }}"
                                    class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">TAT</label>
                                <input type="number" min="0" name="tat" id="tat"
                                    value="{{ old('tat') }}" class="form-control form-control-sm mb-2">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Tgl. Sample</label>
                                <input type="date" name="tgl_sampel" id="tgl_sampel" value="{{ old('tgl_sampel') }}"
                                    class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">ADL-A</label>
                                <input type="number" step="any" min="0" name="adl_a" id="adl_a"
                                    value="{{ old('adl_a') }}" class="form-control form-control-sm mb-2">
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="mb-1">Principal</label>
                                <input type="text" name="principal" id="principal" value="{{ old('principal') }}"
                                    class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Address</label>
                                <textarea name="address" id="address" rows="1" class="form-control form-control-sm" required>{{ old('address') }}</textarea>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Attention</label>
                                <input type="text" name="attention" id="attention" value="{{ old('attention') }}"
                                    class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Refference Order</label>
                                <input type="text" name="refforder" id="refforder" value="{{ old('refforder') }}"
                                    class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Consignment</label>
                                <input type="text" name="consignment" id="consignment"
                                    value="{{ old('consignment') }}" class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Weights Sample (Kgs)</label>
                                <input type="number" min="0" step="any" name="weight" id="weight"
                                    value="{{ old('weight') }}" class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Date Recieve</label>
                                <input type="date" name="date_recieve" id="date_recieve"
                                    value="{{ old('date_recieve') }}" class="form-control form-control-sm mb-2" required>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Date Reported</label>
                                <input type="date" name="date_reported" id="date_reported"
                                    value="{{ old('date_reported') }}" class="form-control form-control-sm mb-2"
                                    required>
                            </div>
                        </div>
                        <hr>
                        <h6><u>Nilai Parameter Hasil Analisa (%)</u>
                            <sup class="text-xxs text-danger">*Diisi oleh bagian lab</sup>
                        </h6>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="mb-1">Total Moisture (TM-C)</label>
                                <input type="number" step="any" min="0" name="total_moist" id="total_moist"
                                    class="form-control form-control-sm mb-2" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Moisture in Analysis Sample(IM-A)</label>
                                <input type="number" step="any" min="0" name="moist" id="moist"
                                    class="form-control form-control-sm mb-2" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Ash Content(ASH-A)</label>
                                <input type="number" step="any" min="0" name="ash" id="ash"
                                    class="form-control form-control-sm mb-2" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Volatile Matter(VM-A)</label>
                                <input type="number" step="any" min="0" name="volatile" id="volatile"
                                    class="form-control form-control-sm mb-2" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Total Sulfur(TS-A)</label>
                                <input type="number" step="any" min="0" name="sulfur" id="sulfur"
                                    class="form-control form-control-sm mb-2" disabled>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="mb-1">Gross Calorific Value (CV-A)</label>
                                <input type="number" step="any" min="0" name="gross" id="gross"
                                    class="form-control form-control-sm mb-2" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-0 pb-0 pt-0">
                        <hr class="mt-0">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>&nbsp;
                            <a href="{{ route('hasil-analisa-lab') }}" class="btn btn-sm btn-success">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')

@endsection
