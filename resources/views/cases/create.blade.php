@extends('layouts.app')

@section('title', 'Input Kasus')
@section('subtitle', 'Tambah data perkara baru')

@section('content')

<style>
    /* WRAPPER */
    .case-form-wrapper{
        max-width: 1100px;
        margin: auto;
    }

    /* CARD */
    .form-card{
        background: white;
        border-radius: 18px;
        padding: 24px;
        margin-bottom: 22px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.05);
    }

    /* TITLE */
    .card-title{
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 22px;
        color: #222;
    }

    .card-title i{
        color: #F2C94C;
        font-size: 22px;
    }

    /* GRID */
    .form-grid{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .form-group{
        display: flex;
        flex-direction: column;
    }

    .form-group.full{
        grid-column: 1 / -1;
    }

    /* LABEL */
    label{
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #444;
    }

    /* INPUT */
    input{
        height: 44px;
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 0 14px;
        font-size: 14px;
        transition: .2s;
    }

    /* FOCUS */
    input:focus{
        border-color: #F2C94C;
        outline: none;
        box-shadow: 0 0 0 4px rgba(242,201,76,0.15);
    }

    /* PIDANA */
    .row-3{
        display: grid;
        grid-template-columns: repeat(3,1fr);
        gap: 14px;
    }

    /* BUTTON */
    .submit-area{
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .btn-submit{
        background: linear-gradient(135deg,#F2C94C,#E0B93F);
        color: black;
        border: none;
        border-radius: 12px;
        padding: 14px 24px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;

        display: flex;
        align-items: center;
        gap: 8px;

        transition: .2s;
    }

    .btn-submit:hover{
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(242,201,76,0.3);
    }

    .input-rupiah{
        display:flex;
        align-items:center;
        border:1px solid #ddd;
        border-radius:10px;
        overflow:hidden;
    }

    .input-rupiah span{
        background:#f5f5f5;
        padding:0 14px;
        height:44px;
        display:flex;
        align-items:center;
        font-weight:600;
    }

    .input-rupiah input{
        border:none;
        flex:1;
    }
</style>

<div class="case-form-wrapper">

    <form method="POST" action="/cases">
        @csrf

        <!-- DATA DASAR -->
        <div class="form-card">

            <div class="card-title">
                <i class="bi bi-folder2-open"></i>
                <span>Data Dasar</span>
            </div>

            <div class="form-grid">

                <div class="form-group">
                    <label>Nama Terpidana</label>
                    <input type="text" name="nama_terpidana" required>
                </div>

                <div class="form-group">
                    <label>Nomor Putusan</label>
                    <input type="text" name="nomor_putusan" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Putusan</label>
                    <input type="date" name="tanggal_putusan" required>
                </div>

                <div class="form-group">
                    <label>Jenis Perkara</label>
                    <input type="text" name="jenis_perkara">
                </div>

                <div class="form-group full">
                    <label>Wilayah Putusan</label>
                    <input type="text" name="wilayah_putusan">
                </div>

            </div>
        </div>

        <!-- KEUANGAN -->
        <div class="form-card">

            <div class="card-title">
                <i class="bi bi-cash-stack"></i>
                <span>Data Uang Pengganti</span>
            </div>

            <div class="form-grid">

                <div class="form-group">
                    <label>Besaran Uang Pengganti</label>
                    <div class="input-rupiah">
                        <span>Rp</span>
                        <input type="text" name="uang_pengganti" class="rupiah">
                    </div>
                </div>

                <div class="form-group">
                    <label>Uang yang Sudah Dibayar</label>
                    <div class="input-rupiah">
                        <span>Rp</span>
                        <input type="text" name="uang_dibayar" class="rupiah">
                    </div>
                </div>

            </div>
        </div>

        <!-- PIDANA -->
        <div class="form-card">

            <div class="card-title">
                <i class="bi bi-bank"></i>
                <span>Data Pidana</span>
            </div>

            <label>Lama Pidana</label>

            <div class="row-3">
                <input type="number" name="pidana_tahun" placeholder="Tahun">
                <input type="number" name="pidana_bulan" placeholder="Bulan">
                <input type="number" name="pidana_hari" placeholder="Hari">
            </div>

        </div>

        <!-- ADMIN -->
        <div class="form-card">

            <div class="card-title">
                <i class="bi bi-file-earmark-text"></i>
                <span>Data Administrasi</span>
            </div>

            <div class="form-grid">

                <div class="form-group">
                    <label>Nomor Nota Dinas</label>
                    <input type="text" name="nomor_nota_dinas">
                </div>

                <div class="form-group">
                    <label>Tanggal Nota Dinas</label>
                    <input type="date" name="tanggal_nota_dinas">
                </div>

                <div class="form-group">
                    <label>Nomor Laporan Penilaian</label>
                    <input type="text" name="nomor_laporan_penilaian">
                </div>

                <div class="form-group">
                    <label>Tanggal Laporan Penilaian</label>
                    <input type="date" name="tanggal_laporan_penilaian">
                </div>

            </div>
        </div>

        <!-- BUTTON -->
        <div class="submit-area">
            <button class="btn-submit">
                <i class="bi bi-save"></i>
                Simpan Data Kasus
            </button>
        </div>

    </form>

</div>

@endsection

@section('scripts')
<script>

document.querySelectorAll('.rupiah').forEach(input => {

    input.addEventListener('keyup', function(e){

        let angka = this.value.replace(/\D/g,'');

        this.value = formatRupiah(angka);

    });

});

function formatRupiah(angka){

    return new Intl.NumberFormat('id-ID').format(angka);

}

</script>
@endsection