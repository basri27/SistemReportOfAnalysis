@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Edit Report of Analysis | Sistem Report of Analysis')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Report of Analysis'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-light alert-dismissable fade show d-flex justify-content-between" role="alert">
                    @foreach ($errors->all() as $error)
                        <strong>{{ $error }}</strong>
                    @endforeach
                    <button type="button" class="btn-close bg-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mb-4">
                <form action="{{ route('edit-report-astm', $analisa->id) }}" method="POST">
                    @csrf
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Form Edit Data Report of Analysis (Standard RAPID)</h6>
                        <div class="col-md-2">
                            <select class="form-select form-select-sm @error('page') is-invalid @enderror" name="page"
                                id="page" required>
                                <option disabled selected hidden>Choose page</option>
                                <option value="1">Page 1</option>
                                <option value="2">Page 2</option>
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="card-body pt-0 pb-2">
                        <div class="row m-0">
                            <table>
                                <tr>
                                    <th>Job No.</th>
                                    <td>:</td>
                                    <td>{{ $analisa->job_no }} </td>
                                </tr>
                                <tr>
                                    <th>Lab Sample ID</th>
                                    <td>:</td>
                                    <td>{{ $analisa->lab_sample_id }} </td>
                                </tr>
                                <tr>
                                    <th>Kode Sample</th>
                                    <td>:</td>
                                    <td>{{ $analisa->kode_sampel }} </td>
                                </tr>
                                <tr>
                                    <th>Client</th>
                                    <td>:</td>
                                    <td>{{ $analisa->client }} </td>
                                </tr>
                                <tr>
                                    <th>Tgl. Sample</th>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($analisa->tgl_sampel)->format('d F Y') }}</td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                        <h6><u>Report of Analysis</u></h6>
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
                                <input type="text" name="consignment" id="consignment" value="{{ old('consignment') }}"
                                    class="form-control form-control-sm mb-2" required>
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
                                    value="{{ old('date_reported') }}" class="form-control form-control-sm mb-2" required>
                            </div>
                        </div>
                        <hr>
                        <h6><u>Total Moisture</u></h6>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="" class="mb-1">AR</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->totalMoist->tm_ar }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">ADB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2" value="-"
                                    disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="-" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DAF</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="-" disabled>
                            </div>
                            <div class="col-md-8">
                                <label for="" class="mb-1">Methods</label>
                                <input type="text" name="tot_moist_method" id="tot_moist_method"
                                    value="{{ old('tot_moist_method') }}" class="form-control form-control-sm mb-2"
                                    required>
                            </div>
                        </div>
                        <hr>
                        <h6><u>Proximate</u></h6>
                        <div class="row">
                            <u>
                                <p class="text-sm font-weight-bold mb-0">Moisture in the Analysis Sample</p>
                            </u>
                            <div class="col-md-1">
                                <label for="" class="mb-1">AR</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="-" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">ADB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->proximate->moist->mo_adb }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="-" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DAF</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="-" disabled>
                            </div>
                            <div class="col-md-8">
                                <label for="" class="mb-1">Methods</label>
                                <input type="text" name="prox_moist_method" id="prox_moist_method"
                                    value="{{ old('prox_moist_method') }}" class="form-control form-control-sm mb-2"
                                    required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <u>
                                <p class="text-sm font-weight-bold mb-0">Ash Content</p>
                            </u>
                            <div class="col-md-1">
                                <label for="" class="mb-1">AR</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->proximate->ash->ash_ar }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">ADB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->proximate->ash->ash_adb }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->proximate->ash->ash_db }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DAF</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="-" disabled>
                            </div>
                            <div class="col-md-8">
                                <label for="" class="mb-1">Methods</label>
                                <input type="text" name="prox_ash_method" id="prox_ash_method"
                                    value="{{ old('prox_ash_method') }}" class="form-control form-control-sm mb-2"
                                    required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <u>
                                <p class="text-sm font-weight-bold mb-0">Volatile Matter</p>
                            </u>
                            <div class="col-md-1">
                                <label for="" class="mb-1">AR</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->proximate->volatile->vo_ar }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">ADB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->proximate->volatile->vo_adb }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->proximate->volatile->vo_db }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DAF</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->proximate->volatile->vo_daf }}" disabled>
                            </div>
                            <div class="col-md-8">
                                <label for="" class="mb-1">Methods</label>
                                <input type="text" name="prox_volatile_method" id="prox_volatile_method"
                                    value="{{ old('prox_volatile_method') }}" class="form-control form-control-sm mb-2"
                                    required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <u>
                                <p class="text-sm font-weight-bold mb-0">Fixed Carbon</p>
                            </u>
                            <div class="col-md-1">
                                <label for="" class="mb-1">AR</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->proximate->carbon->ca_ar }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">ADB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->proximate->carbon->ca_adb }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->proximate->carbon->ca_db }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DAF</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->proximate->carbon->ca_daf }}" disabled>
                            </div>
                            <div class="col-md-8">
                                <label for="" class="mb-1">Methods</label>
                                <input type="text" name="prox_carbon_method" id="prox_carbon_method"
                                    value="{{ old('prox_carbon_method') }}" class="form-control form-control-sm mb-2"
                                    required>
                            </div>
                        </div>
                        <hr>
                        <h6><u>Total Sulfur</u></h6>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="" class="mb-1">AR</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->sulfur->su_ar }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">ADB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->sulfur->su_adb }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->sulfur->su_db }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DAF</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->sulfur->su_daf }}" disabled>
                            </div>
                            <div class="col-md-8">
                                <label for="" class="mb-1">Methods</label>
                                <input type="text" name="sulfur_method" id="sulfur_method"
                                    value="{{ old('sulfur_method') }}" class="form-control form-control-sm mb-2"
                                    required>
                            </div>
                        </div>
                        <hr>
                        <h6><u>Gross Calorific Value</u></h6>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="" class="mb-1">AR</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->gross->gr_ar }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">ADB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->gross->gr_adb }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DB</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->gross->gr_db }}" disabled>
                            </div>
                            <div class="col-md-1">
                                <label for="" class="mb-1">DAF</label>
                                <input type="text" class="text-center form-control form-control-sm mb-2"
                                    value="{{ $analisa->astm->gross->gr_daf }}" disabled>
                            </div>
                            <div class="col-md-8">
                                <label for="" class="mb-1">Methods</label>
                                <input type="text" name="gross_method" id="gross_method"
                                    value="{{ old('gross_method') }}" class="form-control form-control-sm mb-2" required>
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
