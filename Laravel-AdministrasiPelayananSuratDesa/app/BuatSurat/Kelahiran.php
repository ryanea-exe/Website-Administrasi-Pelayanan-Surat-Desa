<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    protected $table = 'sk_kematian';
    protected $fillable = ['nik', 'umur', 'tanggal_meninggal', 'tempat_meninggal', 'tempat_makam', 'penyebab'];

    /**
     * Method One To Many 
     */
    public function penduduk()
    {
    	return $this->belongsTo(Penduduk::class);
    }
}
