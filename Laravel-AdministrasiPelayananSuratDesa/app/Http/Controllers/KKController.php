<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\KK;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class KKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = KK::get();
        return view('kk.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/kk');
        }

        return view('kk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_kk' => 'required|string|max:16'
        ]);

        if($request->file('foto_kk')) {
            $file = $request->file('foto_kk');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('foto_kk')->move("images/kk", $fileName);
            $foto_kk = $fileName;
        } else {
            $foto_kk = NULL;
        }

        KK::create([
                'foto_kk' => $foto_kk,
                'no_kk' => $request->get('no_kk'),
                'rt' => $request->get('rt'),
                'rw' => $request->get('rw'),
                'dusun' => $request->get('dusun'),
                'desa' => $request->get('desa'),
                'kecamatan' => $request->get('kecamatan'),
                'kabupaten' => $request->get('kabupaten'),
                'provinsi' => $request->get('provinsi'),
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('kk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_kk
     * @return \Illuminate\Http\Response
     */
    public function show($id_kk)
    {
        $data = KK::findOrFail($id_kk);
        return view('kk.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_kk
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kk)
    {   
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/kk');
        }

        $data = KK::findOrFail($id_kk);
        return view('kk.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_kk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kk)
    {
        if($request->file('foto_kk')) {
            $file = $request->file('foto_kk');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('foto_kk')->move("images/kk", $fileName);
            $foto_kk = $fileName;
        } else {
            $foto_kk = NULL;
        }

        KK::find($id_kk)->update([
            'foto_kk' => $foto_kk,
            'no_kk' => $request->get('no_kk'),
            'rt' => $request->get('rt'),
            'rw' => $request->get('rw'),
            'dusun' => $request->get('dusun'),
            'desa' => $request->get('desa'),
            'kecamatan' => $request->get('kecamatan'),
            'kabupaten' => $request->get('kabupaten'),
            'provinsi' => $request->get('provinsi'),
            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('kk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_kk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kk)
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/kk');
        }
        
        KK::find($id_kk)->delete();

        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('kk.index');
    }
}
