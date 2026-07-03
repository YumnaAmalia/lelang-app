<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang Lelang</title>
    <style>
        @page {
            size: 210mm 330mm; /* F4 */
            margin-top: 1cm;
            margin-right: 1.5cm;
            margin-bottom: 2cm;
            margin-left: 1.5cm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12pt;
            margin: 0px;
            color: #000;
            line-height: 1.5;
            padding-bottom: 1cm;
        }
        .header {
            text-align: center;
            line-height: 1;
        }
        .header h1 {
            margin: 0;
            font-size: 16pt;
            font-weight: normal;
        }
        .header h2{
            margin: 0;
            font-size: 13pt;
            font-weight: normal;
        }
        .header h3 {
            margin: 0;
            font-size: 12pt;
            font-weight: normal;
        }
        .double-line {
            margin: 3px 0;
        }
        .line-thin {
            border-top: 1px solid black;
            margin-top: 1px;
        }
        .line-thick {
            border-top: 3px solid black;
        }
        .title {
            text-align: center;
            margin-top: 20px;
            font-size: 12pt;
        }
        .title h4 {
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12pt;
            table-layout: fixed;
        }
        .main-table, .main-table th, .main-table td {
            border: 1px solid black;
            padding: 3px 3px;
        }
        .main-table td{
            vertical-align: top;
            text-align: justify
        }
        .header table,
        .header th,
        .header td {
            border: none !important;
            font-weight: normal;
        }
        .text-left {
            text-align: justify
        }
        .footer {
            margin-top: 30px;
            width: 100%;
        }
        .signature {
            width: 450px;
            float: right;
            text-align: center;
            line-height: 0.5;
        }
        .clear {
            clear: both;
        }
        .qr-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 0.5cm; /* tinggi area QR */
            text-align: center;
        }
        .qr-footer img {
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="header">
    <table>
        <tr>
            <th width="15%">
                <img src="data:image/png;base64,{{ $logo }}" width="80">
            </th>
            <th>
                <h3>KEJAKSAAN REPUBLIK INDONESIA</h3>
                <h2>KEJAKSAAN TINGGI SULAWESI SELATAN</h2>
                <h1>KEJAKSAAN NEGERI KEPULAUAN SELAYAR</h1>
                <p style="font-size: 10pt; margin: 0 !important">
                    Jl. W. R. Supratman No. 4, Benteng, Kab. Kepulauan Selayar <br > 
                </p>
                <p style="font-size: 10pt; margin: 0 !important">
                    Telp. 0414-2700002, Email: kejari.selayar@kejaksaan.go.id
                </p>
            </th>
        </tr>
    </table>
</div>

<div class="double-line">
    <div class="line-thick"></div>
    <div class="line-thin"></div>
</div>

<div class="title">
    <h4>DAFTAR BARANG, NILAI LIMIT DAN UANG JAMINAN YANG AKAN DILELANG</h4>
    <h4 style="font-weight: normal !important;">NOMOR : {{ $nomor }}</h4>
</div>


<p style="line-height: 1,5 pt;">
    Kejaksaan Negeri Kepulauan Selayar akan melakukan lelang secara langsung Eksekusi Barang Rampasan 
    yang telah mempunyai kekuatan hukum tetap sebagai berikut:
</p>

<table class="main-table">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="20%">Jenis Barang Rampasan</th>
            <th width="20%">No. Putusan & Tanggal / Penetapan</th>
            <th width="15%">Lokasi</th>
            <th width="15%">Nilai Limit</th>
            <th width="15%">Uang Jaminan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($case->barang as $i => $b)
        <tr>
            <td style="text-align: center;">{{ $i+1 }}</td>
            <td>{{ $b->jenis_barang }}</td>
            <td>{{ $case->nomor_putusan }} <br>
                    tanggal {{ \Carbon\Carbon::parse($case->tanggal_putusan)->translatedFormat('d F Y') }}</td>
            <td style="text-align: center;">{{ $b->lokasi }}</td>
            <td style="text-align: center;">Rp. {{ number_format($b->nilai_limit, 0, ',', '.') }}</td>
            <td style="text-align: center;">Rp. {{ number_format($b->uang_jaminan, 0, ',', '.') }}</td>
        </tr>
        <!-- Tambah baris sesuai kebutuhan -->
         @endforeach
    </tbody>
</table>

<p style="margin-top:20px;">
    Kondisi barang yang akan dilelang tersebut dinyatakan dalam kondisi apa adanya.
</p>

<div class="footer">
    <div class="signature">
        <p>Benteng, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p style="text-transform: uppercase;">Kepala Kejaksaan Negeri Kepulauan Selayar,</strong></p>
        <img src="data:image/jpg;base64,{{ $sign }}" width="150">
        <p style="text-decoration: underline;">( Nama Pejabat )</strong></p>
        <p>( Pangkat )</p>
    </div>
    <div class="clear"></div>
</div>

<!-- QR CODE -->
<div class="qr-footer">
    <img src="data:image/svg+xml;base64,{{ $qr }}" width="50">
</div>

</body>
</html>