<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KK extends Model
{
    protected $table = 'kk';
    protected $fillable = ['foto_kk', 'no_kk', 'rt', 'rw', 'dusun', 'desa', 'kecamatan', 'kabupaten', 'provinsi'];
    
    public $timestamps = false;
    protected $primaryKey = 'id_kk';

    /**
     * Method One To Many 
     */
    public function penduduk()
    {
    	return $this->hasMany(Penduduk::class);
    }
}
