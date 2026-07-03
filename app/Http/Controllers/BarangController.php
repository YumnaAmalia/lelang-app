<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function store(Request $request)
    {
        foreach($request->jenis_barang as $key => $value){
            Barang::create([
                'case_id' => $request->case_id,
                'jenis_barang' => $value,
                'nilai_limit' => $request->nilai_limit[$key],
                'uang_jaminan' => $request->uang_jaminan[$key],
                'lokasi' => $request->lokasi[$key]
            ]);
        }

        return back()->with('success','Barang berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $nilai = is_array($request->nilai_limit) 
                ? $request->nilai_limit[0] 
                : $request->nilai_limit;

        $barang->update([
            'jenis_barang' => is_array($request->jenis_barang) ? $request->jenis_barang[0] : $request->jenis_barang,
            'nilai_limit' => $nilai,
            'uang_jaminan' => is_array($request->uang_jaminan) ? $request->uang_jaminan[0] : $request->uang_jaminan,
            'lokasi' => is_array($request->lokasi) ? $request->lokasi[0] : $request->lokasi,
        ]);

        return back()->with('success','Data berhasil diupdate');
    }
    
    public function destroy($id)
    {
        \App\Models\Barang::destroy($id);

        return back()->with('success','Data berhasil dihapus');
    }
}
