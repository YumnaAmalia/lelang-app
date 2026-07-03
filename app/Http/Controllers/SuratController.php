<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;
use App\Models\Operator;
use App\Models\Pejabat;
use App\Models\Pelaksana;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class SuratController extends Controller
{
    private function formatNomor($kode, $case)
    {
        $year = date('Y');

        return sprintf(
            "%s-%03d/K.18.12/%s",
            $kode,
            $case->nomor_surat,
            $year
        );
    }

    public function verify(Request $request)
    {
        return view('surat.verify', [
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'waktu' => $request->waktu
        ]);
    }

    public function permohonan($id)
    {
        $case = CaseModel::with('operator')->findOrFail($id);

        $nomor = $this->formatNomor('B', $case);

        $qrData = [
            'id' => $case->id,
            'nama' => $case->nama_terpidana,
            'jenis' => 'Surat Permohonan',
            'waktu_download' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // encode jadi string
        $qrString = json_encode($qrData);

        $qr = base64_encode(
            QrCode::size(120)->generate($qrString)
        );

        $logo = base64_encode(file_get_contents(public_path('images/Logo_kejaksaan.png')));
        $sign = base64_encode(file_get_contents(public_path('images/sign.jpg')));

        return view('surat.permohonan', compact('case','qr','logo','sign','nomor'));
    }

    public function pdfPermohonan($id)
    {
        $case = CaseModel::with('operator')->findOrFail($id);
        
        $nomor = $this->formatNomor('B', $case);

        $qrData = [
            'id' => $case->id,
            'nama' => $case->nama_terpidana,
            'jenis' => 'Surat Permohonan',
            'waktu_download' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // encode jadi string
        $qrString = json_encode($qrData);

        $qr = base64_encode(
            QrCode::size(120)->generate($qrString)
        );

        $logo = base64_encode(file_get_contents(public_path('images/Logo_kejaksaan.png')));
        $sign = base64_encode(file_get_contents(public_path('images/sign.jpg')));

        $pdf = Pdf::loadView('surat.permohonan', compact('case','qr','logo','sign','nomor'));

        return $pdf->download('permohonan.pdf');
    }

    public function barang($id)
    {
        $case = CaseModel::with('barang')->findOrFail($id);
        
        $nomor = $this->formatNomor('BB', $case);

        $qrData = [
            'id' => $case->id,
            'nama' => $case->nama_terpidana,
            'jenis' => 'Daftar Barang dan Limit',
            'waktu_download' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // encode jadi string
        $qrString = json_encode($qrData);

        $qr = base64_encode(
            QrCode::size(120)->generate($qrString)
        );

        $logo = base64_encode(file_get_contents(public_path('images/Logo_kejaksaan.png')));

        $sign = base64_encode(file_get_contents(public_path('images/sign.jpg')));

        return view('surat.barang', compact('case','qr','logo','sign', 'nomor' ));
    }

    public function pdfBarang($id)
    {
        $case = CaseModel::with('barang')->findOrFail($id);
        
        $nomor = $this->formatNomor('BB', $case);

        $qrData = [
            'id' => $case->id,
            'nama' => $case->nama_terpidana,
            'jenis' => 'Daftar Barang dan Limit',
            'waktu_download' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // encode jadi string
        $qrString = json_encode($qrData);

        $qr = base64_encode(
            QrCode::size(120)->generate($qrString)
        );

        $logo = base64_encode(file_get_contents(public_path('images/Logo_kejaksaan.png')));

        $sign = base64_encode(file_get_contents(public_path('images/sign.jpg')));
        
        $pdf = Pdf::loadView('surat.barang', compact('case','qr','logo','sign', 'nomor'));

        return $pdf->download('barang.pdf');
    }

    public function sisaTagihan($id)
    {
        $case = CaseModel::with('pejabat')->findOrFail($id);

        $nomor = $this->formatNomor('KET', $case);

        $qrData = [
            'id' => $case->id,
            'nama' => $case->nama_terpidana,
            'jenis' => 'Surat Keterangan Sisa Tagihan',
            'waktu_download' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // encode jadi string
        $qrString = json_encode($qrData);

        $qr = base64_encode(
            QrCode::size(120)->generate($qrString)
        );

        $logo = base64_encode(file_get_contents(public_path('images/Logo_kejaksaan.png')));

        $sign = base64_encode(file_get_contents(public_path('images/sign.jpg')));

        return view('surat.sisa_tagihan', compact('case','qr','logo','sign', 'nomor'));
    }

    public function pdfSisaTagihan($id)
    {
        $case = CaseModel::with('pejabat')->findOrFail($id);

        $nomor = $this->formatNomor('KET', $case);

        $qrData = [
            'id' => $case->id,
            'nama' => $case->nama_terpidana,
            'jenis' => 'Surat Keterangan Sisa Tagihan',
            'waktu_download' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // encode jadi string
        $qrString = json_encode($qrData);

        $qr = base64_encode(
            QrCode::size(120)->generate($qrString)
        );

        $logo = base64_encode(file_get_contents(public_path('images/Logo_kejaksaan.png')));

        $sign = base64_encode(file_get_contents(public_path('images/sign.jpg')));

        $pdf = Pdf::loadView('surat.sisa_tagihan', compact('case','qr','logo','sign', 'nomor'));

        return $pdf->download('sisa-tagihan-'.$case->nama_terpidana.'.pdf');
    }

    public function sptjm($id)
    {
        $case = CaseModel::with('pejabat')->findOrFail($id);

        $nomor = $this->formatNomor('SPTJM', $case);

        $qrData = [
            'id' => $case->id,
            'nama' => $case->nama_terpidana,
            'jenis' => 'Surat Pertanggung Jawaban Mutlak',
            'waktu_download' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // encode jadi string
        $qrString = json_encode($qrData);

        $qr = base64_encode(
            QrCode::size(120)->generate($qrString)
        );

        $logo = base64_encode(file_get_contents(public_path('images/Logo_kejaksaan.png')));

        $sign = base64_encode(file_get_contents(public_path('images/sign.jpg')));

        return view('surat.sptjm', compact('case','qr','logo','sign', 'nomor'));
    }

    public function pdfSptjm($id)
    {
        $case = CaseModel::with('pejabat')->findOrFail($id);

        $nomor = $this->formatNomor('SPTJM', $case);

        $qrData = [
            'id' => $case->id,
            'nama' => $case->nama_terpidana,
            'jenis' => 'Surat Pertanggung Jawaban Mutlak',
            'waktu_download' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // encode jadi string
        $qrString = json_encode($qrData);

        $qr = base64_encode(
            QrCode::size(120)->generate($qrString)
        );

        $logo = base64_encode(file_get_contents(public_path('images/Logo_kejaksaan.png')));

        $sign = base64_encode(file_get_contents(public_path('images/sign.jpg')));

        $pdf = Pdf::loadView('surat.sptjm', compact('case','qr','logo','sign', 'nomor'));

        return $pdf->download('SPTJM'.$case->nama_terpidana.'.pdf');
    }

    public function penetapan($id)
    {
        $case = CaseModel::with('pejabat')->findOrFail($id);

        $nomor = $this->formatNomor('KEP', $case);

        $qrData = [
            'id' => $case->id,
            'nama' => $case->nama_terpidana,
            'jenis' => 'Surat Keputusan',
            'waktu_download' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // encode jadi string
        $qrString = json_encode($qrData);

        $qr = base64_encode(
            QrCode::size(120)->generate($qrString)
        );

        $logo = base64_encode(file_get_contents(public_path('images/Logo_kejaksaan.png')));

        $sign = base64_encode(file_get_contents(public_path('images/sign.jpg')));

        return view('surat.penetapan', compact('case','qr','logo','sign', 'nomor'));
    }

    public function pdfPenetapan($id)
    {
        $case = CaseModel::with('pejabat')->findOrFail($id);

        $nomor = $this->formatNomor('KEP', $case);

        $qrData = [
            'id' => $case->id,
            'nama' => $case->nama_terpidana,
            'jenis' => 'Surat Keputusan',
            'waktu_download' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // encode jadi string
        $qrString = json_encode($qrData);

        $qr = base64_encode(
            QrCode::size(120)->generate($qrString)
        );

        $logo = base64_encode(file_get_contents(public_path('images/Logo_kejaksaan.png')));

        $sign = base64_encode(file_get_contents(public_path('images/sign.jpg')));

        $pdf = Pdf::loadView('surat.penetapan', compact('case','qr','logo','sign', 'nomor'));

        return $pdf->download('PENETAPAN '.$case->nama_terpidana.'.pdf');
    }
    public function sprintPelaksana($id)
    {
        $case = CaseModel::with('pelaksana')->findOrFail($id);

        $nomor = $this->formatNomor('PRINT', $case);

        $tanggal = \Carbon\Carbon::now()->translatedFormat('d F Y');

        $qrData = [
            'id' => $case->id,
            'nama' => $case->nama_terpidana,
            'jenis' => 'Surat Perintah',
            'waktu_download' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // encode jadi string
        $qrString = json_encode($qrData);

        $qr = base64_encode(
            QrCode::size(120)->generate($qrString)
        );

        $logo = base64_encode(file_get_contents(public_path('images/Logo_kejaksaan.png')));

        $sign = base64_encode(file_get_contents(public_path('images/sign.jpg')));

        return view('surat.sprint_pelaksana', compact('case','tanggal','qr','logo','sign', 'nomor'));
    }

    public function pdfSprintPelaksana($id)
    {
        $case = CaseModel::with('pelaksana')->findOrFail($id);

        $nomor = $this->formatNomor('PRINT', $case);

        $tanggal = \Carbon\Carbon::now()->translatedFormat('d F Y');

        $qrData = [
            'id' => $case->id,
            'nama' => $case->nama_terpidana,
            'jenis' => 'Surat Perintah',
            'waktu_download' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        // encode jadi string
        $qrString = json_encode($qrData);

        $qr = base64_encode(
            QrCode::size(120)->generate($qrString)
        );
        
        $logo = base64_encode(file_get_contents(public_path('images/Logo_kejaksaan.png')));

        $sign = base64_encode(file_get_contents(public_path('images/sign.jpg')));

        $pdf = Pdf::loadView('surat.sprint_pelaksana', compact('case','tanggal','qr','logo','sign', 'nomor'));

        return $pdf->download('sprint-'.$case->nama_terpidana.'.pdf');
    }
}