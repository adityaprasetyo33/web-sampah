<?php
include 'connection.php';
if (isset($_POST['ubahSetor'])) {
    $id = $_POST['update_id'];
    $berat_baru = $_POST['berat'];
    $conn = connect();
    // $sql = "UPDATE `setor_sampah` SET `berat_hasil`='$berat' WHERE id='$id'";
    $sql = "SELECT * FROM `setor_sampah` WHERE id_setor = '$id'";
    $result1 = mysqli_query($conn, $sql);
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $lokasi = $row1['id_lokasi'];
        $jenis = $row1['id_jenis'];
        $sql = "SELECT * FROM `tempat_penghasil` WHERE `id_lokasi`= '$lokasi' && `id_jenis`= '$jenis'";
        $result2 = mysqli_query($conn, $sql);
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $jumlah = $row2['jumlah_sampah'] - $row1['berat_hasil'] + $berat_baru;
            echo $row1['berat_hasil'];
            echo $row2['jumlah_sampah'];
            echo $jumlah;
            $sql = "UPDATE `tempat_penghasil` SET `jumlah_sampah`='$jumlah' WHERE `id_lokasi`= '$lokasi' && `id_jenis`= '$jenis'";
            if ($conn->query($sql) === TRUE) {
                $sql = "UPDATE `setor_sampah` SET `berat_hasil`='$berat_baru'  WHERE id_setor = '$id'";
                if ($conn->query($sql) === TRUE) {
                    echo "<script type='text/javascript'>alert('delete successfully!')</script>";
                } else {
                    echo "<script type='text/javascript'>alert('failed!')</script>";
                }
            }
        }
    }
    $conn->close();
}
header("Location: setor_sampah.php");
