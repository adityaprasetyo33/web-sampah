<?php
include 'connection.php';
if (isset($_POST['tambahSetor'])) {
    $tgl = $_POST['tgl'];
    $lokasi = $_POST['lokasi'];
    $jenis = $_POST['jenis'];
    $berat = $_POST['berat'];
    $conn = connect();
    $sql = "INSERT INTO `setor_sampah`(`id_setor`, `tgl_setor`, `id_jenis`, `berat_hasil`, `id_lokasi`) VALUES (NULL,'$tgl','$jenis','$berat','$lokasi')";
    if ($conn->query($sql) === TRUE) {
        $sql = "SELECT * FROM `tempat_penghasil` WHERE `id_lokasi`= '$lokasi' && `id_jenis`= '$jenis' && MONTH('$tgl')";
        $result = mysqli_query($conn, $sql);
        $cek = mysqli_num_rows($result);
        if ($cek > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $tambah = $row['jumlah_sampah'] + $berat;
                $sql = "UPDATE `tempat_penghasil` SET `jumlah_sampah`='$tambah' WHERE `id_lokasi`= '$lokasi' && `id_jenis`= '$jenis' && MONTH('$tgl')";
                if ($conn->query($sql) === TRUE) {
                    echo "<script type='text/javascript'>alert('add successfully!')</script>";
                }
            }
        } else {
            $sql = "INSERT INTO `tempat_penghasil`(`id_penghasil`, `id_lokasi`, `id_jenis`, `jumlah_sampah`, `bulan`) VALUES (null,'$lokasi','$jenis','$berat',MONTH('$tgl'))";
            if ($conn->query($sql) === TRUE) {
                echo "<script type='text/javascript'>alert('add successfully!')</script>";
            }
        }
    } else {
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
    $conn->close();
    header("Location: setor_sampah.php");
}
if (isset($_POST['tambahLokasi'])) {
    $lokasi = $_POST['lokasi'];
    $conn = connect();
    $sql = "INSERT INTO `lokasi`(`id_lokasi`, `nama_lokasi`) VALUES (null,'$lokasi')";
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('delete successfully!')</script>";
    } else {
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
    $conn->close();
    header("Location:tabel.php");
}
if (isset($_POST['tambahJenis'])) {
    $jenis = $_POST['jenis'];
    $kategori = $_POST['kategori'];
    $conn = connect();
    $sql = "INSERT INTO `jenis_sampah`(`id_jenis`, `nama_jenis`, `id_kategori`) VALUES (null,'$jenis','$kategori')";
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('delete successfully!')</script>";
    } else {
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
    $conn->close();
    header("Location:tabel.php");
}
