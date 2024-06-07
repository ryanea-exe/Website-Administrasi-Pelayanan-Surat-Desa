<?php

namespace App\Http\Controllers\BuatSurat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Penduduk;
use App\SkKematian;
use Auth;
use Session;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class KematianController extends Controller
{
    public function index()
    {
        $datas = SkKematian::get();
        return view('buatsurat.kematian.index', compact('datas'));
    }

    public function create()
    {
        $penduduks = Penduduk::get();
        return view('buatsurat.kematian.create', compact('penduduks'));
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
        ]);

        SkKematian::create([
            'nik' => $request->get('nik'),
            'nama_lengkap' => $request->get('nama_lengkap'),
            'umur' => $request->get('umur'),
            'tanggal_meninggal' => $request->get('tanggal_meninggal'),
            'tempat_meninggal' => $request->get('tempat_meninggal'),
            'tempat_makam' => $request->get('tempat_makam'),
            'penyebab_meninggal' => $request->get('penyebab_meninggal')
        ]);

        /**
                $document = file_get_contents("sk_kematian.rtf");
                $filledDocument = $this->fillDocument($document, $data);

        $document = str_replace("#KOTA", $kota, $document);
        $document = str_replace("#TANGGAL", date('d-m-Y', strtotime($tanggal)), $document);
        $document = str_replace("#KELAS", $kelas, $document);
        $document = str_replace("#NAMA", $nama, $document);
        $document = str_replace("#NIS", $nis, $document);
        $document = str_replace("#ALAMAT", $alamat, $document);
        $document = str_replace("#PENYAKIT", $penyakit, $document);
        $document = str_replace("#ORTU", $namaortu, $document);


        // header untuk membuka file yang dihasilkan dengna aplikasi Ms. Word
        // nama file yang dihasilkan adalah surat izin.docx
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=surat.doc");
        header("Content-length: " . strlen($document));
        echo $document;
         */

        alert()->success('Berhasil.', 'Data telah ditambahkan!');
        return redirect()->route('kematian.index');
    }

    public function show($id_kematian)
    {
        $data = SkKematian::findOrFail($id_kematian);
        return view('buatsurat.kematian.show', compact('data'));
    }

    public function destroy($id_kematian)
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/kematian');
        }

        SkKematian::find($id_kematian)->delete();
        alert()->success('Berhasil.', 'Data telah dihapus!');
        return redirect()->route('kematian.index');
    }

    public function ajax(Request $request, $nik)
    {
        $data = Penduduk::where('nik', $nik)->first();
        return response()->json($data);
    }

    public function cetak_surat($id_kematian)
    {
        $data = SkKematian::with('penduduk')->findOrFail($id_kematian);
        // dd($data);
        $templatePath = file_get_contents("template/sk_kematian.rtf");
        // dd($templatePath);

        $templatePath = str_replace("#NO", $data->id_kematian, $templatePath);
        $templatePath = str_replace("#NAMA", $data->nama_lengkap, $templatePath);
        $templatePath = str_replace("#NIK", $data->nik, $templatePath);
        $templatePath = str_replace("#JENIS_KELAMIN", $data->penduduk->jenis_kelamin, $templatePath);
        $templatePath = str_replace("#TEMPAT_LAHIR", $data->penduduk->tempat_lahir, $templatePath);
        $templatePath = str_replace("#TANGGAL_LAHIR", date('d-M-Y', strtotime($data->penduduk->tanggal_lahir)), $templatePath);
        $templatePath = str_replace("#AGAMA", $data->penduduk->agama, $templatePath);
        $templatePath = str_replace("#ALAMAT", $data->penduduk->alamat, $templatePath);
        $templatePath = str_replace("#TANGGAL_MENINGGAL", date('d-M-Y', strtotime($data->tanggal_meninggal)), $templatePath);
        $templatePath = str_replace("#TEMPAT_MENINGGAL", $data->tempat_makam, $templatePath);
        $templatePath = str_replace("#PENYEBAB_MENINGGAL", $data->penyebab_meninggal, $templatePath);
        $templatePath = str_replace("#TANGGAL_SURAT", date('d-M-Y'), $templatePath);

        $fileName = 'surat kematian ' . date('d-M-Y') . '.doc';
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=" . $fileName);
        header("Content-length: " . strlen($templatePath));
        echo $templatePath;
    }
}
