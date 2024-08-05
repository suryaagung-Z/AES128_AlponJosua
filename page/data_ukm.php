<?php
// Pengecekan query yang dibutuhkan
if (!isset($_GET['status']) || !in_array($_GET['status'], ['enc', 'dec'])) {
    header('location: index.php?page=data_ukm&status=enc');
    return;
}

$decrypt = false;
if ($_GET['status'] == 'dec') {
    if (isset($_POST['secret_key']) && ($_POST['secret_key'] == getCurrentKey())) {
        // Kunci valid, lanjutkan dengan proses dekripsi
        $decrypt = true;
    } else {
        echo '<p>Kunci tidak valid! <a href="index.php?page=data_ukm&status=enc">Kembali</a></p>';
        return;
    }
}

// Mengambil data dari tabel data_ukm
$sql = "SELECT id, nama_barang, tanggal, harga, diskon, ppn, total_harga FROM data_ukm";
$result = $conn->query($sql);
?>

<!-- Table Start -->
<style>
    table th {
        font-size: 0.8rem;
        text-transform: uppercase;
        white-space: nowrap;
        letter-spacing: 1px;
    }

    table td {
        font-size: .9rem;
    }
</style>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12 col-sm-8">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-3">Data UKM</h6>
                <?php if ($_GET['status'] == 'enc') { ?>
                    <form action="index.php?page=data_ukm&status=dec" method="post">
                        <div class="w-100 d-flex justify-content-end mb-3">
                            <input class="form-control form-control-sm" type="text" name="secret_key" id="secret_key" placeholder="key.." style="width: max-content;" autocomplete="off">
                            <button type="submit" name="form_decrypt" class="btn btn-sm btn-primary">Dekripsi</button>
                        </div>
                    </form>
                <?php } elseif ($_GET['status'] == 'dec') { ?>
                    <div class="w-100 d-flex justify-content-end mb-3">
                        <a type="button" class="btn btn-sm btn-primary" href="index.php?page=data_ukm&status=enc">Kembali</a>
                    </div>
                <?php } ?>
                <div class="w-100" style="overflow-x: auto;">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Diskon</th>
                                <th scope="col">PPN</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $decrypt ? decryptAES128($row['nama_barang'], getCurrentKey()) : $row['nama_barang']; ?></td>
                                    <td><?= $decrypt ? decryptAES128($row['tanggal'], getCurrentKey()) : $row['tanggal']; ?></td>
                                    <td>Rp<?= $decrypt ? number_format(decryptAES128($row['harga'], getCurrentKey()), 2, ',', '.') : $row['harga']; ?></td>
                                    <td>Rp<?= $decrypt ? number_format(decryptAES128($row['diskon'], getCurrentKey()), 2, ',', '.') : $row['diskon']; ?></td>
                                    <td>Rp<?= $decrypt ? number_format(decryptAES128($row['ppn'], getCurrentKey()), 2, ',', '.') : $row['ppn']; ?></td>
                                    <td>Rp<?= $decrypt ? number_format(decryptAES128($row['total_harga'], getCurrentKey()), 2, ',', '.') : $row['total_harga']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->