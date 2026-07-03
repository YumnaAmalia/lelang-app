<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelaksana;

class PelaksanaController extends Controller
{
    public function store(Request $request)
    {
        foreach($request->nama as $key => $value){
            Pelaksana::create([
                'case_id' => $request->case_id,
                'nama' => $value,
                'nip' => $request->nip[$key],
                'pangkat' => $request->pangkat[$key],
                'jabatan' => $request->jabatan[$key]
            ]);
        }

        return back()->with('success','Pelaksana berhasil ditambahkan');
    }
    public function update(Request $request, $id)
    {
        $pelaksana = \App\Models\Pelaksana::findOrFail($id);

        $pelaksana->update([
            'nama' => $request->nama[0],
            'nip' => $request->nip[0],
            'pangkat' => $request->pangkat[0],
            'jabatan' => $request->jabatan[0],
        ]);

        return back()->with('success','Data berhasil diupdate');
    }
    public function destroy($id)
    {
        \App\Models\Pelaksana::destroy($id);

        return back()->with('success','Data berhasil dihapus');
    }
}
