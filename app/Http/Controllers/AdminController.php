<?php

namespace App\Http\Controllers;

use App\Models\Analisa;
use App\Models\Astm;
use App\Models\Iso;
use App\Models\Proximate;
use App\Models\Report;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function dashboard() {
        return view('pages.admin.dashboard');
    }

    public function analisa() {
        $analisa = Analisa::with('iso')->with('astm')->get();

        return view('pages.admin.hasil-analisa', compact('analisa'));
    }

    public function analisaReportRapid($id) {
        $analisa = Analisa::find($id);

        return view('pages.crud.add-report-rapid', compact('analisa'));
    }

    public function analisaReportAstm($id) {
        $analisa = Analisa::find($id);

        return view('pages.crud.add-report-astm', compact('analisa'));
    }

    public function inputReportRapid(Request $request, $id){
        $this->validate($request, [
            'page' => 'required'
        ], [
            'required' => 'You should choose page for Report of Analysis'
        ]);
        $analisa = Analisa::find($id);
        $page = $request->input('page');
        $iso = Iso::find($analisa->iso_id);
        $iso->update([
            'method_ash' => $request->input('ash_method'),
            'method_sulfur' => $request->input('sulfur_method')
        ]);

        $report = Report::create([
            'principal' => $request->input('principal'),
            'address' => $request->input('address'),
            'attention' => $request->input('attention'),
            'reff_order' => $request->input('refforder'),
            'consignment' => $request->input('consignment'),
            'weight' => $request->input('weight'),
            'date_recieve' => $request->input('date_recieve'),
            'date_reported' => $request->input('date_reported'),
            'page' => $request->input('page'),
            'analisa_id' => $id
        ]);

        return redirect()->route('success-report', ['id' => $report->id, 'page' => $page]);
    }

    public function inputReportAstm(Request $request, $id) {
        $this->validate($request, [
            'page' => 'required'
        ], [
            'required' => 'You should choose page for Report of Analysis'
        ]);

        $analisa = Analisa::find($id);
        $astm = Astm::find($analisa->astm_id);
        $proximate = Proximate::find($astm->proximate_id);
        $page = $request->input('page');

        $proximate->moist->update(['mo_method' => $request->input('prox_moist_method')]);
        $proximate->ash->update(['ash_method' => $request->input('prox_ash_method')]);
        $proximate->volatile->update(['vo_method' => $request->input('prox_volatile_method')]);
        $proximate->carbon->update(['ca_method' => $request->input('prox_carbon_method')]);
        $astm->sulfur->update(['su_method' => $request->input('sulfur_method')]);
        $astm->gross->update(['gr_method' => $request->input('gross_method')]);
        $astm->totalMoist->update(['tm_method' => $request->input('tot_moist_method')]);

        $report = Report::create([
            'principal' => $request->input('principal'),
            'address' => $request->input('address'),
            'attention' => $request->input('attention'),
            'reff_order' => $request->input('refforder'),
            'consignment' => $request->input('consignment'),
            'weight' => $request->input('weight'),
            'date_recieve' => $request->input('date_recieve'),
            'date_reported' => $request->input('date_reported'),
            'page' => $request->input('page'),
            'analisa_id' => $id
        ]);

        return redirect()->route('success-report', ['id' => $report->id, 'page' => $page]);
    }

    public function successCreateReport($id, $page) {
        $report = Report::find($id);

        return view('pages.success', compact('report', 'page'));
    }

    public function printPreviewRapid($id, $page) {
        $report = Report::find($id);

        return view('layouts.print-preview-rapid', compact('report', 'page'));
    }

    public function printPreviewAstm($id, $page) {
        $report = Report::find($id);

        return view('layouts.print-preview-astm', compact('report', 'page'));
    }
}
