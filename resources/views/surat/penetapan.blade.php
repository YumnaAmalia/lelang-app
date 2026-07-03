<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penetapan Penjual</title>
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

        .center { text-align: center; }
        .right { text-align: right; }
        .justify { text-align: justify; }

        .title {
            text-align: center;
            margin-top: 20px;
            font-size: 12pt;
        }

        .section {
            margin-top: 15px;
        }
        .no-border {
            width: 100%;
            border-collapse: collapse;
        }

        .no-border td {
            border: none;
            padding: 2px 5px;
            vertical-align: top;
            text-align: justify;
        }

        .indent {
            margin-left: 20px;
        }
        .footer {
            margin-top: 30px;
            width: 100%;
        }
        .signature {
            text-align: center;
            line-height: 0;
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-lampiran td, .table-lampiran th {
            border: 1px solid black;
            padding: 5px;
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
<div class="center">
    <b>KEPUTUSAN<br>KEPALA KEJAKSAAN NEGERI KEPULAUAN SELAYAR</b><br>
    NOMOR : {{ $nomor }}<br><br>

    <b>TENTANG</b><br>
    PENETAPAN PEJABAT PENJUAL BARANG RAMPASAN NEGARA<br>
    ATAS NAMA TERPIDANA {{ strtoupper($case->nama_terpidana) }}
</div>

<!-- MENIMBANG -->
<div class="section justify">
    <table class="no-border">
        <tr>
            <td width="14%"><span class="bold">Menimbang</span></td>
            <td  width="1%">:</td>
            <td  width="1%">1.</td>
            <td>
                Nota Dinas Nomor {{ $case->nomor_nota_dinas }} tanggal {{ $case->tanggal_nota_dinas_formatted }}
                dari Kepala Seksi Pemulihan Aset dan Pengelolaan Barang Bukti
                perihal Permohonan Izin Untuk Melaksanakan Penjualan Barang Rampasan Negara
                atas nama terpidana {{ $case->nama_terpidana }};
            </td>
        </tr>
        <tr>
            <td width="10%"><span class="bold"></span></td>
            <td  width="1%"> </td>
            <td  width="1%">2.</td>
            <td>
                Bahwa untuk	melaksanakannya	perlu dikeluarkan Penetapan Pejabat Penjual Barang Rampasan Negara;</li>
            </td>
        </tr>    
        <tr>
            <td width="10%"><span class="bold"></span></td>
            <td  width="1%"> </td>
            <td  width="1%">3.</td>
            <td>
                Bahwa untuk maksud tersebut perlu dikeluarkan Surat Keputusan Kepala Kejaksaan Negeri Kepulauan Selayar.</li>
            </td>
        </tr>   
    </ol>
</div>

<!-- MENGINGAT -->
    <table class="no-border">
        <tr>
            <td width="14%"><span class="bold">Mengingat</span></td>
            <td  width="1%">:</td>
            <td  width="1%">1.</td>
            <td>Undang-Undang Nomor 11 Tahun 2021 tentang perubahan atas Undang-undang Nomor 16 tahun 2004 Tentang Kejaksaan Republik Indonesia;</td>
        </tr>
        <tr>
            <td width="14%"><span class="bold"></span></td>
            <td  width="1%"> </td>
            <td  width="1%">2.</td>
            <td>Undang-Undang Nomor 8 tahun 1981 Kitab Hukum Acara Pidana pasal 270 jo 275 (3) dan (4);</td>
        </tr>
        <tr>
            <td width="14%"><span class="bold"></span></td>
            <td  width="1%"> </td>
            <td  width="1%">3.</td>
            <td>Peraturan Presiden Republik Indonesia Nomor 15 tahun 2024 tentang perubahan Ketiga atas Peraturan Presiden Nomor 38 Tahun 2010 tentang Organisasi dan Tata Kerja Kejaksaan Republik Indonesia;</td>
        </tr>
        <tr>
            <td width="14%"><span class="bold"></span></td>
            <td  width="1%"> </td>
            <td  width="1%">4.</td>
            <td>Peraturan Kejaksaan Republik Indonesia Nomor 3 Tahun 2024 tentang perubahan Perubahan Keempat atas Peraturan Jaksa Agung Nomor PER-006/A/JA/07/2017 tentang Organisasi dan Tata Kerja Kejaksaan Republik Indonesia;</td>
        </tr>
        <tr>
            <td width="14%"><span class="bold"></span></td>
            <td  width="1%"> </td>
            <td  width="1%">5.</td>
            <td>Peraturan Kejaksaan Republik Indonesia No 10 Tahun 2019 tentang perubahan atas Peraturan Jaksa Agung Nomor PER-002/A/JA/05/2017 tentang Pelelangan dan Penjualan Langsung Benda Sitaan atau Barang Rampasan Negara atau Benda Sita Eksekusi;</td>
        </tr>
        <tr>
            <td width="14%"><span class="bold"></span></td>
            <td  width="1%"> </td>
            <td  width="1%">6.</td>
            <td>Pedoman Jaksa Agung Republik Indonesia Nomor 3 Tahun 2022 tentang Pelelangan dan Penjualan Langsung Benda Sitaan, Barang Bukti, Barang Rampasan Negara, dan Benda Sita Eksekusi di Lingkungan Kejaksaan Republik Indonesia.</td>
        </tr>
        <tr>
            <td width="14%"><span class="bold"></span></td>
            <td  width="1%"> </td>
            <td  width="1%">7.</td>
            <td>Pedoman Nomor 7 Tahun 2025 tentang Pemulihan Aset di Lingkungan Kejaksaan Republik Indonesia .</td>
        </tr>
    </table>


<!-- MEMUTUSKAN -->
<div class="section center">
    <b>MEMUTUSKAN</b>
</div>

<table class="no-border">
    <tr>
        <td width="14%">Menetapkan</td>
        <td width="1%">:</td>
        <td style="text-transform: uppercase;">
            Penetapan Pejabat Penjual Barang Rampasan Negara
            atas nama terpidana {{ $case->nama_terpidana }}
        </td>
    </tr>
    <tr>
        <td width="14%">KESATU</td>
        <td width="1%">:</td>
        <td>
            Menunjuk pejabat penjual barang rampasan negara untuk melakukan penjualan/lelang barang rampasan negara;
        </td>
    </tr>
    <tr>
        <td width="14%">KEDUA</td>
        <td width="1%">:</td>
        <td>
            Sebagaimana dimaksud dalam diktum kesatu ditetapkan sebagai pejabat penjual sebagaimana tercantum dalam Lampiran yang merupakan bagian tidak terpisahkan dari Keputusan ini;
        </td>
    </tr>
    <tr>
        <td width="14%">KETIGA</td>
        <td width="1%">:</td>
        <td>
            Melaksanakan tugas ini dengan sebaik-baiknya dengan penuh rasa tanggungjawab dan melaporkan hasil pelaksanaan tugas ini secara berkala pada kesempatan pertama kepada Kepala Kejaksaan Negeri Kepulauan Selayar;
        </td>
    </tr>

    <tr>
        <td width="14%">KEEMPAT</td>
        <td width="1%">:</td>
        <td>
            Keputusan ini berlaku sejak tanggal ditetapkan dengan ketentuan apabila ternyata di kemudian hari terdapat kekeliruan dalam keputusan ini, maka akan diadakan perbaikan sebagaimana mestinya.
        </td>
    </tr>
</table>

<br><br>

<!-- TTD -->
<table style=" border-spacing: 0px !important;">
    <tr>
        <td style="width: 80%"> </td>
        <td style="text-align: left">
            Ditetapkan di : Benteng<br>
            Pada tanggal : {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <div class="signature">
                <div style="text-align: center; width: 325px !important;">
                    <p>Kepala Kejaksaan Negeri Kepulauan Selayar,</strong></p>
                    <img src="data:image/jpg;base64,{{ $sign }}" width="150">
                    <p style="text-decoration: underline;">( Nama Pejabat )</strong></p>
                    <p style="line-height: 0.5;">( Pangkat NIP. )</p>
                </div>
            </div>
        </td>
    </tr>
</table>

<div class="clear"></div>

<!-- QR CODE -->
<div class="qr-footer">
    <img src="data:image/svg+xml;base64,{{ $qr }}" width="50">
</div>

<!-- LAMPIRAN -->
<div style="page-break-before: always;"></div>

<div style="float: right; text-align: left;">
    <b>LAMPIRAN</b><br>
    Nomor : {{ $nomor }}<br>
    Tanggal : {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
</div>
<div style="clear: both;"></div> 
<br>

<div class="center">
    <b>DAFTAR PEJABAT PENJUAL</b>
</div>

<br>

<table class="table-lampiran">
    <tr style="text-align: center;">
        <th>No</th>
        <th>Nama / Pangkat / NIP</th>
        <th>Jabatan</th>
    </tr>

    <tr>
        <td style="text-align: center;">1.</td>
        <td>{{ $case->pejabat->nama }} / {{ $case->pejabat->pangkat_golongan }} / {{ $case->pejabat->nip }}</td>
        <td>{{ $case->pejabat->jabatan }}</td>
    </tr>

</table>

<br>

<table>
    <tr>
        <td style="width: 80%"> </td>
        <td style="text-align: left">
            Ditetapkan di : Benteng<br>
            Pada tanggal : {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <div class="signature">
                <div style="text-align: center; width: 325px !important;">
                    <p>Kepala Kejaksaan Negeri Kepulauan Selayar,</strong></p>
                    <img src="data:image/jpg;base64,{{ $sign }}" width="150">
                    <p style="text-decoration: underline;">( Nama Pejabat )</strong></p>
                    <p>( Pangkat NIP. )</p>
                </div>
            </div>
        </td>
    </tr>
</table>

<!-- QR -->
<div class="qr-footer">
    <img src="data:image/svg+xml;base64,{{ $qr }}" width="60">
</div>

</body>
</html>