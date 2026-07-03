<h2>Input Barang</h2>

<form method="POST" action="/barang">
    @csrf

    <input type="hidden" name="case_id" value="1">

    <div id="barang-container">
        <div>
            <input type="text" name="jenis_barang[]" placeholder="Jenis Barang">
            <input type="number" name="nilai_limit[]" placeholder="Nilai Limit">
            <input type="number" name="uang_jaminan[]" placeholder="Uang Jaminan">
            <input type="text" name="lokasi[]" placeholder="Lokasi">
        </div>
    </div>

    <br>

    <button type="button" onclick="tambahBarang()">+ Tambah Barang</button>
    <button type="submit">Simpan</button>
</form>

<script>
function tambahBarang() {
    let html = `
    <div>
        <input type="text" name="jenis_barang[]" placeholder="Jenis Barang">
        <input type="number" name="nilai_limit[]" placeholder="Nilai Limit">
        <input type="number" name="uang_jaminan[]" placeholder="Uang Jaminan">
        <input type="text" name="lokasi[]" placeholder="Lokasi">
    </div>
    `;

    document.getElementById('barang-container').insertAdjacentHTML('beforeend', html);
}
</script>