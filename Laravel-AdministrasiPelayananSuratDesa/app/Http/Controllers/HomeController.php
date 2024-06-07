<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use App\KK;
use App\SkKematian;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk = Penduduk::get();
        $kk = KK::get();
        $sk_kematian = SkKematian::get();
        $datas = Penduduk::get();
        
        return view('home', compact('penduduk', 'kk', 'sk_kematian', 'datas'));
    }
}
