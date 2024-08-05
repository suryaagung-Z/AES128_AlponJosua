<?php
if (isset($_POST['submit_add_data'])) {
    $res_key = getCurrentKey();

    // Mendapatkan data dari form
    $no_faktur = $_POST['no_faktur'];
    $nama_customer = $_POST['nama_customer'];
    $nama_barang = $_POST['nama_barang'];
    $tanggal = $_POST['tanggal'];
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];
    $ppn = $_POST['ppn'];

    // Menghitung total harga setelah diskon dan PPN
    $harga_setelah_diskon = $harga - $diskon;
    $total_harga = $harga_setelah_diskon + $ppn;

    // Menyimpan data ke dalam tabel data_ukm
    $no_faktur = encryptAES128($no_faktur, $res_key);
    $nama_customer = encryptAES128($nama_customer, $res_key);
    $nama_barang = encryptAES128($nama_barang, $res_key);
    $tanggal = encryptAES128($tanggal, $res_key);
    $harga = encryptAES128($harga, $res_key);
    $diskon = encryptAES128($diskon, $res_key);
    $ppn = encryptAES128($ppn, $res_key);
    $total_harga = encryptAES128($total_harga, $res_key);

    $sql = "INSERT INTO data_ukm 
                (no_faktur, nama_customer, nama_barang, tanggal, harga, diskon, ppn, total_harga) 
                VALUES ('$no_faktur', '$nama_customer', '$nama_barang', '$tanggal', '$harga', '$diskon', '$ppn', '$total_harga')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil ditambahkan');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}

?>

<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Data UKM</h6>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="no_faktur" class="form-label">Nomor Faktur</label>
                        <input type="text" class="form-control" id="no_faktur" name="no_faktur" placeholder="Nomor Faktur" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_customer" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Nama Pelanggan" required>
                    </div>
                    <div class="mb-3">
                        <label for="namabarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namabarang" name="nama_barang" placeholder="Nama Barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <div class="d-flex gap-2 align-items-center">
                            <span class="fs-5">Rp</span>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga awal (Rp)" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="diskon" class="form-label">Diskon</label>
                        <div class="d-flex gap-2 align-items-center">
                            <span class="fs-5">Rp</span>
                            <input type="number" class="form-control" id="diskon" name="diskon" placeholder="Diskon (Rp)" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ppn" class="form-label">PPN</label>
                        <div class="d-flex gap-2 align-items-center">
                            <span class="fs-5">Rp</span>
                            <input type="number" class="form-control" id="ppn" name="ppn" placeholder="PPN (Rp)" required>
                        </div>
                    </div>
                    <button type="submit" name="submit_add_data" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Form End -->