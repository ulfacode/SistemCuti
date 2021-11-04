<?php
include '../../config/f_pengajuan.php';

session_start();
$nip_npak = $_SESSION['nip_npak'];

if (isset($_POST["up_SK"])) {
    if (upload_sk($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diupload!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diupload!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengajuan Cuti dan Izin Aktif</title>

    <?php
    include "../../../public/rel.php";
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
        include "../../../public/header.php";
        ?>
        <!-- /.Navbar -->

        <!-- Main Sidebar Container -->
        <?php include "../../../public/sidebar.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pengajuan Cuti dan Izin Aktif</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item">Pengajuan Cuti dan Izin Aktif</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->
                            <div class="card">
                                <!-- <div class="card-header">

                                </div> -->
                                <!-- /.card-header -->


                                <?php

                                $user = mysqli_query($conn, "SELECT * FROM v_pengajuan");
                                $row_user = $user->fetch_assoc();
                                ?>

                                <div class="card-body">
                                    <table id="example" class="table table-striped table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>NIM</th>
                                                <th>Nama </th>
                                                <th>Jenis</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Semester Cuti/Aktif</th>
                                                <th>Tahun Akademik</th>
                                                <th>Alasan</th>
                                                <th>Status</th>
                                                <th>Verifikasi</th>
                                                <th>Detail Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($user as $row_user) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row_user['nim'] ?></td>
                                                    <td><?php echo $row_user['nama'] ?></td>
                                                    <td><?php echo $row_user['jns_pengajuan'] ?></td>
                                                    <td><?= tgl($row_user['tgl_pengajuan']); ?></td>
                                                    <td><?php echo $row_user['semester_cuti'] ?></td>
                                                    <td><?php echo $row_user['thn_akademik'] ?></td>
                                                    <td><?php echo $row_user['alasan'] ?></td>

                                                    <!-- untuk menampilkan status sesuai user yang sudah verifikasi -->
                                                    <?php
                                                    if (empty($row_user['status'])) {
                                                        $stt = "Menunggu verifikasi dosen wali";
                                                        $warna = 'red';
                                                    } else {
                                                        if ($row_user['status'] == "1") {
                                                            $stt = "Telah diverifikasi dosen wali";
                                                            $warna = 'cornflowerblue';
                                                        } elseif ($row_user['status'] == "2") {
                                                            if ($row_user['jns_pengajuan'] == "Cuti") {
                                                                $stt = "Silahkan verifikasi";
                                                                $warna = 'red';
                                                            } else {
                                                                $stt = "Telah diverifikasi ketua jurusan";
                                                                $warna = 'brown';
                                                            }
                                                        } elseif ($row_user['status'] == "3") {
                                                            if ($row_user['jns_pengajuan'] == "Izin Aktif") {
                                                                $stt = "Silahkan verifikasi";
                                                                $warna = 'red';
                                                            } else {
                                                                $stt = "";
                                                                $warna = 'brown';
                                                            }
                                                        } elseif ($row_user['status'] == "4") {
                                                            $stt = "Selesai diverifikasi";
                                                            $warna = 'green';
                                                        } elseif ($row_user['status'] == "5") {
                                                            $stt = "Ditolak";
                                                            $warna = 'orange';
                                                        } else {
                                                            $stt = "Status not found";
                                                            $warna = '';
                                                        }
                                                    } ?>

                                                    <td style="color: <?php echo $warna; ?>;">
                                                        <!-- menampilkan isi dari status verifikasi berdasarkan yang sudah dibuat di atas -->
                                                        <?php
                                                        echo "$stt";
                                                        ?>
                                                    </td>

                                                    <td>
                                                        <?php
                                                        if (empty($row_user['status'])) {
                                                            echo "";
                                                        }
                                                        // $level dari sidebar
                                                        if ($row_user['jns_pengajuan'] == "Cuti") {
                                                            if ($row_user['status'] == "2") { ?>

                                                                <a href="terima_p.php?id=<?= $row_user['id_pengajuan']; ?>&nip_npak=<?= $nip_npak; ?>&jabatan=<?= $level; ?>" onclick="return confirm('Anda yakin menerima pengajuan ini?')" class="btn btn-outline-none"><i class="fas fa-check" style="color: green;"></i>
                                                                    ACC &nbsp;&nbsp;</a>
                                                                <a href="tolak_p.php?id=<?= $row_user['id_pengajuan']; ?>&nip_npak=<?= $nip_npak; ?>" class="btn btn-outline-none" onclick="return confirm('Anda yakin menolak pengajuan ini?')"><i class="fas fa-times" style="color: red;"></i>
                                                                    Tolak</a>
                                                            <?php }
                                                        } elseif ($row_user['jns_pengajuan'] == "Izin Aktif") {
                                                            if ($row_user['status'] == "3") { ?>
                                                                <a href="terima_p.php?id=<?= $row_user['id_pengajuan']; ?>&nip_npak=<?= $nip_npak; ?>&jabatan=<?= $level; ?>" onclick="return confirm('Anda yakin menerima pengajuan ini?')" class="btn btn-outline-none"><i class="fas fa-check" style="color: green;"></i>
                                                                    ACC &nbsp;&nbsp;</a>
                                                                <a href="tolak_p.php?id=<?= $row_user['id_pengajuan']; ?>&nip_npak=<?= $nip_npak; ?>" class="btn btn-outline-none" onclick="return confirm('Anda yakin menolak pengajuan ini?')"><i class="fas fa-times" style="color: red;"></i>
                                                                    Tolak</a>
                                                        <?php }
                                                        } else {
                                                            echo "Terverfikasi";
                                                        }
                                                        ?>
                                                    </td>

                                                    <td>
                                                        <a class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#cekStatus">
                                                            Cek Status
                                                        </a>
                                                        <?php
                                                        $id = $row_user['id_pengajuan'];
                                                        $query     = mysqli_query($conn, "SELECT * FROM tb_verifikasi WHERE id_pengajuan='$id' ORDER BY tgl_verif");
                                                        $result = $query->fetch_assoc();
                                                        ?>
                                                        <!-- modal cek status -->
                                                        <div class="modal fade" id="cekStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Detail Pengajuan</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick='window.location.reload();'>
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <form action="" enctype="multipart/form-data" method="POST">
                                                                            <div class="card-body">

                                                                                <table class="table table-bordered">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="width: 10px">#</th>
                                                                                            <th>Nama</th>
                                                                                            <th>Jabatan</th>
                                                                                            <th>Tanggal</th>
                                                                                            <th style="width: 40px">Status</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                                        $a = 1;
                                                                                        foreach ($query as $result) {
                                                                                            // if ($result['nip_npak']) {
                                                                                            $pegawai = mysqli_query($conn, "SELECT tb_pegawai.nama,tb_pegawai.jabatan FROM tb_pegawai, tb_verifikasi WHERE tb_verifikasi.nip_npak = '$result[nip_npak]' AND tb_pegawai.nip_npak=tb_verifikasi.nip_npak");
                                                                                            $hasil_pegawai    = $pegawai->fetch_assoc();
                                                                                            // }
                                                                                        ?>
                                                                                            <tr>
                                                                                                <td><?= $a; ?></td>
                                                                                                <td><?= $result['nip_npak']; ?></td>
                                                                                                <td><?= $hasil_pegawai['jabatan']; ?></td>
                                                                                                <td><?= tgl($result['tgl_verif']); ?></td>
                                                                                                <td><span class="badge bg-danger">55%</span></td>
                                                                                            </tr>
                                                                                        <?php

                                                                                            $a++;
                                                                                        }
                                                                                        ?>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <!-- /.card-body -->

                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <!-- untuk submit name nya harus sama dengan isset -->
                                                                        <button name="up_SK" class="btn btn-primary">Simpan</button>

                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- ./modal cek status -->
                                                    </td>

                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">
                                                                <!-- <i class="fa fa-file-alt"></i>  -->
                                                                <i class="fa fa-tools"></i>
                                                                <!-- Aksi -->
                                                            </button>
                                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu" role="menu">
                                                                <!-- <a class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#modalEdit<?php echo $row_user['id_pengajuan']; ?>">
                                                                        <i class="fa fa-edit"></i>
                                                                        Edit
                                                                    </a> -->
                                                                <?php
                                                                if ($row_user['jns_pengajuan'] == 'Cuti') { ?>
                                                                    <a class="dropdown-item" href="form_cuti.php?id=<?php echo $row_user['id_pengajuan']; ?>">
                                                                        <i class="fa fa-download"></i> Form Cuti
                                                                    </a>
                                                                    <a class="dropdown-item" href="../../mahasiswa/pengajuan/img/<?php echo $row_user['lampiran']; ?>">
                                                                        <i class="fa fa-download"></i> Lampiran
                                                                    </a>
                                                                    <a class="dropdown-item" href="sk_cuti.php?id=<?php echo $row_user['id_pengajuan']; ?>">
                                                                        <i class="fa fa-download"></i> Generate SK
                                                                    </a>
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#uploadSKcuti">
                                                                        <i class="fa fa-upload"></i> Upload SK
                                                                    </a>
                                                                <?php
                                                                } else { ?>
                                                                    <a class="dropdown-item" href="form_aktif.php?id=<?php echo $row_user['id_pengajuan']; ?>">
                                                                        <i class="fa fa-download"></i> Form Aktif
                                                                    </a>
                                                                    <a class="dropdown-item" href="../../mahasiswa/pengajuan/img/<?php echo $row_user['lampiran']; ?>">
                                                                        <i class="fa fa-download"></i> Lampiran
                                                                    </a>
                                                                    <a class="dropdown-item" href="sk_aktif.php?id=<?php echo $row_user['id_pengajuan']; ?>">
                                                                        <i class="fa fa-download"></i> Generate SK
                                                                    </a>
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#uploadSKaktif">
                                                                        <i class="fa fa-upload"></i> Upload SK
                                                                    </a>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>


                                                    </td>
                                                </tr>
                                            <?php
                                                include "modal_up_sk.php";
                                                include "modal_cek_status.php";
                                                $i++;
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- footer -->
        <?php include "../../../public/footer.php"; ?>
        <!-- script -->
        <?php include "../../../public/script.php"; ?>

        <!-- Page specific script -->
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>

        <!-- Select2 -->
        <script src="../../../public/plugins/select2/js/select2.full.min.js"></script>

        <!-- datatable -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

    </div>
</body>

</html>