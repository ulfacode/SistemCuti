<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="../../../public/dist/img/PNC.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIPCUT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                <?php
                $level = $_SESSION['level'];
                if ($level == "Mahasiswa") {
                    $user = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim = '$id'");
                    $row_user = $user->fetch_assoc();
                    foreach ($user as $row_user) {
                        if (!empty($row_user["foto"])) { ?>

                            <img src="../../admin/mahasiswa/img/<?= $row_user['foto']; ?>" class="img-circle elevation-2" alt="User Image">

                        <?php } else { ?>

                            <img src="../../../public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

                        <?php } ?>


            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $row_user['nama']; ?></a>
            </div>

            <?php
                    }
                } else {

                    $user = mysqli_query($conn, "SELECT * FROM tb_pegawai WHERE nip_npak = '$_SESSION[nip_npak]'");
                    $row = $user->fetch_assoc();
                    foreach ($user as $row) {
                        if (!empty($row["foto"])) { ?>

                <img src="../../admin/pegawai/img/<?= $row['foto']; ?>" class="img-circle elevation-2" alt="User Image">

            <?php } else { ?>

                <img src="../../../public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

            <?php } ?>


        </div>
        <div class="info">
            <a href="#" class="d-block"><?= $row['nama']; ?></a>
        </div>
<?php
                    }
                }
?>

    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class font-awesome or any other icon font library -->

            <!-- pemilihan sidebar berdasarkan level -->
            <?php
            $level = $_SESSION['level'];
            if ($level == "Mahasiswa") {
            ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../profil" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../pengajuan/index.php" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Pengajuan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../bayar_ukt/index.php" class="nav-link">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>Pembayaran UKT</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Bot Telegram</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../../logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>

            <?php } elseif ($level == "Administrator") { ?>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../profil" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Data Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../pegawai/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../doswal/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Dosen Wali</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../kajur/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Ketua Jurusan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../mahasiswa/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Mahasiswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../pengajuan/" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Pengajuan
                            <!-- <i class="fas fa-angle-left right"></i> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../laporan/" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Bot Telegram</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../../logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>

            <?php } elseif ($level == "Dosen Wali") { ?>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../profil" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../pengajuan/index.php" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Pengajuan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Bot Telegram</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../../logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>

            <?php } elseif ($level == "Ketua Jurusan") { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../profil" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../pengajuan/index.php" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Pengajuan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Bot Telegram</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../../logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
            <?php } elseif ($level == "Ketua Akademik") { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../profil" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../laporan/" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../../logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
            <?php } elseif ($level == "Bagian Keuangan") { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../profil" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../pengajuan/index.php" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Surat Keputusan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../ukt/index.php" class="nav-link">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>Uang Kuliah Tunggal</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Bot Telegram</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../../logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
            <?php } elseif ($level == "Bagian Perpustakaan") { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../profil" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../pengajuan/index.php" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Surat Keputusan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Bot Telegram</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../../logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
            <?php } elseif ($level == "Wakil Direktur 1") { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../profil" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../pengajuan/index.php" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Pengajuan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../laporan/" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Bot Telegram</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../../logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
            <?php } ?>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>