<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('pages.lab.hasil-analisa');
    }
    
    public function addDataAnalisaAstm() {
        return view('pages.crud.add-astm-analisa');
    }

    public function addDataAnalisaRapid() {
        return view('pages.crud.add-rapid-analisa');
    }

    public function inputAnalisaRapid(Request $request) {
        dd($request->all());
    }
}
