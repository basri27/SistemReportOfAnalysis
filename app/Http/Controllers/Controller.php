<?php

namespace App\Http\Controllers;

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
}
