<?php
$req_page = '';
if (isset($_GET['page'])) {
    $req_page = $_GET['page'];
}
?>

<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>AES128</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"><?= $userlogin['username']; ?></h6>
                <span>User</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.php?page=dashboard" class="nav-item nav-link <?= $req_page == 'dashboard' ? 'active' : '' ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="index.php?page=tambah_data_ukm" class="nav-item nav-link <?= $req_page == 'tambah_data_ukm' ? 'active' : '' ?>"><i class="fa fa-keyboard me-2"></i>Tambah Data UKM</a>
            <a href="index.php?page=data_ukm&status=enc" class="nav-item nav-link <?= $req_page == 'data_ukm' ? 'active' : '' ?>"><i class="fa fa-table me-2"></i>Data UKM</a>
            <a href="index.php?page=set_secret_key" class="nav-item nav-link <?= $req_page == 'set_secret_key' ? 'active' : '' ?>"><i class="fa fa-keyboard me-2"></i>Set Secret Key</a>
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="button.php" class="dropdown-item">Buttons</a>
                    <a href="typography.php" class="dropdown-item">Typography</a>
                    <a href="element.php" class="dropdown-item">Other Elements</a>
                </div>
            </div> -->
        </div>
    </nav>
</div>