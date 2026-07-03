<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CaseModel;

class CaseController extends Controller
{
    public function index()
    {
        $cases = CaseModel::latest()->get();
        return view('layouts.index', compact('cases'));
    }

    public function create()
    {
        return view('cases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_terpidana' => 'required',
            'nomor_putusan' => 'required'
        ]);

        // hitung uang
        $uang_pengganti = str_replace('.', '', $request->uang_pengganti ?? 0);
        $uang_dibayar = str_replace('.', '', $request->uang_dibayar ?? 0);
        $sisa = max(0, $uang_pengganti - $uang_dibayar);

        // GENERATE NOMOR SURAT
        $year = date('Y');

        $last = CaseModel::whereYear('created_at', $year)->max('nomor_surat') ?? 0;
        $last++;

        $nomor = $last;

        // simpan data
        CaseModel::create([
            'nama_terpidana' => $request->nama_terpidana,
            'nomor_putusan' => $request->nomor_putusan,
            'tanggal_putusan' => $request->tanggal_putusan,
            'jenis_perkara' => $request->jenis_perkara,
            'wilayah_putusan' => $request->wilayah_putusan,

            'uang_pengganti' => str_replace('.', '', $request->uang_pengganti),
            'uang_dibayar' => str_replace('.', '', $request->uang_dibayar),

            'pidana_tahun' => $request->pidana_tahun,
            'pidana_bulan' => $request->pidana_bulan,
            'pidana_hari' => $request->pidana_hari,

            'nomor_surat' => $nomor,

            'nomor_nota_dinas' => $request->nomor_nota_dinas,
            'tanggal_nota_dinas' => $request->tanggal_nota_dinas,

            'nomor_laporan_penilaian' => $request->nomor_laporan_penilaian,
            'tanggal_laporan_penilaian' => $request->tanggal_laporan_penilaian,
        ]);

        return redirect('/cases')->with('success','Data kasus berhasil disimpan');
    }

    public function show($id)
    {
        $case = CaseModel::with(['operator','barang','pejabat','pelaksana'])->findOrFail($id);
        $cases = CaseModel::all();
        return view('cases.show', compact('case', 'cases'));
    }

    public function edit($id)
    {
        $case = CaseModel::findOrFail($id);
        return view('cases.edit', compact('case'));
    }

    public function update(Request $request, $id)
    {
        $case = CaseModel::findOrFail($id);

        $uang_pengganti = str_replace('.', '', $request->uang_pengganti ?? 0);
        $uang_dibayar = str_replace('.', '', $request->uang_dibayar ?? 0);
        
        $sisa = max(0, $uang_pengganti - $uang_dibayar);

        $case->update([
            'nama_terpidana' => $request->nama_terpidana,
            'nomor_putusan' => $request->nomor_putusan,
            'tanggal_putusan' => $request->tanggal_putusan,
            'jenis_perkara' => $request->jenis_perkara,
            'wilayah_putusan' => $request->wilayah_putusan,

            'uang_pengganti' => str_replace('.', '', $request->uang_pengganti),
            'uang_dibayar' => str_replace('.', '', $request->uang_dibayar),
            'sisa_uang' => $sisa,

            'pidana_tahun' => $request->pidana_tahun,
            'pidana_bulan' => $request->pidana_bulan,
            'pidana_hari' => $request->pidana_hari,
        ]);

        return redirect('/cases')->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        CaseModel::destroy($id);
        return redirect('/cases')->with('success','Data berhasil dihapus');
    }

    public function dashboard()
    {
        $cases = \App\Models\CaseModel::latest()->paginate(10);
        return view('cases', compact('cases'));
    }
}
 