<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';

    protected $fillable = [
        'case_id',
        'jenis_barang',
        'nilai_limit',
        'uang_jaminan',
        'lokasi',
        'nilai_wajar'
    ];

    public function case()
    {
        return $this->belongsTo(CaseModel::class, 'case_id');
    }
}
