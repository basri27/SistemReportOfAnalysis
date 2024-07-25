<?php

namespace App\Http\Controllers;

use App\Models\Analisa;
use App\Models\Ash;
use App\Models\Astm;
use App\Models\Carbon;
use App\Models\Gross;
use App\Models\Iso;
use App\Models\Moist;
use App\Models\Proximate;
use App\Models\Report;
use App\Models\Sulfur;
use App\Models\TotalMoist;
use App\Models\Volatile;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function dashboard() {
        return view('pages.lab.dashboard');
    }

    public function analisa() {
        $analisa = Analisa::with('iso')->with('astm')->get();

        return view('pages.lab.hasil-analisa', compact('analisa'));
    }
    
    public function addDataAnalisaAstm() {
        return view('pages.crud.add-astm-analisa');
    }

    public function addDataAnalisaRapid() {
        return view('pages.crud.add-rapid-analisa');
    }

    public function inputAnalisaRapid(Request $request) {
        $iso = Iso::create([
            'sulfur' => $request->input('sulfur'),
            'ash' => $request->input('ash')
        ]);

        Analisa::create([
            'job_no' => $request->input('job_no'),
            'kode'  => $request->input('kode'),
            'lab_sample_id' => $request->input('sampel_id'),
            'standard'  => 'RAPID',
            'parameter' => 'RAPID ASH & TS',
            'kode_sampel' => $request->input('kode_sampel'),
            'client' => $request->input('client'),
            'kode_seam' => $request->input('kode_seam'),
            'kontraktor' => $request->input('kontraktor'),
            'status' => $request->input('status'),
            'adl_a' => $request->input('adl_a'),
            'tat' => $request->input('tat'),
            'tgl_sampel' => $request->input('tgl_sampel'),
            'iso_id' => $iso->id,
        ]);

        return redirect()->route('data-hasil-analisa')->with(['success' => 'Data Hasil Analisa (Standard RAPID) berhasil ditambahkan!']);
    }

    public function inputAnalisaAstm(Request $request) {
        $ash_ar = number_format(((100 - $request->input('total_moist')) / (100 - $request->input('moist'))) * $request->input('ash'), 2, '.');
        $ash_db = number_format((100 / (100 - $request->input('moist'))) * $request->input('ash'), 2, '.');
        $vol_ar = number_format(((100 - $request->input('total_moist')) / (100 - $request->input('moist'))) * $request->input('volatile'), 2, '.');
        $vol_db = number_format((100 / (100 - $request->input('moist'))) * $request->input('volatile'), 2, '.');
        $vol_daf = number_format(100 / (100 - $request->input('moist') - $request->input('ash')) * $request->input('volatile'), );
        $ca_ar = 100 - $request->input('total_moist') - $ash_ar - $vol_ar;
        $ca_adb = 100 - $request->input('moist') - $request->input('ash') - $request->input('volatile');
        $ca_db = 100 - $ash_db - $vol_db;
        $ca_daf = number_format(100 / (100 - $request->input('moist') - $request->input('ash')) * $ca_adb, 2, '.');
        $sul_ar = number_format(((100 - $request->input('total_moist')) / (100 - $request->input('moist'))) * $request->input('sulfur'), 2, '.');
        $sul_db = number_format((100 / (100 - $request->input('moist'))) * $request->input('sulfur'), 2, '.');
        $sul_daf = number_format(100 / (100 - $request->input('moist') - $request->input('ash')) * $request->input('sulfur'), 2, '.');
        $gross_ar = number_format(((100 - $request->input('total_moist')) / (100 - $request->input('moist'))) * $request->input('gross'), 0, '.', '');
        $gross_db = number_format((100 / (100 - $request->input('moist'))) * $request->input('gross'), 0, '.', '');
        $gross_daf = number_format(100 / (100 - $request->input('moist') - $request->input('ash')) * $request->input('gross'), 0, '.', '');

        // dd($ash_ar, $ash_db, $vol_ar, $vol_db, $vol_daf, $ca_ar, $ca_adb, $ca_db, $ca_daf, $sul_ar, $sul_db, $sul_daf, $gross_ar, $gross_db, $gross_daf);

        $tot_moist = TotalMoist::create(['tm_ar' => $request->input('total_moist')]);
        $moist = Moist::create(['mo_adb' => $request->input('moist')]);
        $ash = Ash::create([
            'ash_ar' => $ash_ar,
            'ash_adb' => $request->input('ash'),
            'ash_db' => $ash_db,
        ]);
        $volatile = Volatile::create([
            'vo_ar' => $vol_ar,
            'vo_adb' => $request->input('volatile'),
            'vo_db' => $vol_db,
            'vo_daf' => $vol_daf
        ]);
        $carbon = Carbon::create([
            'ca_ar' => $ca_ar,
            'ca_adb' => $ca_adb,
            'ca_db' => $ca_db,
            'ca_daf' => $ca_daf
        ]);
        $sulfur = Sulfur::create([
            'su_ar' => $sul_ar,
            'su_adb' => $request->input('sulfur'),
            'su_db' => $sul_db,
            'su_daf' => $sul_daf
        ]);
        $gross = Gross::create([
            'gr_ar' => $gross_ar,
            'gr_adb' => $request->input('gross'),
            'gr_db' => $gross_db,
            'gr_daf' => $gross_daf
        ]);
        $proximate = Proximate::create([
            'moist_id' => $moist->id,
            'volatile_id' => $volatile->id,
            'carbon_id' => $carbon->id,
            'ash_id' => $ash->id
        ]);
        $astm = Astm::create([
            'proximate_id' => $proximate->id,
            'gross_id' => $gross->id,
            'sulfur_id' => $sulfur->id,
            'total_moist_id' => $tot_moist->id
        ]);

        Analisa::create([
            'job_no' => $request->input('job_no'),
            'kode'  => $request->input('kode'),
            'lab_sample_id' => $request->input('sampel_id'),
            'standard'  => 'ASTM',
            'parameter' => 'TM,PROX,TS,CV',
            'kode_sampel' => $request->input('kode_sampel'),
            'client' => $request->input('client'),
            'kode_seam' => $request->input('kode_seam'),
            'kontraktor' => $request->input('kontraktor'),
            'status' => $request->input('status'),
            'adl_a' => $request->input('adl_a'),
            'tat' => $request->input('tat'),
            'tgl_sampel' => $request->input('tgl_sampel'),
            'astm_id' => $astm->id,
        ]);

        return redirect()->route('data-hasil-analisa')->with(['success' => 'Data Hasil Analisa (Standard ASTM) berhasil ditambahkan!']);
    }

    public function editAnalisaRapid($id) {
        $analisa = Analisa::find($id);

        return view('pages.crud.edit-rapid-analisa', compact('analisa'));
    }

    public function editAnalisaAstm($id) {
        $analisa = Analisa::find($id);

        return view('pages.crud.edit-astm-analisa', compact('analisa'));
    }

    public function updateRapid(Request $request, $id) {
        $analisa = Analisa::find($id);
        $analisa->iso->update([
            'ash' => $request->input('ash'),
            'sulfur' => $request->input('sulfur')
        ]);
        $analisa->update([
            'job_no' => $request->input('job_no'),
            'kode'  => $request->input('kode'),
            'lab_sample_id' => $request->input('sampel_id'),
            'standard'  => 'RAPID',
            'parameter' => 'RAPID ASH & TS',
            'kode_sampel' => $request->input('kode_sampel'),
            'client' => $request->input('client'),
            'kode_seam' => $request->input('kode_seam'),
            'kontraktor' => $request->input('kontraktor'),
            'status' => $request->input('status'),
            'adl_a' => $request->input('adl_a'),
            'tat' => $request->input('tat'),
            'tgl_sampel' => $request->input('tgl_sampel'),
        ]);

        return redirect()->route('data-hasil-analisa')->with(['success' => 'Data hasil analisa Job No: ' . $analisa->kode_sampel . ' (Standard RAPID) berhasil di-update!']);
    }

    public function updateAstm(Request $request, $id) {
        $ash_ar = number_format(((100 - $request->input('total_moist')) / (100 - $request->input('moist'))) * $request->input('ash'), 2, '.');
        $ash_db = number_format((100 / (100 - $request->input('moist'))) * $request->input('ash'), 2, '.');
        $vol_ar = number_format(((100 - $request->input('total_moist')) / (100 - $request->input('moist'))) * $request->input('volatile'), 2, '.');
        $vol_db = number_format((100 / (100 - $request->input('moist'))) * $request->input('volatile'), 2, '.');
        $vol_daf = number_format(100 / (100 - $request->input('moist') - $request->input('ash')) * $request->input('volatile'), );
        $ca_ar = 100 - $request->input('total_moist') - $ash_ar - $vol_ar;
        $ca_adb = 100 - $request->input('moist') - $request->input('ash') - $request->input('volatile');
        $ca_db = 100 - $ash_db - $vol_db;
        $ca_daf = number_format(100 / (100 - $request->input('moist') - $request->input('ash')) * $ca_adb, 2, '.');
        $sul_ar = number_format(((100 - $request->input('total_moist')) / (100 - $request->input('moist'))) * $request->input('sulfur'), 2, '.');
        $sul_db = number_format((100 / (100 - $request->input('moist'))) * $request->input('sulfur'), 2, '.');
        $sul_daf = number_format(100 / (100 - $request->input('moist') - $request->input('ash')) * $request->input('sulfur'), 2, '.');
        $gross_ar = number_format(((100 - $request->input('total_moist')) / (100 - $request->input('moist'))) * $request->input('gross'), 0, '.', '');
        $gross_db = number_format((100 / (100 - $request->input('moist'))) * $request->input('gross'), 0, '.', '');
        $gross_daf = number_format(100 / (100 - $request->input('moist') - $request->input('ash')) * $request->input('gross'), 0, '.', '');

        $analisa = Analisa::find($id);
        $analisa->astm->totalMoist->update(['tm_ar' => $request->input('total_moist')]);
        $analisa->astm->proximate->moist->update(['mo_adb' => $request->input('moist')]);
        $analisa->astm->proximate->ash->update([
            'ash_ar' => $ash_ar,
            'ash_adb' => $request->input('ash'),
            'ash_db' => $ash_db,
        ]);
        $analisa->astm->proximate->volatile->update([
            'vo_ar' => $vol_ar,
            'vo_adb' => $request->input('volatile'),
            'vo_db' => $vol_db,
            'vo_daf' => $vol_daf
        ]);
        $analisa->astm->proximate->carbon->update([
            'ca_ar' => $ca_ar,
            'ca_adb' => $ca_adb,
            'ca_db' => $ca_db,
            'ca_daf' => $ca_daf
        ]);
        $analisa->astm->gross->update([
            'gr_ar' => $gross_ar,
            'gr_adb' => $request->input('gross'),
            'gr_db' => $gross_db,
            'gr_daf' => $gross_daf
        ]);
        $analisa->astm->sulfur->update([
            'su_ar' => $sul_ar,
            'su_adb' => $request->input('sulfur'),
            'su_db' => $sul_db,
            'su_daf' => $sul_daf
        ]);
        $analisa->update([
            'job_no' => $request->input('job_no'),
            'kode'  => $request->input('kode'),
            'lab_sample_id' => $request->input('sampel_id'),
            'standard'  => 'ASTM',
            'parameter' => 'TM,PROX,TS,CV',
            'kode_sampel' => $request->input('kode_sampel'),
            'client' => $request->input('client'),
            'kode_seam' => $request->input('kode_seam'),
            'kontraktor' => $request->input('kontraktor'),
            'status' => $request->input('status'),
            'adl_a' => $request->input('adl_a'),
            'tat' => $request->input('tat'),
            'tgl_sampel' => $request->input('tgl_sampel'),
        ]);

        return redirect()->route('data-hasil-analisa')->with(['success' => 'Data hasil analisa Sample ID: ' . $analisa->lab_sample_id . ' (Standard RAPID) berhasil di-update!']);
    }

    public function deleteAnalisa($id) {
        $analisa = Analisa::find($id);
        $report = Report::with('analisa')->where('analisa_id', $id)->first();
        if($analisa->standard == 'RAPID') {
            if($report != null) {
                $report->delete();
            }
            $analisa->delete();
            $analisa->iso->delete();
        }
        else if($analisa->standard == 'ASTM') {
            if($report != null) {
                $report->delete();
            }
            $analisa->delete();
            $analisa->astm->delete();
            $analisa->astm->gross->delete();
            $analisa->astm->totalMoist->delete();
            $analisa->astm->sulfur->delete();
            $analisa->astm->proximate->delete();
            $analisa->astm->proximate->moist->delete();
            $analisa->astm->proximate->carbon->delete();
            $analisa->astm->proximate->ash->delete();
            $analisa->astm->proximate->volatile->delete();
        }

        return redirect()->route('data-hasil-analisa')->with(['success' => 'Data hasil analisa Sample ID: ' . $analisa->lab_sample_id . ' berhasil dihapus!']);
    }
}
