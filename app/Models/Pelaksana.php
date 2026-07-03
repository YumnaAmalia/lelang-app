<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelaksana extends Model
{
    protected $table = 'pelaksanas';

    protected $fillable = [
        'case_id',
        'nama',
        'nip',
        'pangkat',
        'jabatan'
    ];

    public function case()
    {
        return $this->belongsTo(CaseModel::class, 'case_id');
    }
}
