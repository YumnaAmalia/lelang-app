<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SPTJM</title>

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
        .header table,
        .header th,
        .header td {
            border: none !important;
            font-weight: normal;
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
        .table-info td {
            padding: 2px 5px;
            vertical-align: top;
        }
        .table-info th {
            padding: 2px 5px;
            vertical-align: top;
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

<!-- JUDUL -->
<div class="title">
    <h4>SURAT PERNYATAAN PERTANGGUNG JAWABAN MUTLAK</h4>
    <h4 style="font-weight: normal !important;">NOMOR : {{ $nomor }}</h4>
</div>

<!-- ISI -->
<div class="content">

    <p>
        Yang bertanda tangan di bawah ini, Kepala Kejaksaan Negeri Kepulauan Selayar,
        bertindak untuk dan atas nama Penjual:
    </p>

    <table class="table-info">
        <tr>
            <td width="8%">Nama</td>
            <td width="1%">: </td>
            <td width="60%">{{ $case->pejabat->nama ?? '-' }}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>: </td>
            <td>{{ $case->pejabat->nip ?? '-' }}</td>
        </tr>
        <tr>
            <td>Pangkat</td>
            <td>: </td>
            <td>{{ $case->pejabat->pangkat_golongan ?? '-' }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: </td>
            <td>{{ $case->pejabat->jabatan ?? '-' }}</td>
        </tr>
    </table>

    <p>
        dengan ini menyatakan bertanggung jawab penuh dan mutlak terhadap:
    </p>

    <ol>
        <li>
            Tidak ditemukannya surat perintah penyitaan dan/atau berita acara penyitaan,
            penyitaan fisik tanah dan/atau bangunan sebagaimana dimaksud dalam sertifikat
            surat bukti hak atas tanah, atau perbedaan data pada objek lelang, putusan,
            surat perintah penyitaan, dan/atau berita acara penyitaan, untuk jenis lelang :
            <ol type="a">
                <li>Lelang Eksekusi Barang Rampasan Negara yang surat perintah penyitaan dan/atau berita acara penyitaannya tidak ditemukan;</li>
                <li>Lelang Eksekusi Barang Rampasan Negara berupa sertifikat atau surat bukti hak atas tanah; atau</li>
                <li>Lelang Eksekusi Barang Rampasan Negara yang terdapat perbedaan data pada objek lelang, putusan, surat perintah penyitaan, dan/atau berita acara penyitaan.</li>
            </ol>
        </li>

        <li>
            Kebenaran formal dan materil dokumen persyaratan lelang yang disampaikan.
        </li>

        <li>
            Segala permasalahan hukum, tuntutan pidana, gugatan perdata, dan/atau
            gugatan tata usaha negara yang timbul akibat pelaksanaan lelang.
        </li>
    </ol>

    <p>
        Demikian pernyataan ini dibuat dengan sebenar-benarnya.
    </p>

</div>

<!-- TTD -->
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