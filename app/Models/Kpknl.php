<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kpknl extends Model
{
    protected $table = 'kpknls';

    protected $fillable = [
        'case_id',
        'nomor_surat'
    ];

    public function case()
    {
        return $this->belongsTo(CaseModel::class, 'case_id');
    }
}
