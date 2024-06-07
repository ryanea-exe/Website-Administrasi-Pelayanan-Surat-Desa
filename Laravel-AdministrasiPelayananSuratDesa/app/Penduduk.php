<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';
    protected $fillable = ['foto_ktp', 'nik', 'id_kkk', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama',
     'pendidikan', 'pekerjaan', 'status', 'status_keluarga', 'golongan_darah', 'kewarganegaraan', 'nama_ayah',
      'nama_ibu', 'email', 'no_hp'];
    
    public $timestamps = false;
    protected $primaryKey = 'id_penduduk';

    /**
     * Method One To Many 
     */
    public function kk()
    {
    	return $this->belongsTo(KK::class);
    }
    public function Kematian()
    {
    	return $this->hasMany(BuatSurat/Kematian::class);
    }
}
