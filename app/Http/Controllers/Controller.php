<?php

namespace App\Http\Controllers;

use App\Models\Analisa;
use App\Models\Astm;
use App\Models\Iso;
use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dataReport() {
        $report = Report::get();

        return view('pages.data-report', compact('report'));
    }

    public function profil() {
        return view('pages.user-profile');
    }

    public function updateProfil(Request $request) {
        $pw = Hash::check($request->input('password'), Auth::user()->password);
        if ($pw == false) {
            return redirect()->back()->with('error-password', 'Wrong password!');
        }elseif ($pw == true) {
            $user = User::find(Auth::user()->id);
            $user->update([
                'name' => $request->input('nama'),
                'email' => $request->input('email')
            ]);

            return redirect()->back()->with('success-profile', 'Update profile success!');
        }
    }

    public function updatePassword(Request $request) {
        $pw = Hash::check($request->input('current_password'), Auth::user()->password);
        if ($pw == false) {
            return redirect()->back()->with('current-password', 'Wrong password!');
        }elseif ($pw == true) {
            $this->validate($request, [
                'new_password' => 'string|min:8',
                'confirm_password' => 'min:8|same:new_password'
            ]);

            $user = User::find(Auth::user()->id);
            $user->update([
                'password' => Hash::make($request->input('new_password'))
            ]);

            return redirect()->back()->with('success-password', 'Password has change!');
        }
    }

    public function deleteAnalisa($id) {
        $analisa = Analisa::find($id);
        $report = Report::with('analisa')->where('analisa_id', $id)->first();
        if($analisa->standard == 'RAPID') {
            if($report != null) {
                $report->delete();
            }
            $analisa->delete();
            if($analisa->iso_id != null) {
                $analisa->iso->delete();
            }
        }
        else if($analisa->standard == 'ASTM') {
            if($report != null) {
                $report->delete();
            }
            $analisa->delete();
            if($analisa->astm_id != null) {
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
        }

        return redirect()->route('hasil-analisa-lab')->with('success', 'Data dengan Job No: [' . $analisa->job_no . '] | Kode Sampel: [' . $analisa->lab_sample_id . '] berhasil dihapus!');
    }

    public function printReport($id) {
        $report = Report::find($id);
        $analisa = Analisa::find($report->analisa_id);
        $count = Analisa::where('job_no', $analisa->job_no)->count();

        return view('layouts.print-report', compact('report', 'count'));
    }

    public function updateMethodRapid(Request $request, $id) {
        $iso = Iso::find($id);
        $iso->update([
            'method_ash' => $request->input('method_ash'),
            'method_sulfur' => $request->input('method_sulfur')
        ]);

        return redirect()->back()->with('succes', 'Method berhasil ditambahkan! Anda dapat mencetak Report of Analysis!');
    }

    public function updateMethodAstm(Request $request, $id) {
        $astm = Astm::find($id);
        $astm->totalMoist->update(['tm_method' => $request->input('method_tm')]);
        $astm->proximate->moist->update(['mo_method' => $request->input('method_moist')]);
        $astm->proximate->ash->update(['ash_method' => $request->input('method_ash')]);
        $astm->proximate->volatile->update(['vo_method' => $request->input('method_volatile')]);
        $astm->proximate->carbon->update(['ca_method' => $request->input('method_carbon')]);
        $astm->sulfur->update(['su_method' => $request->input('method_ts')]);
        $astm->gross->update(['gr_method' => $request->input('method_gross')]);

        return redirect()->back()->with('succes', 'Method berhasil ditambahkan! Anda dapat mencetak Report of Analysis!');
    }
}
