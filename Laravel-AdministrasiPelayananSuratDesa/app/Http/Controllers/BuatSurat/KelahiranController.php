<?php

namespace App\Http\Controllers\BuatSurat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\SkKelahiran;
use Auth;
use Session;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;

class KelahiranController extends Controller
{
    public function index()
    {
        $datas = SkKelahiran::get();
        return view('buatsurat.kelahiran.index', compact('datas'));
    }

    public function create()
    {
        return view('buatsurat.kelahiran.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'berat' => 'required|numeric',
        ]);

        SkKelahiran::create([
            'nomor_surat' => $request->get('nomor_surat'),
            'nama_bayi' => $request->get('nama_bayi'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'berat' => $request->get('berat'),
            'nama_ayah' => $request->get('nama_ayah'),
            'nama_ibu' => $request->get('nama_ibu'),
            'alamat' => $request->get('alamat'),
            'nama_pelapor' => $request->get('nama_pelapor')
        ]);

        /**
                $document = file_get_contents("sk_kelahiran.rtf");
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
        return redirect()->route('kelahiran.index');
    }

    public function show($id_kelahiran)
    {
        $data = SkKelahiran::findOrFail($id_kelahiran);
        return view('kelahiran.show', compact('data'));
    }

    public function cetak_surat($id_kelahiran)
    {
        $data = SkKelahiran::findOrFail($id_kelahiran);
        $templatePath = file_get_contents("template/sk_kelahiran.rtf");
        // dd($templatePath);

        $templatePath = str_replace("nomor_surat", $data->nomor_surat, $templatePath);
        $templatePath = str_replace("nama_bayi", $data->nama_bayi, $templatePath);
        $templatePath = str_replace("tempat_lahir", $data->tempat_lahir, $templatePath);
        $templatePath = str_replace("tanggal_lahir", date('d-M-Y', strtotime($data->tanggal_lahir)), $templatePath);
        $templatePath = str_replace("jenis_kelamin", $data->jenis_kelamin, $templatePath);
        $templatePath = str_replace("berat", $data->berat, $templatePath);
        $templatePath = str_replace("alamat", $data->alamat, $templatePath);
        $templatePath = str_replace("nama_ayah", $data->nama_ayah, $templatePath);
        $templatePath = str_replace("nama_ibu", $data->nama_ibu, $templatePath);
        $templatePath = str_replace("nama_pelapor", $data->nama_pelapor, $templatePath);
        $templatePath = str_replace("created_at", date('d-M-Y'), $templatePath);

        $fileName = 'surat kelahiran ' . date('d-M-Y') . '.doc';
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=" . $fileName);
        header("Content-length: " . strlen($templatePath));
        echo $templatePath;
    }

    public function destroy($id_kelahiran)
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/kelahiran');
        }

        SkKematian::find($id_kelahiran)->delete();
        alert()->success('Berhasil.', 'Data telah dihapus!');
        return redirect()->route('kelahiran.index');
    }
}
