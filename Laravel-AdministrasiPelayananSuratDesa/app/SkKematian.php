<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkKematian extends Model
{
    protected $table = 'sk_kematian';
    protected $primaryKey = 'id_kematian';
    protected $fillable = ['nik', 'nama_lengkap', 'umur', 'tanggal_meninggal', 'tempat_meninggal', 'tempat_makam', 'penyebab_meninggal'];

    /**
     * Method One To Many
     */
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik', 'nik');
    }
}
