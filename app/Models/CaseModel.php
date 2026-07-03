<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CaseModel extends Model
{
    protected $table = 'cases';

    protected $fillable = [
        'nama_terpidana',
        'nomor_putusan',
        'tanggal_putusan',
        'jenis_perkara',
        'wilayah_putusan',

        'uang_pengganti',
        'uang_dibayar',

        'pidana_tahun',
        'pidana_bulan',
        'pidana_hari',

        'nomor_surat',

        'nomor_nota_dinas',
        'nomor_laporan_penilaian',

        'tanggal_nota_dinas',
        'tanggal_laporan_penilaian',
    ];

    // RELASI
    public function operator()
    {
        return $this->hasOne(Operator::class, 'case_id');
    }

    public function barang()
    {
        return $this->hasMany(Barang::class, 'case_id');
    }

    public function pejabat()
    {
        return $this->hasOne(Pejabat::class, 'case_id');
    }

    public function pelaksana()
    {
        return $this->hasMany(Pelaksana::class, 'case_id');
    }

    public function nota()
    {
        return $this->hasOne(Nota::class, 'case_id');
    }

    public function kpknl()
    {
        return $this->hasOne(Kpknl::class, 'case_id');
    }
    
    public function getTanggalPutusanFormattedAttribute()
    {
        return Carbon::parse($this->tanggal_putusan)
            ->translatedFormat('l, d F Y');
    }

    public function getTanggalNotaDinasFormattedAttribute()
    {
        return $this->tanggal_nota_dinas
            ? Carbon::parse($this->tanggal_nota_dinas)->translatedFormat('d F Y')
            : '-';
    }

    public function getTanggalLaporanPenilaianFormattedAttribute()
    {
        return $this->tanggal_laporan_penilaian
            ? Carbon::parse($this->tanggal_laporan_penilaian)->translatedFormat('d F Y')
            : '-';
    }
}
