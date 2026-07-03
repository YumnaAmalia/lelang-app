<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Permohonan Lelang</title>
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
            font-weight: normal !important;
        }
        .header table,
        .header th,
        .header td {
            border: none !important;
            font-weight: normal;
        }
        .header h1 {
            margin: 0;
            font-size: 16pt;
            font-weight: normal !important;
        }
        .header h2{
            margin: 0;
            font-size: 13pt;
            font-weight: normal !important;
        }
        .header h3 {
            margin: 0;
            font-size: 12pt;
            font-weight: normal !important;
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
        .content {
            margin-top: 20px;
            text-align: justify;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12pt;
            table-layout: fixed;
        }
        .table-info {
            margin-top: 10px;
        }
        .table-info td {
            vertical-align: top;
            padding: 2px 2px;
        }
        .list {
            margin-left: 20px;
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
        .right {
            text-align: right;
        }.left {
            text-align: justify;
        }
        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- HEADER -->
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
                <p style="font-size: 10pt; margin: 0 !important; font-weight: normal !important;">
                    Jl. W. R. Supratman No. 4, Benteng, Kab. Kepulauan Selayar <br > 
                </p>
                <p style="font-size: 10pt; margin: 0 !important; font-weight: normal !important;">
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

<!-- NOMOR -->
<table class="table-info">
    <tr>
        <td width="10%">Nomor</td>
        <td width="1%">:</td>
        <td width="40%">{{ $nomor }}</td>
        <td class="right" width="50%">Benteng, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</td>
    </tr>
    <tr>
        <td>Sifat</td>
        <td>:</td>
        <td>Biasa</td>
    </tr>
    <tr>
        <td>Lampiran</td>
        <td>:</td>
        <td>1 Bundel</td>
    </tr>
    <tr>
        <td>Hal</td>
        <td>:</td>
        <td class="left">Permohonan Melaksanakan Lelang Barang Rampasan Negara Yang Diperhitungkan Sebagai Uang Pengganti Terpidana {{ $case->nama_terpidana }}</td>
    </tr>
</table>

<!-- TUJUAN -->
<div class="content">
    <p>Yth.<br>
    Kepala Kantor Pelayanan Kekayaan Negara dan Lelang (KPKNL) Makassar<br>
    Di -<br>
    Makassar</p>

    <p>
        Sehubungan dengan adanya putusan pengadilan yang berkekuatan hukum tetap oleh 
        {{ $case->wilayah_putusan }} Nomor {{ $case->nomor_putusan }} dalam perkara <b>{{ $case->nama_terpidana }}</b> 
        yang amar putusannya menyatakan dirampas oleh negara untuk kemudian diperhitungkan sebagai 
        uang pengganti kerugian keuangan negara dan akan dilaksanakan lelang, 
        bersama ini kami sampaikan hal-hal sebagai berikut:
    </p>

    <ol class="list">
        <li>
            Guna menindaklanjuti penyelesaian barang rampasan negara yang diperhitungkan sebagai uang pengganti sebagaimana tersebut, 
            dimohon kepada Kepala KPKNL Makassar untuk melakukan lelang eksekusi barang rampasan negara yang diperhitungkan sebagai 
            uang pengganti terhadap obyek barang rampasan negara melalui e-auction open bidding dan menetapkan hari dan tanggal pelaksanaan penjualan lelangnya.
        </li>

        <li>
            Sebagai kelengkapan dokumen pelaksanaan lelang, bersama ini terlampir dokumen yang diperlukan sebagai berikut:
            <ol type="a">
                <li>Surat Perintah Kepala Kejaksaan Negeri Kepulauan Selayar tentang Izin Pelaksanaan Lelang Barang Rampasan Negara;</li>
                <li>Putusan Pengadilan yang telah mempunyai kekuatan hukum tetap;</li>
                <li>Surat Perintah Penyitaan;</li>
                <li>Berita Acara Penyitaan;</li>
                <li>Laporan Penilaian dari KPKNL Makassar;</li>
                <li>Surat Pernyataan Tanggung Jawab Mutlak;</li>
                <li>Daftar barang yang akan dilelang, nilai limit, dan uang jaminan;</li>
                <li>Nomor Pokok Wajib Pajak (NPWP) Kejaksaan Negeri Kepulauan Selayar NPWP : 00.041.770.9-806.000 Kejaksaan Negeri Kepulauan Selayar Kejaksaan Republik Indonesia. Jl. W. R. Supratman No. 4, Benteng, Kab. Kepulauan Selayar, Sulawesi Selatan;</li>
                <li>Nomor Rekening Penampungan Hasil Lelang.</li>
            </ol>
        </li>
    </ol>

    <p>
        Untuk memudahkan koordinasi, bersama ini kami sampaikan contact person : Sdra/i. {{ $case->operator->nama_operator ?? '-' }} pada Kejaksaan Negeri Kepulauan Selayar, Nomor HP {{ $case->operator->no_hp ?? '-' }}
    </p>

    <p>
        Demikian disampaikan, atas perhatian dan kerja sama yang baik kami ucapkan terima kasih.
    </p>
</div>

<!-- TTD -->
<div class="footer">
    <div class="signature">
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