<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use Auth;
use Session;
use DB;

class BuatSuratController extends Controller
{
    public function index()
    {
        return view('buatsurat.index');
    }
}
