@extends('layouts.app')

@section('title', 'Detail Kasus')
@section('subtitle', 'Informasi lengkap perkara')

@section('styles')
<style>

    /* HEADER */
    /* WRAPPER */
    .header {
        background: linear-gradient(135deg, #1c1c1c, #2a2a2a);
        color: white;
        border-radius: 16px;
        margin: 20px;
        padding: 24px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .header-actions {
        display: flex;
        align-items: center;   /* ini kunci utama */
        gap: 10px;
    }

    /* LAYOUT */
    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    /* LEFT */
    .header-left {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    /* LABEL */
    .header-label {
        font-size: 11px;
        letter-spacing: 1px;
        color: #aaa;
    }

    /* TITLE */
    .header-title {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
    }

    /* INFO */
    .header-info {
        font-size: 13px;
        color: #ccc;
        display: flex;
        gap: 15px;
    }

    /* META */
    .header-meta {
        margin-top: 8px;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .badge {
        background: rgba(255,255,255,0.1);
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 12px;
    }

    /* RIGHT */
    .header-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    /* HIGHLIGHT BOX */
    .header-highlight {
        text-align: right;
    }

    .header-highlight .label {
        font-size: 11px;
        color: #bbb;
    }

    .header-highlight .value {
        font-size: 18px;
        font-weight: bold;
        color: #F2C94C;
    }

    /* ACTION */
    .header-actions {
        display: flex;
        gap: 8px;
    }
    .header-actions form {
        margin: 0;
        display: flex;
    }
    .header-actions a {
        display: flex;
    }

    /* BUTTON */
    .btn-edit-header {
        background: #F2C94C;
        color: black;
        height: 40px;              /* samakan tinggi */
        padding: 0 16px;           /* jangan pakai padding atas bawah */
        display: flex;
        align-items: center;       /* vertical center */
        justify-content: center;
        gap: 6px;
        font-size: 13px;
    }

    .btn-delete-header {
        background: #e74c3c;
        color: white;
        height: 40px;              /* samakan tinggi */
        padding: 0 16px;           /* jangan pakai padding atas bawah */
        display: flex;
        align-items: center;       /* vertical center */
        justify-content: center;
        gap: 6px;
        font-size: 13px;
    }


    h3 {
        margin-bottom: 10px;
    }

    form {
        margin-top: 15px;
    }

    .card-section {
        background: #ffffff;
        border-radius: 16px;
        margin: 20px;
        padding: 20px !important;
        box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    }

    /* TAB BUTTON */
    .tab-buttons {
        margin: 15px 0;
    }

    .tab-buttons button {
        padding: 10px 15px;
        border: none;
        background: #e0dedb;
        border-radius: 8px;
        margin-right: 5px;
        cursor: pointer;
        transition: 0.2s;
    }

    .tab-buttons button.active {
        background: #F2C94C;
        font-weight: bold;
    }

    /* TAB CONTAINER */
    .tab {
        display: none ;
        transform: translateY(10px);
        transition: 0.3s;
    }

    .tab.active {
        display: block;
        transform: translateY(0);
    }

    /* WRAPPER (WAJIB) */
    .tab-wrapper {
        position: relative;
        min-height: 200px;
    }
    .tab-buttons {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        border-bottom: 1px solid #eee;
        border-top-right-radius: 8px !important;
        border-top-left-radius: 8px !important;
    }

    .tab-buttons button {
        background: none;
        border: none;
        padding: 10px 16px;
        cursor: pointer;
        color: #777;
        position: relative;
        font-weight: 500;
    }

    .tab-buttons button.active {
        color: #000;
    }

    .tab-buttons button.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 3px;
        background: #F2C94C;
        border-top-right-radius: 3px !important;
        border-top-left-radius: 3px !important;
    }

    /* HOVER */
    .tab-buttons button:hover {
        color: #000;
    }

    /* ACTIVE */
    .tab-buttons button.active {
        color: #000;
        border-bottom: 2px solid #F2C94C;
        font-weight: 600;
    }

    /* FORM */
    .form-group {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 12px;
        margin-top: 15px;
    }

    input {
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 13px;
    }

    input:focus {
        border-color: #F2C94C;
        outline: none;
    }

    /* BUTTON */
    .btn {
        border-radius: 8px;
        padding: 10px 16px;
        font-size: 13px;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-add {
        background: linear-gradient(#F2C94C, #E0B93F);
        color: black;
    }

    .btn-save {
        background: #1c1c1c;
        color: white;
    }

    .btn:hover {
        transform: translateY(-1px);
        opacity: 0.9;
    }

    .btn-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        padding: 0; /* penting */
    }

    .btn-icon i {
        font-size: 16px;
    }

    .btn-edit {
        background: #ecebea;
    }

    .btn-delete {
        background: #e74c3c;
        color: white;
        margin: 0;
    }

    /* GRID */
    .pdf-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 16px;
    }

    /* CARD */
    .pdf-card {
        background: white;
        border-radius: 14px;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        color: #333;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        transition: 0.25s;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    /* ICON */
    .pdf-card i {
        font-size: 28px;
        color: #F2C94C;
    }

    /* TEXT */
    .pdf-card span {
        font-size: 14px;
        font-weight: 600;
    }

    /* HOVER */
    .pdf-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        background: #fffdf5;
    }

    .btn-pdf:hover {
        background: #d4aa2f;
        transform: translateY(-2px);
    }
    .pdf-card:active {
        transform: scale(0.97);
    }

    /* TABLE */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th {
        text-align: left;
        font-weight: 600;
        padding: 12px;
        background: #faf9f6;
        font-size: 14px;
    }

    td {
        padding: 12px;
        font-size: 14px;
        border-top: 1px solid #eee;
    }

    tr:hover {
        background: #fafafa;
    }

    .action-cell {
        display: flex;
        justify-content: center;
        align-items: center; /* WAJIB */
        gap: 8px;
    }
    .action-cell form {
        margin: 0;
        display: flex;
    }
    /* FORM GRID */

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
    .form-group {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 12px;
        margin-top: 15px;
    }

    /* TEXTAREA */
    textarea {
        resize: vertical;
        min-height: 70px;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 13px;
        font-family: inherit;
    }

    /* INPUT */
    input {
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 13px;
    }

    /* FOCUS */
    textarea:focus,
    input:focus {
        border-color: #F2C94C;
        outline: none;
    }

    /* CARD */
    .operator-card {
        background: white;
        border-radius: 16px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 18px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        margin-top: 20px;
        transition: 0.25s;
    }

    .operator-card:hover {
        transform: translateY(-2px);
    }

    /* AVATAR */
    .operator-avatar {
        width: 70px;
        height: 70px;
        background: #f5f5f5;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .operator-avatar i {
        font-size: 42px;
        color: #F2C94C;
    }

    /* INFO */
    .operator-info {
        flex: 1;
    }

    .operator-info h4 {
        margin: 0;
        font-size: 18px;
    }

    .operator-meta {
        margin-top: 6px;
        color: #777;
        font-size: 14px;
    }

    .operator-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* ACTION */
    .operator-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .operator-actions form {
        margin: 0;
    }

    /* EMPTY */
    .empty-state {
        text-align: center;
        padding: 30px;
        color: #999;
    }

    .empty-state i {
        font-size: 40px;
        margin-bottom: 10px;
    }
    /* GRID */
    .profile-grid {
        display: grid;
        gap: 16px;
        margin-top: 20px;
    }

    /* CARD */
    .profile-card {
        background: white;
        border-radius: 16px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 18px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        transition: 0.25s;
    }

    .profile-card:hover {
        transform: translateY(-2px);
    }

    /* AVATAR */
    .profile-avatar {
        width: 70px;
        height: 70px;
        background: #f5f5f5;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-avatar i {
        font-size: 34px;
        color: #F2C94C;
    }

    /* INFO */
    .profile-info {
        flex: 1;
    }

    .profile-info h4 {
        margin: 0;
        font-size: 17px;
    }

    .profile-meta {
        margin-top: 8px;
        display: flex;
        flex-direction: column;
        gap: 5px;
        color: #666;
        font-size: 14px;
    }

    .profile-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* ACTION */
    .profile-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .profile-actions form {
        margin: 0;
    }
    /* ERROR */
    .error-text{
        color:#e74c3c;
        font-size:12px;
        margin-top:4px;
        display:block;
    }

    /* INPUT ERROR */
    .input-error{
        border-color:#e74c3c !important;

        box-shadow:
            0 0 0 4px rgba(231,76,60,.12);
    }

</style>
@endsection

@section('content')
<!-- HEADER -->
<div class="header">
    <div class="header-content">

        <!-- LEFT -->
        <div class="header-left">

            <!-- LABEL -->
            <div class="header-label">
                DETAIL KASUS
            </div>

            <!-- TITLE -->
            <h2 class="header-title">
                {{ strtoupper($case->nama_terpidana) }}
            </h2>

            <!-- INFO UTAMA -->
            <div class="header-info">
                <span><i class="bi bi-file-earmark-text"></i>  {{ $case->nomor_putusan }}</span>
                <span><i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($case->tanggal_putusan)->translatedFormat('d F Y') }}</span>
            </div>

            <!-- META -->
            <div class="header-meta">
                <span class="badge">Jenis: {{ $case->jenis_perkara }}</span>
                <span class="badge">Wilayah: {{ $case->wilayah_putusan }}</span>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="header-right">

            <!-- HIGHLIGHT -->
            <div class="header-highlight">
                <div class="label">Sisa Uang Pengganti</div>
                <div class="value">
                    Rp {{ number_format($case->uang_pengganti - $case->uang_dibayar, 0, ',', '.') }}
                </div>
            </div>

            <!-- ACTION -->
            <div class="header-actions">
                <a href="/cases/{{ $case->id }}/edit">
                    <button class="btn btn-edit-header">
                        <i class="bi bi-pencil"></i>
                        Edit
                    </button>
                </a>

                <form action="/cases/{{ $case->id }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-delete-header">
                        <i class="bi bi-trash"></i>
                        Hapus
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>

<div class="card-section">
    <div class="pdf-grid">

        <a href="/keputusan/pdf/{{ $case->id }}" class="pdf-card">
            <i class="bi bi-file-earmark-text"></i>
            <span>Surat Keputusan</span>
        </a>

        <a href="/sprint/pdf/{{ $case->id }}" class="pdf-card">
            <i class="bi bi-file-earmark-arrow-down"></i>
            <span>Surat Perintah</span>
        </a>

        <a href="/permohonan/pdf/{{ $case->id }}" class="pdf-card">
            <i class="bi bi-file-earmark-plus"></i>
            <span>Surat Permohonan</span>
        </a>

        <a href="/pernyataan/pdf/{{ $case->id }}" class="pdf-card">
            <i class="bi bi-file-earmark-check"></i>
            <span>SPTJM</span>
        </a>

        <a href="/keterangan/pdf/{{ $case->id }}" class="pdf-card">
            <i class="bi bi-file-earmark-medical"></i>
            <span>Sisa Tagihan</span>
        </a>

        <a href="/barang/pdf/{{ $case->id }}" class="pdf-card">
            <i class="bi bi-file-earmark-bar-graph"></i>
            <span>Daftar Barang</span>
        </a>

    </div>
</div>

<!-- TAB -->
<div class="card-section" style="padding: 20px">
    <div class="tab-buttons" style="border-top-right-radius: 8px !important; border-top-left-radius: 8px !important;">
        <button onclick="showTab(event,'barang')" class="active">Barang</button>
        <button onclick="showTab(event,'pejabat')">Pejabat</button>
        <button onclick="showTab(event,'pelaksana')">Pelaksana</button>
        <button onclick="showTab(event,'operator')">Operator</button>
    </div>


    <div class="tab-wrapper">

        <!-- BARANG -->
        <div id="barang" class="tab active">
            <h3>Data Barang</h3>

            <form method="POST" id="formBarang" action="/barang">
                @csrf
                <input type="hidden" name="case_id" value="{{ $case->id }}">
                <input type="hidden" id="barang_id" name="id">

                <div id="barang-container">
                    <div class="form-group">
                        <textarea 
                            name="jenis_barang[]" 
                            id="jenis_barang"
                            placeholder="Jenis Barang (boleh panjang)"
                            rows="3"
                        ></textarea>
                        <div><input name="nilai_limit[]" id="nilai_limit" class="input-number rupiah" placeholder="Nilai Limit"><small class="error-text"></small></div>
                        <div><input name="uang_jaminan[]" id="uang_jaminan" class="input-number rupiah" placeholder="Jaminan"><small class="error-text"></small></div>
                        <input name="lokasi[]" id="lokasi" placeholder="Lokasi">
                    </div>
                </div>

            <div class="form-actions">
                <button type="button" class="btn btn-add" onclick="tambahBarang()">+ Tambah</button>
                <button class="btn btn-save">Simpan</button>
            </div>
            </form>

            <table>
                <tr>
                    <th>Jenis</th>
                    <th>Nilai</th>
                    <th>Jaminan</th>
                    <th>Lokasi</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>

                @forelse($case->barang as $b)
                <tr>
                    <td>{{ $b->jenis_barang }}</td>
                    <td>{{ number_format($b->nilai_limit) }}</td>
                    <td>{{ number_format($b->uang_jaminan) }}</td>
                    <td>{{ $b->lokasi }}</td>

                    <td class="action-cell">
                        <button 
                            type="button"
                            class="btn btn-icon btn-edit"
                            onclick="editBarang(this)"
                            data-id="{{ $b->id }}"
                            data-jenis="{{ $b->jenis_barang }}"
                            data-nilai="{{ $b->nilai_limit }}"
                            data-jaminan="{{ $b->uang_jaminan }}"
                            data-lokasi="{{ $b->lokasi }}"
                        >
                            <i class="bi bi-pencil"></i>
                        </button>

                        <form action="/barang/{{ $b->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-icon btn-delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                    @empty
                <tr>
                    <td colspan="5" style="text-align:center; color:#888;">
                        Belum ada data barang
                    </td>
                </tr>
                @endforelse
            </table>

        </div>

        <!-- PEJABAT -->
        <div id="pejabat" class="tab">
            <h3>Pejabat</h3>
            <div id="pejabatFormWrapper"
                style="{{ $case->pejabat ? 'display:none;' : '' }}">

                <form method="POST" action="/pejabat" id="formPejabat">
                    @csrf
                    <input type="hidden" name="case_id" value="{{ $case->id }}">
                    <input type="hidden" id="pejabat_id" name="id">

                    <div id="pejabat-container">
                        <div class="form-group">
                            <input name="nama" placeholder="Nama">
                            <input name="nip" placeholder="NIP">
                            <input name="pangkat" placeholder="Pangkat">
                            <input name="jabatan" placeholder="Jabatan">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button class="btn btn-save">Simpan</button>
                        <button 
                            type="button"
                            class="btn btn-delete"
                            onclick="hidePejabatForm()"
                        >
                            Batal
                        </button>
                    </div>
                </form>
            </div>

            @if($case->pejabat)

            <div class="profile-card">

                <!-- AVATAR -->
                <div class="profile-avatar">
                    <i class="bi bi-person-badge"></i>
                </div>

                <!-- INFO -->
                <div class="profile-info">
                    <h4>{{ $case->pejabat->nama }}</h4>

                    <div class="profile-meta">
                        <span>
                            <i class="bi bi-person-vcard"></i>
                            {{ $case->pejabat->nip }}
                        </span>

                        <span>
                            <i class="bi bi-award"></i>
                            {{ $case->pejabat->pangkat_golongan }}
                        </span>

                        <span>
                            <i class="bi bi-briefcase"></i>
                            {{ $case->pejabat->jabatan }}
                        </span>
                    </div>
                </div>

                <!-- ACTION -->
                <div class="profile-actions">

                    <button 
                        type="button"
                        class="btn btn-icon btn-edit"
                        onclick="editPejabat(this)"
                        data-id="{{ $case->pejabat->id }}"
                        data-nama="{{ $case->pejabat->nama }}"
                        data-nip="{{ $case->pejabat->nip }}"
                        data-pangkat="{{ $case->pejabat->pangkat_golongan }}"
                        data-jabatan="{{ $case->pejabat->jabatan }}"
                    >
                        <i class="bi bi-pencil"></i>
                    </button>

                    <form action="/pejabat/{{ $case->pejabat->id }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-icon btn-delete">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>

                </div>

            </div>

            @else

            <div class="empty-state">
                <i class="bi bi-person-x"></i>
                <p>Belum ada data pejabat</p>
            </div>

            @endif

        </div>

        <!-- PELAKSANA -->
        <div id="pelaksana" class="tab">
            <h3>Pelaksana</h3>
            <form method="POST" action="/pelaksana">
                @csrf
                <input type="hidden" name="case_id" value="{{ $case->id }}">
                <input type="hidden" id="pelaksana_id" name="id">

                <div id="pelaksana-container">
                    <div class="form-group">
                        <input name="nama[]" placeholder="Nama">
                        <input name="nip[]" placeholder="NIP">
                        <input name="pangkat[]" placeholder="Pangkat">
                        <input name="jabatan[]" placeholder="Jabatan">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-add" onclick="tambahPelaksana()">+ Tambah</button>
                    <button class="btn btn-save">Simpan</button>
                </div>

            <div class="profile-grid">

            @forelse($case->pelaksana as $pl)

            <div class="profile-card">

                <!-- AVATAR -->
                <div class="profile-avatar">
                    <i class="bi bi-people"></i>
                </div>

                <!-- INFO -->
                <div class="profile-info">
                    <h4>{{ $pl->nama }}</h4>

                    <div class="profile-meta">
                        <span>
                            <i class="bi bi-person-vcard"></i>
                            {{ $pl->nip }}
                        </span>

                        <span>
                            <i class="bi bi-award"></i>
                            {{ $pl->pangkat }}
                        </span>

                        <span>
                            <i class="bi bi-briefcase"></i>
                            {{ $pl->jabatan }}
                        </span>
                    </div>
                </div>

                <!-- ACTION -->
                <div class="profile-actions">

                    <button
                        type="button"
                        class="btn btn-icon btn-edit"
                        onclick="editPelaksana(this)"
                        data-id="{{ $pl->id }}"
                        data-nama="{{ $pl->nama }}"
                        data-nip="{{ $pl->nip }}"
                        data-pangkat="{{ $pl->pangkat }}"
                        data-jabatan="{{ $pl->jabatan }}"
                    >
                        <i class="bi bi-pencil"></i>
                    </button>

                    <form action="/pelaksana/{{ $pl->id }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-icon btn-delete">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>

                </div>

            </div>

            @empty

            <div class="empty-state">
                <i class="bi bi-people"></i>
                <p>Belum ada data pelaksana</p>
            </div>

            @endforelse

            </div>

            </form>
        </div>

<!-- OPERATOR -->
    <div id="operator" class="tab">

        <h3>Operator</h3>

        <div id="operatorFormWrapper" style="{{ $case->operator ? 'display:none;' : '' }}">

            <form method="POST" action="/operator" id="formOperator">
                @csrf

                <input type="hidden" name="case_id" value="{{ $case->id }}">
                <input type="hidden" name="id" id="operator_id">

                <div class="form-group">
                    <input 
                        name="nama_operator" 
                        id="nama_operator"
                        placeholder="Nama Operator"
                        value="{{ $case->operator->nama_operator ?? '' }}"
                    >

                    <input 
                        name="no_hp" 
                        id="no_hp"
                        placeholder="No HP"
                        value="{{ $case->operator->no_hp ?? '' }}"
                    >
                </div>

                <div class="form-actions">
                    <button class="btn btn-save" id="btnOperator">
                        {{ $case->operator ? 'Update' : 'Simpan' }}
                    </button>
                    <button 
                        type="button"
                        class="btn btn-delete"
                        onclick="hideOperatorForm()"
                    >
                        Batal
                    </button>
                </div>
            </form>
        </div>
  
    @if($case->operator)

    <div class="operator-card">

        <!-- AVATAR -->
        <div class="operator-avatar">
            <i class="bi bi-person-circle"></i>
        </div>

        <!-- INFO -->
        <div class="operator-info">
            <h4>{{ $case->operator->nama_operator }}</h4>

            <div class="operator-meta">
                <span>
                    <i class="bi bi-telephone"></i>
                    {{ $case->operator->no_hp }}
                </span>
            </div>
        </div>

        <!-- ACTION -->
        <div class="operator-actions">

            <!-- EDIT -->
            <button
                type="button"
                class="btn btn-icon btn-edit"
                onclick="editOperator(this)"
                data-id="{{ $case->operator->id }}"
                data-nama="{{ $case->operator->nama_operator }}"
                data-hp="{{ $case->operator->no_hp }}"
            >
                <i class="bi bi-pencil"></i>
            </button>

            <!-- DELETE -->
            <form action="/operator/{{ $case->operator->id }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-icon btn-delete">
                    <i class="bi bi-trash"></i>
                </button>
            </form>

        </div>

    </div>

    @else

    <div class="empty-state">
        <i class="bi bi-person-x"></i>
        <p>Belum ada data operator</p>
    </div>

    @endif
    
    </div>

    
</div>
</div>
@endsection

@section('scripts')
<script>

function showTab(event, tabName) {
    document.querySelectorAll('.tab').forEach(tab => {
        tab.classList.remove('active');
    });

    document.querySelectorAll('.tab-buttons button').forEach(btn => {
        btn.classList.remove('active');
    });

    document.getElementById(tabName).classList.add('active');

    if (event) {
        event.target.classList.add('active');
    }
}

function tambahBarang(){
    document.getElementById('barang-container').insertAdjacentHTML('beforeend', `
        <div class="form-group">
            <textarea name="jenis_barang[]" placeholder="Jenis Barang" rows="3"></textarea>
            <input name="nilai_limit[]" placeholder="Nilai Limit">
            <input name="uang_jaminan[]" placeholder="Jaminan">
            <input name="lokasi[]" placeholder="Lokasi">
        </div>
    `);
}

function editBarang(el) {

    document.getElementById('barang_id').value = el.dataset.id;
    document.getElementById('jenis_barang').value = el.dataset.jenis;
    document.getElementById('nilai_limit').value = el.dataset.nilai;
    document.getElementById('uang_jaminan').value = el.dataset.jaminan;
    document.getElementById('lokasi').value = el.dataset.lokasi;

    document.getElementById('formBarang').action = '/barang/' + el.dataset.id;

    if (!document.getElementById('methodPUT')) {
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = '_method';
        input.value = 'PUT';
        input.id = 'methodPUT';
        document.getElementById('formBarang').appendChild(input);
    }

    document.getElementById('btnSubmit').innerText = 'Update';
}


function tambahPelaksana(){
    document.getElementById('pelaksana-container').insertAdjacentHTML('beforeend', `
        <div class="form-group">
            <input name="nama[]" placeholder="Nama">
            <input name="nip[]" placeholder="NIP">
            <input name="pangkat[]" placeholder="Pangkat">
            <input name="jabatan[]" placeholder="Jabatan">
        </div>
    `);
}

function editPejabat(el){

    // tampilkan form
    document.getElementById('pejabatFormWrapper').style.display = 'block';

    // isi hidden id
    document.getElementById('pejabat_id').value = el.dataset.id;

    // isi form
    document.querySelector('[name="nama"]').value = el.dataset.nama;
    document.querySelector('[name="nip"]').value = el.dataset.nip;
    document.querySelector('[name="pangkat"]').value = el.dataset.pangkat;
    document.querySelector('[name="jabatan"]').value = el.dataset.jabatan;

    // form action
    let form = document.getElementById('formPejabat');

    form.action = '/pejabat/' + el.dataset.id;

    // method PUT
    if(!document.getElementById('methodPUT_pejabat')){

        let input = document.createElement('input');

        input.type = 'hidden';
        input.name = '_method';
        input.value = 'PUT';
        input.id = 'methodPUT_pejabat';

        form.appendChild(input);
    }

    // ubah tombol
    document.querySelector('#formPejabat .btn-save')
        .innerText = 'Update';

    // scroll smooth
    document.getElementById('pejabatFormWrapper')
        .scrollIntoView({
            behavior:'smooth'
        });
}

function hidePejabatForm(){

    document.getElementById('pejabatFormWrapper')
        .style.display = 'none';

    let form = document.getElementById('formPejabat');

    form.reset();

    form.action = '/pejabat';

    let method = document.getElementById('methodPUT_pejabat');

    if(method){
        method.remove();
    }

    document.querySelector('#formPejabat .btn-save')
        .innerText = 'Simpan';
}

function editPelaksana(el){

    document.getElementById('pelaksana_id').value = el.dataset.id;

    document.querySelector('#pelaksana input[name="nama[]"]').value = el.dataset.nama;
    document.querySelector('#pelaksana input[name="nip[]"]').value = el.dataset.nip;
    document.querySelector('#pelaksana input[name="pangkat[]"]').value = el.dataset.pangkat;
    document.querySelector('#pelaksana input[name="jabatan[]"]').value = el.dataset.jabatan;

    let form = document.querySelector('#pelaksana form');

    form.action = '/pelaksana/' + el.dataset.id;

    // tambah method PUT
    if(!document.getElementById('methodPUT_pelaksana')){
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = '_method';
        input.value = 'PUT';
        input.id = 'methodPUT_pelaksana';

        form.appendChild(input);
    }

    document.querySelector('#pelaksana .btn-save').innerText = 'Update';
}

function editOperator(el){

    // tampilkan form
    document.getElementById('operatorFormWrapper').style.display = 'block';

    // isi data
    document.getElementById('operator_id').value = el.dataset.id;

    document.getElementById('nama_operator').value = el.dataset.nama;
    document.getElementById('no_hp').value = el.dataset.hp;

    let form = document.getElementById('formOperator');

    form.action = '/operator/' + el.dataset.id;

    // method PUT
    if(!document.getElementById('methodPUT_operator')){
        let input = document.createElement('input');

        input.type = 'hidden';
        input.name = '_method';
        input.value = 'PUT';
        input.id = 'methodPUT_operator';

        form.appendChild(input);
    }

    document.getElementById('btnOperator').innerText = 'Update';

    // auto scroll
    document.getElementById('operatorFormWrapper')
        .scrollIntoView({
            behavior: 'smooth'
        });
}

function hideOperatorForm(){

    document.getElementById('operatorFormWrapper').style.display = 'none';

    document.getElementById('formOperator').reset();
}


document.querySelectorAll('.input-number').forEach(input=>{

    input.addEventListener('input', function(){

        let error = this.parentElement
            .querySelector('.error-text');

        // hanya angka + titik
        let clean = this.value.replace(/\./g,'');

        if(isNaN(clean)){

            this.classList.add('input-error');

            error.innerText =
                'Input harus berupa angka';

        }else{

            this.classList.remove('input-error');

            error.innerText = '';

        }

    });

});

</script>
@endsection