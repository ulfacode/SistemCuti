<?php
include '../../config/f_pengajuan.php';
$id_pengajuan = $_GET['id'];
$query     = mysqli_query($conn, "SELECT * FROM tb_pengajuan WHERE id_pengajuan='$id_pengajuan'");
$result    = mysqli_fetch_array($query);
if ($result['nim']) {

    $sql = "select * from tb_mahasiswa";
    $hasil = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($hasil)) {
        $nim = $data['nim'];
        $id_doswal = $data['id_doswal'];
        $id_kajur = $data['id_kajur'];
        $nama = $data['nama'];
        $kelas = $data['kelas'];
        $alamat = $data['alamat'];
        $no_telp = $data['no_telp'];
        $ttd = $data['ttd'];
    }
}

// ambil data doswal
$sql2 = mysqli_query($conn, "select p.nama, p.ttd, p.nip_npak from tb_doswal as d, tb_pegawai as p WHERE d.nip_npak=p.nip_npak AND id_doswal='$id_doswal'");
while ($data_doswal = mysqli_fetch_array($sql2)) {
    $nama_doswal = $data_doswal['nama'];
    $nip_doswal = $data_doswal['nip_npak'];
    $ttd_doswal = $data_doswal['ttd'];
}
// ambil data kajur
$kajur = mysqli_query($conn, "select p.nama, p.ttd, p.nip_npak, k.nm_jurusan from tb_pegawai as p, tb_kajur as k WHERE p.nip_npak=k.nip_npak AND id_kajur='$id_kajur'");
while ($data_kajur = mysqli_fetch_array($kajur)) {
    $nama_kajur = $data_kajur['nama'];
    $nm_jurusan = $data_kajur['nm_jurusan'];
    $nip_kajur = $data_kajur['nip_npak'];
    $ttd_kajur = $data_kajur['ttd'];
}
// ambil wadir 1
$wadir = mysqli_query($conn, "select nama, ttd, nip_npak from tb_pegawai WHERE status='Aktif' AND jabatan='Wakil Direktur 1'");
while ($data_wadir = mysqli_fetch_array($wadir)) {
    $nama_wadir = $data_wadir['nama'];
    $nip_wadir = $data_wadir['nip_npak'];
    $ttd_wadir = $data_wadir['ttd'];
}



error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        table {
            border-style: double;
            border-width: 4px;
            border-color: white;
        }

        table tr,
        td .text2 {
            vertical-align: top !important;
            text-align: justify;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <center>
        <table width="600">
            <tr>
                <td>
                    <center>
                        <font size="4"><strong>SURAT PERMOHONAN IZIN AKTIF AKADEMIK</strong> </font>
                    </center>
                </td>
            </tr>
            <tr></tr>
            <tr></tr>
        </table>

        <table width="600">
            <tr>
                <td width="250">Kepada</td>
                <td width=""></td>
                <td width="200"></td>
            </tr>
            <tr>
                <td width="250">
                    Direktur Politeknik Negeri Cilacap
                </td>
                <td width="20"></td>
                <td width="200"></td>
            </tr>
        </table>
        <table width="600">
            <tr>
                <td>
                    <font size="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yang bertanda tangan di bawah ini, saya:</font>
                </td>
            </tr>
        </table>

        <table width="600">
            <tr>
                <td width="150">nama</td>
                <td width="20"><span>:</span>
                <td>
                <td width=""><?= $nama; ?></td>
            </tr>
            <tr>
                <td width="150">NPM</td>
                <td width="20"><span>:</span>
                <td>
                <td width=""><?= $nim; ?></td>
            </tr>
            <tr>
                <td width="150">kelas/semester</td>
                <td width="20"><span>:</span>
                <td>
                <td width=""><?= $kelas; ?> / <?= $result['semester_cuti']; ?></td>
            </tr>
            <tr>
                <td width="150">jurusan</td>
                <td width="20"><span>:</span>
                <td>
                <td width=""><?= $nm_jurusan; ?></td>
            </tr>
            <tr>
                <td width="150">no. telp/handphone</td>
                <td width="20"><span>:</span>
                <td>
                <td width=""><?= $no_telp; ?></td>
            </tr>
            <tr>
                <td width="150">alamat lengkap</td>
                <td width="20"><span>:</span>
                <td>
                <td width=""><?= $alamat; ?></td>
            </tr>

        </table>

        <table width="600">
            <tr>
                <td>
                    <font size="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; dengan ini mengajukan izin aktif kembali untuk mengikuti kegiatan akademik mulai</font>
                </td>
            </tr>
        </table>

        <table width="600">
            <tr>
                <td width="150">semester</td>
                <td width="20">:
                <td>
                <td width="450"> <?= $result['semester_cuti']; ?> </td>
            </tr>
            <tr>
                <td width="150">tahun akademik</td>
                <td width="20">:
                <td>
                <td width="450"><?= $result['thn_akademik']; ?></td>
            </tr>
        </table>

        <table width="600">
            <tr>
                <td>
                    <font size="3">Sebagai bahan pertimbangan, bersama ini kami lampirkan:<br></font>
                    <font size="3">1. Bukti pembayaran SPP terakhir <br></font>
                    <font size="3">2. KTM yang masih berlaku <br></font>
                    <font size="3">3. Kartu perpustakaan <br></font>
                    <font size="3">4. Surat keterangan lain yang relevan (surat keterangan sakit, surat keterangan bekerja, dll)</font>
                </td>
            </tr>
        </table>
        <table width="600">
            <tr>
                <td>
                    <font size="3">&nbsp;&nbsp;&nbsp; Demikian surat permohonan aktif kembali ini kami buat. Atas perhatian dan kebijaksanaannya kami ucapkan terima kasih.</font>
                </td>
            </tr>
        </table>

        <table width="600">
            <tr>
                <td width="230"></td>
                <td width=""></td>
                <td width="230">Cilacap, <?= tgl($result['tgl_pengajuan']); ?></td>
            </tr>
            <tr>
                <td colspan="3">
                    <font size="3">Mengetahui</font>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <font size="3">Orang Tua/Wali</font>
                </td>
                <td></td>
                <td align="center">
                    <font size="3">Pemohon</font>
                </td>
            </tr>

            <tr>
                <?php
                if (empty($result['ttd_ortu'])) {
                    $result['ttd_ortu'] = "";
                } else { ?>

                    <td align="center"><img src="../../mahasiswa/pengajuan/img/<?= $result['ttd_ortu']; ?>" width="60" height="60" alt="tanda tangan orang tua mahasiswa"></td>
                <?php
                }
                ?>
                <td></td>
                <?php
                if (empty($result['ttd_ortu'])) {
                    $ttd = "";
                } else { ?>
                    <td align="center"><img src="../mahasiswa/img/<?= $ttd ?>" width="60" height="60" alt="tanda tangan mahasiswa"></td>
                <?php
                }
                ?>
            </tr>

            <tr>
                <td align="center"><?= $result['nama_ortu']; ?></td>
                <td></td>
                <td align="center"><?= $nama ?></td>
            </tr>
            <tr>
                <td></td>
                <td align="center">Mengetahui</td>
                <td></td>
            </tr>
            <tr>
                <td align="center">
                    Ketua Jurusan
                </td>
                <td></td>
                <td align="center">Wali Kelas</td>
            </tr>
            <tr>
                <td align="center">
                    <?= $nm_jurusan; ?>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td align="center"><img src="../pegawai/img/<?= $ttd_kajur; ?>" width="60" height="60" alt="tanda tangan kajur"></td>
                <td></td>
                <td align="center"><img src="../pegawai/img/<?= $ttd_doswal; ?>" width="60" height="60" alt="tanda tangan doswal"></td>
            </tr>
            <tr>
                <td align="center"><?= $nama_kajur; ?></td>
                <td></td>
                <td align="center"><?= $nama_doswal ?></td>
            </tr>
            <tr>
                <td align="center">NPAK. <?= $nip_kajur; ?></td>
                <td></td>
                <td align="center">NPAK. <?= $nip_doswal ?></td>
            </tr>
            <tr>
                <td width="230"></td>
                <td align="center">Menyetujui</td>
                <td width="230"></td>
            </tr>
            <tr>
                <td></td>
                <td align="center">Wakil Direktur 1</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td align="center"><img src="../pegawai/img/<?= $ttd_wadir; ?>" width="60" height="60" alt="tanda tangan wadir1"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td align="center"><?= $nama_wadir; ?></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td align="center">NPAK. <?= $nip_wadir; ?></td>
                <td></td>
            </tr>
        </table>
    </center>


    <!-- <div style="page-break-before:always;">
        <embed src="../../mahasiswa/pengajuan/img/<?= $result['lampiran']; ?>" type="application/pdf" width="100%" height="600px" />
    </div> -->

</body>

</html>
<script>
    window.print();
</script>