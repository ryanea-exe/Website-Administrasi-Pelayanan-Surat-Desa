<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkKelahiran extends Model
{
    protected $table = 'sk_kelahiran';
    protected $primaryKey = 'id_kelahiran';
    protected $fillable = ['nomor_surat', 'nama_bayi', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'berat', 'nama_ayah', 'nama_ibu', 'alamat', 'nama_pelapor'];

}
