<?php include 'template/headder.php'; ?>
<div class="container">
  <div id="lokasiModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Jenis</h4>
        </div>
        <form action="tambah.php" method="POST">
          <div class="modal-body">
            <label>Lokasi</label>
            <br>
            <input name="lokasi" id="lokasi">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" name="tambahLokasi">Tambah Data</button>
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ################################################################### -->

  <div id="jenisModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Jenis</h4>
        </div>
        <form action="tambah.php" method="POST">
          <div class="modal-body">
            <label>Jenis</label>
            <br>
            <input name="jenis" id="jenis">
            <br>
            <label>Kategori</label>
            <br>
            <select name="kategori">
              <?php $conn = connect();
              $sql = "SELECT * FROM kategori";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?= $row["id_kategori"]; ?>"><?= $row["nama_kategori"]; ?></option>
              <?php }
              $conn->close(); ?>
            </select>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" name="tambahJenis">Tambah Data</button>
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ################################################################### -->

  <div class="row">

    <div class="col-sm-4">
      <h4 class="text-center">Tabel lokasi</h4>
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lokasiModal">Tambah Lokasi</button>
      <table class="table">
        <thead>
          <tr>
            <th>Lokasi</th>
          </tr>
        </thead>
        <tbody>
          <?php $conn = connect();
          $sql = "SELECT * FROM `lokasi`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?= $row['nama_lokasi'] ?></td>
              <td>
                <form action="hapus.php" method="POST">
                  <input type="hidden" value="<?= $row['id_lokasi'] ?>" name="id">
                  <button type="submit" class="btn btn-danger btn-sm" name="hapusLokasi">Hapus</button>
                </form>
              </td>
            </tr>
          <?php }
          $conn->close(); ?>
        </tbody>
      </table>
    </div>

    <div class="col-sm-4">
      <h4 class="text-center">Tabel Jenis</h4>
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#jenisModal">Tambah Jenis</button>
      <table class="table">
        <thead>
          <tr>
            <th>Jenis</th>
            <th>Kategori</th>
          </tr>
        </thead>
        <tbody>
          <?php $conn = connect();
          $sql = "SELECT `id_jenis`,`nama_jenis`,`nama_kategori` FROM `jenis_sampah` JOIN kategori WHERE jenis_sampah.id_kategori=kategori.id_kategori ORDER BY jenis_sampah.id_kategori ASC";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?= $row['nama_jenis'] ?></td>
              <td><?= $row['nama_kategori'] ?></td>
              <td>
                <form action="hapus.php" method="POST">
                  <input type="hidden" value="<?= $row['id_jenis'] ?>" name="id">
                  <button type="submit" class="btn btn-danger btn-sm" name="hapusJenis">Hapus</button>
                </form>
              </td>
            </tr>
          <?php }
          $conn->close(); ?>
        </tbody>
      </table>
    </div>

    <div class="col-sm-4">
      <h4 class="text-center">Tabel Pemasukan</h4>
      <br>
      <?php $conn = connect();
      $sql = "SELECT id_penghasil,nama_lokasi,nama_jenis,jumlah_sampah FROM `tempat_penghasil` JOIN jenis_sampah,lokasi WHERE tempat_penghasil.id_jenis=jenis_sampah.id_jenis && tempat_penghasil.id_lokasi=lokasi.id_lokasi && tempat_penghasil.bulan=MONTH(NOW()) ORDER BY tempat_penghasil.id_jenis ASC";
      $result = mysqli_query($conn, $sql);
      $cek = mysqli_num_rows($result);
      if ($cek > 0) { ?>
        <table class="table">
          <thead>
            <tr>
              <th>Lokasi</th>
              <th>Jenis</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?= $row['nama_lokasi']; ?></td>
                <td><?= $row['nama_jenis']; ?></td>
                <td><?= $row['jumlah_sampah']; ?> Kg</td>
              </tr>
            <?php }
            ?>
            </tr>
          </tbody>
        </table>
      <?php } else { ?>
        <br>
        <br>
        <div class="alert alert-danger" role="alert">
          Data Kosong.
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php include 'template/footer.php'; ?>