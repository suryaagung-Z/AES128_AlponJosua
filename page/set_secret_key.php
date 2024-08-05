<?php
// Menangani form submission
if (isset($_POST['submit'])) {
    $old_key = $_POST['old_key'];
    $new_key = $_POST['new_key'];

    // Pengecekan panjang kunci baru
    if (strlen($new_key) !== 16) {
        echo "<div class='alert alert-danger'>Kunci baru harus memiliki panjang 16 karakter.</div>";
    } else {
        // Sanitasi input
        $old_key = $conn->real_escape_string($old_key);
        $new_key = $conn->real_escape_string($new_key);

        // Mengecek apakah old_key ada di database
        $check_sql = "SELECT * FROM secret_keys WHERE `key` = '$old_key'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            // Jika old_key ditemukan, lakukan pembaruan kunci
            $update_sql = "UPDATE secret_keys SET `key` = '$new_key' WHERE `key` = '$old_key'";

            if ($conn->query($update_sql) === TRUE) {
                echo "<div class='alert alert-success'>Kunci berhasil diperbarui!</div>";

                // Ambil semua data dari tabel data_ukm
                $select_sql = "SELECT * FROM data_ukm";
                $data_result = $conn->query($select_sql);

                if ($data_result->num_rows > 0) {
                    while ($row = $data_result->fetch_assoc()) {
                        $nama_barang = decryptAES128($row['nama_barang'], $old_key);
                        $tanggal = decryptAES128($row['tanggal'], $old_key);
                        $harga = decryptAES128($row['harga'], $old_key);
                        $diskon = decryptAES128($row['diskon'], $old_key);
                        $ppn = decryptAES128($row['ppn'], $old_key);
                        $total_harga = decryptAES128($row['total_harga'], $old_key);

                        $nama_barang_enc = encryptAES128($nama_barang, $new_key);
                        $tanggal_enc = encryptAES128($tanggal, $new_key);
                        $harga_enc = encryptAES128($harga, $new_key);
                        $diskon_enc = encryptAES128($diskon, $new_key);
                        $ppn_enc = encryptAES128($ppn, $new_key);
                        $total_harga_enc = encryptAES128($total_harga, $new_key);

                        // Perbarui data yang telah dienkripsi ulang di tabel data_ukm
                        $update_data_sql = "UPDATE data_ukm SET 
                            nama_barang = '$nama_barang_enc', 
                            tanggal = '$tanggal_enc', 
                            harga = '$harga_enc', 
                            diskon = '$diskon_enc', 
                            ppn = '$ppn_enc', 
                            total_harga = '$total_harga_enc' 
                            WHERE id = '{$row['id']}'";

                        if (!$conn->query($update_data_sql)) {
                            echo "<div class='alert alert-danger'>Kesalahan: " . $conn->error . "</div>";
                        }
                    }
                }
            } else {
                echo "<div class='alert alert-danger'>Kesalahan: " . $conn->error . "</div>";
            }
        } else {
            // Jika old_key tidak ditemukan, tampilkan pesan kesalahan
            echo "<div class='alert alert-danger'>Kunci lama tidak ditemukan di database.</div>";
        }
    }
}

$conn->close();
?>

<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12 col-sm-8 col-md-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Secret Key</h6>
                <form action="" method="post" onsubmit="return validateKeyLength()">
                    <div class="mb-3">
                        <label for="old_key" class="form-label">Kunci Sebelumnya</label>
                        <input type="text" class="form-control" id="old_key" name="old_key" placeholder="Kunci Lama" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_key" class="form-label">Kunci Baru</label>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" id="new_key" name="new_key" placeholder="Kunci Baru" required>
                            <button type="button" class="btn btn-sm btn-primary" id="btn-generate-key"><i class="fas fa-sync"></i></button>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('btn-generate-key').addEventListener('click', function() {
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+[]{}|;:,.<>?`~';
        var keyLength = 16;
        var generatedKey = '';
        for (var i = 0; i < keyLength; i++) {
            var randomIndex = Math.floor(Math.random() * characters.length);
            generatedKey += characters[randomIndex];
        }
        var newKeyInput = document.getElementById('new_key');
        newKeyInput.value = generatedKey;

        // Copy to clipboard
        newKeyInput.select();
        newKeyInput.setSelectionRange(0, 99999); // For mobile devices
        document.execCommand("copy");
    });

    function validateKeyLength() {
        var newKey = document.getElementById('new_key').value;
        if (newKey.length !== 16) {
            alert('Kunci baru harus memiliki panjang 16 karakter.');
            return false;
        }
        return true;
    }
</script>
<!-- Form End -->