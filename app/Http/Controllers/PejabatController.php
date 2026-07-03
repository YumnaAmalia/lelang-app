<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pejabat;

class PejabatController extends Controller
{
    public function store(Request $request)
    {
        \App\Models\Pejabat::updateOrCreate(
            ['case_id' => $request->case_id], // cari berdasarkan case
            [
                'nama' => $request->nama,
                'nip' => $request->nip,
                'pangkat_golongan' => $request->pangkat,
                'jabatan' => $request->jabatan,
            ]
        );

        return back()->with('success','Pejabat berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $pejabat = \App\Models\Pejabat::findOrFail($id);

        $pejabat->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'pangkat_golongan' => $request->pangkat,
            'jabatan' => $request->jabatan,
        ]);

        return back()->with('success', 'Data pejabat berhasil diupdate');
    }
    public function destroy($id)
    {
        \App\Models\Pejabat::destroy($id);

        return back()->with('success','Data berhasil dihapus');
    }
}
