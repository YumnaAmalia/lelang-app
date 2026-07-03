<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operator;

class OperatorController extends Controller
{
    public function store(Request $request)
    {
        $existing = \App\Models\Operator::where('case_id', $request->case_id)->first();

        // kalau sudah ada → update
        if($existing){

            $existing->update([
                'nama_operator' => $request->nama_operator,
                'no_hp' => $request->no_hp,
            ]);

        } else {

            \App\Models\Operator::create([
                'case_id' => $request->case_id,
                'nama_operator' => $request->nama_operator,
                'no_hp' => $request->no_hp,
            ]);
        }

        return back()->with('success','Data operator berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $operator = \App\Models\Operator::findOrFail($id);

        $operator->update([
            'nama_operator' => $request->nama_operator,
            'no_hp' => $request->no_hp,
        ]);

        return back()->with('success','Operator berhasil diupdate');
    }

    public function destroy($id)
    {
        \App\Models\Operator::destroy($id);

        return back()->with('success','Operator berhasil dihapus');
    }
}
