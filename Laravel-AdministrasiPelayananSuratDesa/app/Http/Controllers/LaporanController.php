<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\KK;
use App\Penduduk;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
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

    public function kk()
    {
        return view('laporan.kk');
    }

    public function kkPdf()
    {
        $datas = KK::all();
        $pdf = PDF::loadView('laporan.kk_pdf', compact('datas'));
        return $pdf->download('laporan_kk_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function kkExcel(Request $request)
    {
        $nama = 'laporan_kk_'.date('Y-m-d_H-i-s');
        Excel::create($nama, function ($excel) use ($request) {
        $excel->sheet('Laporan Data Kartu Keluarga', function ($sheet) use ($request) {
        
        $sheet->mergeCells('A1:H1');

       // $sheet->setAllBorders('thin');
        $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setAlignment('center');
            $row->setFontWeight('bold');
        });

        $sheet->row(1, array('LAPORAN DATA KARTA KELUARGA'));

        $sheet->row(2, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setFontWeight('bold');
        });

        $datas = KK::all();

       // $sheet->appendRow(array_keys($datas[0]));
        $sheet->row($sheet->getHighestRow(), function ($row) {
            $row->setFontWeight('bold');
        });

         $datasheet = array();
         $datasheet[0]  =   array("NO", "NOMOR KK", "RT", "RW", "DUSUN", "DESA");
         $i=1;

        foreach ($datas as $data) {

           // $sheet->appendrow($data);
          $datasheet[$i] = array($i,
                        $data['no_kk'],
                        $data['rt'],
                        $data['rw'],
                        $data['dusun'],
                        $data['desa']
                    );
          
          $i++;
        }

        $sheet->fromArray($datasheet);
    });

})->export('xls');

}


public function penduduk()
    {
        return view('laporan.penduduk');
    }

    public function pendudukPdf(Request $request)
    {
        $datas = KK::all();
        $datas = Penduduk::all();
        $pdf = PDF::loadView('laporan.penduduk_pdf', compact('datas'));
        return $pdf->download('laporan_penduduk_'.date('Y-m-d_H-i-s').'.pdf');
    }


public function pendudukExcel(Request $request)
    {
        $nama = 'laporan_penduduk_'.date('Y-m-d_H-i-s');
        Excel::create($nama, function ($excel) use ($request) {
        $excel->sheet('Laporan Data Penduduk', function ($sheet) use ($request) {
        
        $sheet->mergeCells('A1:H1');

       // $sheet->setAllBorders('thin');
        $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setAlignment('center');
            $row->setFontWeight('bold');
        });

        $sheet->row(1, array('LAPORAN DATA PENDUDUK'));

        $sheet->row(2, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setFontWeight('bold');
        });

        $datas = KK::all();
        $datas = Penduduk::all();

       // $sheet->appendRow(array_keys($datas[0]));
        $sheet->row($sheet->getHighestRow(), function ($row) {
            $row->setFontWeight('bold');
        });

         $datasheet = array();
         $datasheet[0]  =   array("NO", "NIK", "NAMA", "NOMOR KK", "JENIS KELAMIN", "TEMPAT LAHIR", "TANGGAL LAHIR", "AGAMA", "PEKERJAAN", "PENDIDIKAN", "GOLONGAN DARAH", "STATUS");
         $i=1;

        foreach ($datas as $data) {

           // $sheet->appendrow($data);
          $datasheet[$i] = array($i,
                        $data['nik'],
                        $data['nama_lengkap'],
                        $data->kk->no_kk,
                        $data['jenis_kelamin'],
                        $data['tempat_lahir'],
                        date('d/m/y', strtotime($data['tanggal_lahir'])),
                        $data['agama'],
                        $data['pekerjaan'],
                        $data['pendidikan'],
                        $data['golongan_darah'],
                        $data['status']
                    );
          
          $i++;
        }

        $sheet->fromArray($datasheet);
    });

})->export('xls');

}
}
