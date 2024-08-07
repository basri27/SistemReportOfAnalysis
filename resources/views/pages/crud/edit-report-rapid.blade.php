@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('title', 'Input Report of Analysis | Sistem Report of Analysis')
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Input Report of Analysis'])
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
                <form action="{{ route('input-report-rapid', $analisa->id) }}" method="POST">
                    @csrf
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Form Input Data Report of Analysis (Standard RAPID)</h6>
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
                        <h6><u>Ash Content</u></h6>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="" class="mb-1">Result</label>
                                <input type="text" class="form-control form-control-sm mb-2"
                                    value="{{ $analisa->iso->ash }}" disabled>
                            </div>
                            <div class="col-md-11">
                                <label for="" class="mb-1">Methods</label>
                                <input type="text" name="ash_method" id="ash_method" value="{{ old('ash_method') }}"
                                    class="form-control form-control-sm mb-2" required>
                            </div>
                        </div>
                        <hr>
                        <h6><u>Total Sulfur</u></h6>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="" class="mb-1">Result</label>
                                <input type="text" class="form-control form-control-sm mb-2"
                                    value="{{ $analisa->iso->sulfur }}" disabled>
                            </div>
                            <div class="col-md-11">
                                <label for="" class="mb-1">Methods</label>
                                <input type="text" name="sulfur_method" id="sulfur_method"
                                    value="{{ old('sulfur_method') }}" class="form-control form-control-sm mb-2"
                                    required>
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
