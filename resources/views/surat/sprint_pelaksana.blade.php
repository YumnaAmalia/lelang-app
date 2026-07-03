<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Perintah</title>
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
        .justify { text-align: justify; }

        .section { margin-top: 15px; }

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

        .signature {
            width: 350px;
            float: right;
        }

        .clear { clear: both; }
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
    <b>SURAT PERINTAH</b><br>
    KEPALA KEJAKSAAN NEGERI KEPULAUAN SELAYAR<br>
    NOMOR : {{ $nomor }}
</div>

<br>

<div class="center">
<b>KEPALA KEJAKSAAN NEGERI KEPULAUAN SELAYAR,</b>
</div>

<!-- MENIMBANG -->
    <table class="no-border section">
        <tr>
            <td width="14%">Menimbang</td>
            <td  width="1%">:</td>
            <td  width="1%">a.</td>
            <td>Bahwa perkara tindak pidana korupsi atas nama terpidana 
            <b>{{ $case->nama_terpidana }}</b>, berdasarkan Putusan 
            <b>{{ $case->wilayah_putusan }}</b> nomor 
            <b>{{ $case->nomor_putusan }}</b>, yang telah berkekuatan hukum tetap,
            menjatuhkan pidana tambahan untuk membayar uang pengganti sebesar 
            <b>Rp {{ number_format($case->uang_pengganti,0,',','.') }}</b>.</td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">b.</td>
            <td>Bahwa pada Kejaksaan Negeri Kepulauan Selayar terdapat barang rampasan negara yang diperhitungkan sebagai uang pengganti berupa 
                @php
                    $barang = $case->barang;
                    $count = $barang->count();
                @endphp
                @if($count == 1)
                    {{ $barang[0]->jenis_barang }} 

                @elseif($count == 2)
                    {{ $barang[0]->jenis_barang }} 
                    dan 
                    {{ $barang[0]->jenis_barang }} 

                @else
                    @foreach($barang as $b)
                        @if($loop->last)
                            dan {{ $barang[0]->jenis_barang }} 
                        @else
                            {{ $barang[0]->jenis_barang }} 
                        @endif
                    @endforeach
                @endif
            </td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">c.</td>
            <td>Bahwa barang rampasan negara sebagaimana pada huruf b tersebut, telah dilakukan penilaian melalui KPKNL Makassar sebagaimana tertuang dalam Laporan Penilaian Nomor : {{ $case->nomor_laporan_penilaian }} tanggal {{ $case->tanggal_laporan_penilaian_formatted }}</td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">d.</td>
            <td>Bahwa sebagai pelaksanaannya perlu dikeluarkan Surat Perintah Kepala Kejaksaan Negeri Kepulauan Selayar.</td>
        </tr>
    </table>

<!-- DASAR -->
     <table class="no-border">
        <tr>
            <td width="14%"><span class="bold">Mengingat</span></td>
            <td  width="1%">:</td>
            <td  width="1%">1.</td>
            <td> Undang-Undang Nomor 8 Tahun 1981 tentang Hukum Acara Pidana;</td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">2.</td>
            <td> Undang-Undang Nomor 17 Tahun 2003 tentang Keuangan Negara;<br></td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">3.</td>
            <td> Undang-Undang Nomor 1 Tahun 2004 tentang Perbendaharaan Negara;<br></td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">4.</td>
            <td> Undang-Undang Nomor 16 Tahun 2004 tentang Kejaksaan Republik Indonesia sebagaimana telah diubah dengan Undang-Undang Nomor 11 Tahun 2021 tentang 
                Perubahan atas Undang-Undang Nomor 16 Tahun 2004 tentang Kejaksaan Republik Indonesia;</td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">5.</td>
            <td> Undang-Undang Nomor 9 Tahun 2018 tentang Penerimaan Negara Bukan Pajak;</td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">6.</td>
            <td> Peraturan Pemerintah Nomor 27 Tahun 2014 tentang Pengelolaan Barang Milik Negara/Daerah sebagaimana telah diubah dengan Peraturan Pemerintah Nomor 28 
                Tahun 2020 tentang Perubahan atas Peraturan Pemerintah Nomor 27 Tahun 2014 tentang Pengelolaan Barang Milik Negara / Daerah;</td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">7.</td>
            <td> Peraturan Presiden Nomor 38 Tahun 2010 tentang Organisasi Dan Tata Kerja Kejaksaan Republik Indonesia sebagaimana telah beberapa kali diubah terakhir 
                dengan Peraturan Presiden Nomor 15 Tahun 2024 tentang Perubahan Ketiga atas Peraturan Presiden Nomor 38 Tahun 2010 tentang Organisasi dan Tata Kerja 
                Kejaksaan Republik Indonesia;</td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">8.</td>
            <td> Peraturan Jaksa Agung Nomor PER-013/A/JA/06/2014 tentang Pemulihan Aset;</td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">9.</td>
            <td> Peraturan Jaksa Agung Nomor PER-027/A/JA/10/2014 tentang Pedoman Pemulihan Aset sebagaimana telah beberapa kali diubah terakhir dengan Peraturan Kejaksaan 
                Nomor 7 Tahun 2020 tentang Perubahan Kedua atas Peraturan Jaksa Agung Nomor PER-027/A/JA/10/2014 tentang Pedoman Pemulihan Aset;</td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">10.</td>
            <td> Peraturan Jaksa Agung Nomor PER-006/A/JA/07/2017 tentang Organisasi dan Tata Kerja Kejaksaan Republik Indonesia sebagaimana telah beberapa kali diubah 
                terakhir dengan Peraturan Kejaksaan Nomor 3 Tahun 2024 tentang Perubahan Keempat atas Peraturan Jaksa Agung Nomor PER-006/A/JA/07/2017 tentang Organisasi 
                dan Tata Kerja Kejaksaan Republik Indonesia;</td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">11.</td>
            <td> Peraturan Menteri Keuangan Nomor 122 Tahun 2023 tentang Petunjuk Pelaksanaan Lelang;</td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">12.</td>
            <td> Peraturan Menteri Keuangan Nomor 145/PMK.06/2021 tentang Pengelolaan Barang Milik Negara yang Berasal dari Barang Rampasan Negara dan Barang Gratifikasi 
                sebagaimana telah diubah dengan Peraturan Menteri Keuangan Nomor 162 Tahun 2023 Tentang Perubahan atas Peraturan Menteri Keuangan Nomor 145/PMK.06/ 2021 
                tentang Pengelolaan Barang Milik Negara yang Berasal dari Barang Rampasan Negara dan Barang Gratifikasi.</td>
        </tr>
    </table>
<br>
<!-- MEMERINTAHKAN -->
<div class="section; center">MEMERINTAHKAN</div>

    <table class="no-border section">
        <tr>
            <td width="14%">Menimbang</td>
            <td  width="1%">:</td>
            <td  width="1%"></td>
            <td>Para Pejabat / Pegawai yang namanya tersebut dalam lampiran Surat Perintah ini</td>
        </tr>
        <tr>
            <td width="14%">Untuk</td>
            <td  width="1%">:</td>
            <td  width="1%">1.</td>
            <td>Melaksanakan lelang barang rampasan negara yang diperhitungkan sebagai uang pengganti dalam perkara tindak pidana korupsi atas nama terpidana 
                <b>{{ $case->nama_terpidana }}</b> pada Kejaksaan Negeri Kepulauan Selayar.</td>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">2.</td>
            <td>Memberikan izin kepada Pejabat / Pegawai yang namanya tersebut dalam lampiran Surat Perintah ini untuk menjual lelang Barang Rampasan Negara Yang Diperhitungkan sebagai uang pengganti an. Terpidana 
                <b>{{ $case->nama_terpidana }}</b>.</td>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">3.</td>
            <td>Penjualan lelang barang rampasan sebagaimana Diktum Kesatu, dilakukan melalui perantara KPKNL setempat yang berwenang  dan  dilaksanakan  secara  terbuka/umum melalui lelang internet <i>(e-Auction)</i> sehingga dapat tercapai harga penawar tertinggi.</td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">4.</td>
            <td>Penetapan nilai limit lelang didasarkan Nilai Wajar yang tercantum pada Laporan Penilaian KPKNL Makassar sesuai Laporan Penilaian Nomor : {{ $case->nomor_laporan_penilaian }} tanggal {{ $case->tanggal_laporan_penilaian_formatted }} 
                dengan nilai wajar sebesar 
                @php
                    $barang = $case->barang;
                    $count = $barang->count();
                @endphp
                @if($count == 1)
                    Rp {{ number_format($barang[0]->nilai_limit,0,',','.') }}

                @elseif($count == 2)
                    Rp {{ number_format($barang[0]->nilai_limit,0,',','.') }}
                    dan 
                    Rp {{ number_format($barang[1]->nilai_limit,0,',','.') }}

                @else
                    @foreach($barang as $b)
                        @if($loop->last)
                            dan Rp {{ number_format($b->nilai_limit,0,',','.') }}
                        @else
                            Rp {{ number_format($b->nilai_limit,0,',','.') }},
                        @endif
                    @endforeach
                @endif
            </td>
        </tr>
        <tr>
            <td width="14%"></td>
            <td  width="1%"></td>
            <td  width="1%">5.</td>
            <td>Melaporkan pelaksanaan lelang barang rampasan negara yang diperhitungkan sebagai uang pengganti dimaksud kepada Kepala Kejaksaan Negeri Kepulauan Selayar dengan dilampirkan surat-surat dan/atau dokumen terkait pelaksanaan lelang serta bukti setor.</td>
        </tr>
    </table>

<!-- TTD -->
<table style=" border-spacing: 0px !important;">
    <tr>
        <td style="width: 80%"> </td>
        <td style="text-align: left">
            Dikeluarkan di : Benteng<br>
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

</div>

<div class="clear"></div>

<!-- LAMPIRAN -->
<div style="page-break-before: always;"></div>

<div style="float:right; text-align:left;">
    <b>LAMPIRAN</b><br>
    Nomor : {{ $nomor }}<br>
    Tanggal : {{ $tanggal }}
</div>

<div style="clear: both;"></div>

<br>

<div class="center">
    <b>DAFTAR PELAKSANA LELANG</b>
</div>
<br>

<table class="table-lampiran">
<tr>
<th>No</th>
<th>Nama / Pangkat / NIP</th>
<th>Jabatan</th>
</tr>

@foreach($case->pelaksana as $p)
<tr>
<td class="center">{{ $loop->iteration }}</td>
<td>{{ $p->nama }} / {{ $p->pangkat }} / {{ $p->nip }}</td>
<td>{{ $p->jabatan }}</td>
</tr>
@endforeach

</table>

<br>

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


<!-- QR -->
<div class="qr-footer">
    <img src="data:image/svg+xml;base64,{{ $qr }}" width="60">
</div>

</body>
</html>