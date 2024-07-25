<div class="row m-2">
    <p class="text-sm mb-0">Issuing office : PT. Surveyor Carbon Consulting Indonesia</p>
    <p class="text-sm mb-0">Cabang Muara Teweh</p>
    <p class="text-sm mb-0">Jl. H. Koyem RT. 8 Kelurahan Jingah, Kecamatan Teweh Baru</p>
    <p class="text-sm mb-0">Kalimantan Tengah</p>
    <p class="text-sm mb-0">Phone. ( 0519 ) 2020598 / 2097079</p>
    <br>
    <p class="text-sm mb-0">Job No.&nbsp;:
        &nbsp;&nbsp;&nbsp;&nbsp;{{ $report->analisa->job_no }}&nbsp;&nbsp;{{ $report->analisa->kode }}
    </p>
    <br><br>
    <h5 class="text-center">REPORT OF ANALYSIS</h5>

    <table class="m-2 col-6">
        <tr class="text-sm mb-0">
            <td>Principal</td>
            <td>:</td>
            <td><b>{{ $report->principal }}</b></td>
        </tr>
        <tr class="text-sm mb-0">
            <td>Address</td>
            <td>:</td>
            <td>{{ $report->address }}</td>
        </tr>
        <tr class="text-sm mb-0">
            <td>Attention</td>
            <td>:</td>
            <td>{{ $report->attention }}</td>
        </tr>
        <tr class="text-sm mb-0">
            <td>Refference Order</td>
            <td>:</td>
            <td>{{ $report->reff_order }}</td>
        </tr>
        <tr class="text-sm mb-0">
            <td>Consignment</td>
            <td>:</td>
            <td>{{ $report->consignment }}</td>
        </tr>
        <tr class="text-sm mb-0">
            <td>Sample Code</td>
            <td>:</td>
            <td>{{ $report->analisa->kode_sampel }}</td>
        </tr>
        <tr class="text-sm mb-0">
            <td>Lab Sample ID</td>
            <td>:</td>
            <td>{{ $report->analisa->lab_sample_id }}</td>
        </tr>
        <tr class="text-sm mb-0">
            <td>Weights Sample</td>
            <td>:</td>
            <td>{{ $report->weight }} Kgs</td>
        </tr>
        <tr class="text-sm mb-0">
            <td>Date Recieved</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($report->date_recieve)->format('d F Y') }}</td>
        </tr>
        <tr class="text-sm mb-0">
            <td>Date Recieved</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($report->date_reported)->format('d F Y') }}</td>
        </tr>
    </table>
    <hr class="mt-0 m-2" style="height:2px;">
    <p class="text-sm">
        THIS IS TO REPORT, that we have performed the inspection of the coal consignmentnominated
        above. The
        consignments was received by us. The sample has been checked as received with properly
        packed and no sealed
        condition. The sample was prepared and analyzed in accordance with ASTM Standard Methods.
        The results are as
        follows:
    </p>
    <table class="m-2 text-xs table table-bordered border-dark align-middle table-responsive">
        <tr class="text-center">
            <th rowspan="2" colspan="2">Parameter</th>
            <th rowspan="2">Unit</th>
            <th colspan="4">Result</th>
            <th rowspan="2">Methods</th>
        </tr>
        <tr class="text-center">
            <th>AR <br><span class="fw-light">(Ar - Revieved)</span></th>
            <th>ADB <br><span class="fw-light">(Air Dried Basis)</span></th>
            <th>DB <br><span class="fw-light">(Dry Basis)</span></th>
            <th>DAF <br><span class="fw-light">(Dry Ash Free)</span></th>
        </tr>
        <tr>
            <th colspan="2">Total Moisture</th>
            <td>Weight %</td>
            <th class="text-center">{{ $report->analisa->astm->totalMoist->tm_ar }}</th>
            <td class="text-center">-</td>
            <td class="text-center">-</td>
            <td class="text-center">-</td>
            <th>{{ $report->analisa->astm->totalMoist->tm_method }}</th>
        </tr>
        <tr>
            <th rowspan="5">Proximate</th>
        </tr>
        <tr>
            <th>Moisture In the Analysis Sample</th>
            <td>Weight %</td>
            <td class="text-center">-</td>
            <th class="text-center">{{ $report->analisa->astm->proximate->moist->mo_adb }}</th>
            <td class="text-center">-</td>
            <td class="text-center">-</td>
            <th>{{ $report->analisa->astm->proximate->moist->mo_method }}</th>
        </tr>
        <tr>
            <th>Ash Content</th>
            <td>Weight %</td>
            <th class="text-center">{{ $report->analisa->astm->proximate->ash->ash_ar }}</th>
            <th class="text-center">{{ $report->analisa->astm->proximate->ash->ash_adb }}</th>
            <th class="text-center">{{ $report->analisa->astm->proximate->ash->ash_db }}</th>
            <td class="text-center">-</td>
            <th>{{ $report->analisa->astm->proximate->ash->ash_method }}</th>
        </tr>
        <tr>
            <th>Volatile Matter</th>
            <td>Weight %</td>
            <th class="text-center">{{ $report->analisa->astm->proximate->volatile->vo_ar }}</th>
            <th class="text-center">{{ $report->analisa->astm->proximate->volatile->vo_adb }}</th>
            <th class="text-center">{{ $report->analisa->astm->proximate->volatile->vo_db }}</th>
            <th class="text-center">{{ $report->analisa->astm->proximate->volatile->vo_daf }}</th>
            <th>{{ $report->analisa->astm->proximate->volatile->vo_method }}</th>
        </tr>
        <tr>
            <th>Fixed Carbon</th>
            <td>Weight %</td>
            <th class="text-center">{{ $report->analisa->astm->proximate->carbon->ca_ar }}</th>
            <th class="text-center">{{ $report->analisa->astm->proximate->carbon->ca_adb }}</th>
            <th class="text-center">{{ $report->analisa->astm->proximate->carbon->ca_db }}</th>
            <th class="text-center">{{ $report->analisa->astm->proximate->carbon->ca_daf }}</th>
            <th>{{ $report->analisa->astm->proximate->carbon->ca_method }}</th>
        </tr>
        <tr>
            <th colspan="2">Total Sulfur</th>
            <td>Weight %</td>
            <th class="text-center">{{ $report->analisa->astm->sulfur->su_ar }}</th>
            <th class="text-center">{{ $report->analisa->astm->sulfur->su_adb }}</th>
            <th class="text-center">{{ $report->analisa->astm->sulfur->su_db }}</th>
            <th class="text-center">{{ $report->analisa->astm->sulfur->su_daf }}</th>
            <th>{{ $report->analisa->astm->sulfur->su_method }}</th>
        </tr>
        <tr>
            <th colspan="2">Gross Calorific Value</th>
            <td>Weight %</td>
            <th class="text-center">{{ $report->analisa->astm->gross->gr_ar }}</th>
            <th class="text-center">{{ $report->analisa->astm->gross->gr_adb }}</th>
            <th class="text-center">{{ $report->analisa->astm->gross->gr_db }}</th>
            <th class="text-center">{{ $report->analisa->astm->gross->gr_daf }}</th>
            <th>{{ $report->analisa->astm->gross->gr_method }}</th>
        </tr>
    </table>
    <div class="m-3 d-flex justify-content-end">
        <div class="text-center">
            <p class="text-sm mb-0">Muara Teweh,
                {{ \Carbon\Carbon::parse($report->date_reported)->format('d F Y') }}
            </p>
            <p class="text-sm mb-0">For and on behalf of</p>
            <p class="text-sm mb-5"><b>PT. SURVEYOR CARBON CONSULTING INDONESIA</b></p>
            <p class="text-sm mb-0 mt-1"><u>Akhsan Huzaimah</u></p>
            <p class="text-sm">Branch Manager</p>
        </div>
    </div>
    <div class="mt-5 d-flex justify-content-center">
        <div class="text-center">
            <p class="mb-0 text-xs">This report reflects the result of Analysis of the sample(s)
                received at our laboratory and individually labeled and does not refer to any other
                matter. This
                report
                is issued
            </p>
            <p class="mb-0 text-xs"> understanding that it does not relieve parties from their
                contractual obligations. All analysis parameter covered in this report has been
                carried out to the
                best
                of our
            </p>
            <p class="text-xs">in accordance with practice and standards generally accepted in
                trade. Our
                responsibility is limited to the exercise of reasonable care and due diligence.
            </p>
        </div>
    </div>
    <div class="mt-0 d-flex justify-content-between">
        <p class="text-sm mt-0">F-05-PSM-OPR-SCCI-01</p>
        <p class="text-sm mt-0">Page of Total Page</p>
    </div>
</div>
