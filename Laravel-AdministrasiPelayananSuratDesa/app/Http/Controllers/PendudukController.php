<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Penduduk;
use App\KK;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class PendudukController extends Controller
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
        $datas = Penduduk::get();
        return view('penduduk.index', compact('datas'));
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
            return redirect()->to('/penduduk');
        }

        $kks = KK::get();
        return view('penduduk.create', compact('kks'));
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
            'nik' => 'required|string|max:16',
            'id_kkk' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        if($request->file('foto_ktp')) {
            $file = $request->file('foto_ktp');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('foto_ktp')->move("images/penduduk", $fileName);
            $foto_ktp = $fileName;
        } else {
            $foto_ktp = NULL;
        }

        Penduduk::create([
                'foto_ktp' => $foto_ktp,
                'nik' => $request->get('nik'),
                'id_kkk' => $request->get("id_kkk"),
                'nama_lengkap' => $request->get('nama_lengkap'),
                'tempat_lahir' => $request->get('tempat_lahir'),
                'tanggal_lahir' => $request->get('tanggal_lahir'),
                'jenis_kelamin' => $request->get('jenis_kelamin'),
                'agama' => $request->get('agama'),
                'pendidikan' => $request->get('pendidikan'),
                'pekerjaan' => $request->get('pekerjaan'),
                'status' => $request->get('status'),
                'status_keluarga' => $request->get('status_keluarga'),
                'golongan_darah' => $request->get('golongan_darah'),
                'kewarganegaraan' => $request->get('kewarganegaraan'),
                'nama_ayah' => $request->get('nama_ayah'),
                'nama_ibu' => $request->get('nama_ibu'),
                'email' => $request->get('email'),
                'no_hp' => $request->get('no_hp'),
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('penduduk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_penduduk
     * @return \Illuminate\Http\Response
     */
    public function show($id_penduduk)
    {
        $kk = KK::get();
        $data = Penduduk::findOrFail($id_penduduk);
        return view('penduduk.show', compact('kk', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit($id_penduduk)
    {   
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/penduduk');
        }

        $data = Penduduk::findOrFail($id_penduduk);
        return view('penduduk.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_penduduk)
    {
        if($request->file('foto_ktp')) {
            $file = $request->file('foto_ktp');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('foto_ktp')->move("images/penduduk", $fileName);
            $foto_ktp = $fileName;
        } else {
            $foto_ktp = NULL;
        }

        Penduduk::find($id_penduduk)->update([
            'foto_ktp' => $foto_ktp,
            'nik' => $request->get('nik'),
            'id_kkk' => $request->get('id_kkk'),
            'nama_lengkap' => $request->get('nama_lengkap'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'agama' => $request->get('agama'),
            'pendidikan' => $request->get('pendidikan'),
            'pekerjaan' => $request->get('pekerjaan'),
            'status' => $request->get('status'),
            'status_keluarga' => $request->get('status_keluarga'),
            'golongan_darah' => $request->get('golongan_darah'),
            'kewarganegaraan' => $request->get('kewarganegaraan'),
            'nama_ayah' => $request->get('nama_ayah'),
            'nama_ibu' => $request->get('nama_ibu'),
            'email' => $request->get('email'),
            'no_hp' => $request->get('no_hp'),
            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('penduduk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_penduduk)
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/penduduk');
        }
        
        Penduduk::find($id_penduduk)->delete();

        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('penduduk.index');
    }
}
