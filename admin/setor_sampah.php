<?php include 'template/headder.php'; ?>
<div class="container">
  <h2>Tabel Setor</h2>
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1">Tambah Data</button>
  <div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data</h4>
        </div>
        <form action="tambah.php" method="POST">
          <div class="modal-body">
            <label>Tanggal</label>
            <br>
            <?php $conn = connect();
            $sql = "SELECT CURRENT_DATE()";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) { ?>
              <input name="tgl" value="<?= $row["CURRENT_DATE()"]; ?>" readonly="true">
            <?php }
            $conn->close(); ?>
            <br>
            <label>Lokasi</label>
            <br>
            <select name="lokasi">
              <?php $conn = connect();
              $sql = "SELECT * FROM `lokasi`";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?= $row['id_lokasi']; ?>"><?= $row['nama_lokasi']; ?></option>
              <?php }
              $conn->close(); ?>
            </select>
            <br>
            <label>jenis sampah</label>
            <br>
            <select name="jenis">
              <?php $conn = connect();
              $sql = "SELECT `id_jenis`,`nama_jenis` FROM `jenis_sampah` ORDER BY id_kategori ASC";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?= $row["id_jenis"]; ?>"><?= $row["nama_jenis"]; ?></option>
              <?php }
              $conn->close(); ?>
            </select>
            <br>
            <label>Berat Sampah (Kg)</label>
            <br>
            <input type="text" name="berat">
            <br>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" name="tambahSetor" value="add">Tambah Data</button>
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ######################################################################################################## -->

  <div id="editmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ubah Data</h4>
        </div>
        <form action="ubah.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="update_id" id="update_id">
            <label>Tanggal</label>
            <br>
            <input name="tgl" id="tgl" readonly="true">
            <br>
            <label>Lokasi</label>
            <br>
            <input name="lokasi" id="lokasi" readonly="true">
            <br>
            <label>jenis sampah</label>
            <br>
            <input name="jenis" id="jenis" readonly="true">
            <br>
            <label>Berat Sampah (Kg)</label>
            <br>
            <input type="text" name="berat" id="berat">
            <br>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" name="ubahSetor">Ubah Data</button>
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ########################################################################################################### -->

  <?php $conn = connect();
  $sql = "SELECT id_setor,tgl_setor,nama_jenis,berat_hasil,nama_lokasi FROM `setor_sampah` JOIN jenis_sampah,lokasi WHERE setor_sampah.id_jenis=jenis_sampah.id_jenis && setor_sampah.id_lokasi=lokasi.id_lokasi ORDER BY tgl_setor ASC";
  $result = mysqli_query($conn, $sql);
  $cek = mysqli_num_rows($result);
  if ($cek > 0) { ?>
    <table class="table">
      <thead>
        <tr>
          <th>Tanggal Setor</th>
          <th>Jenis</th>
          <th>Berat Hasil</th>
          <th>Lokasi</th>
          <th>Menu</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td style="display:none;"><?= $row['id_setor']; ?></td>
            <td><?= $row['tgl_setor']; ?></td>
            <td><?= $row['nama_jenis']; ?></td>
            <td><?= $row['berat_hasil']; ?></td>
            <td><?= $row['nama_lokasi']; ?></td>
            <td>
              <button type="button" class="btn btn-success btn-sm editbtn">Ubah</button>
            </td>
            <td>
              <form action="hapus.php" method="POST">
                <input type="hidden" value="<?= $row['id_setor']; ?>" name="id">
                <button type="submit" class="btn btn-danger btn-sm" name="hapusSetor">Hapus</button>
              </form>
            </td>
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
<script>
  $(document).ready(function() {
    $('.editbtn').on('click', function() {
      $('#editmodal').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#update_id').val(data[0]);
      $('#tgl').val(data[1]);
      $('#lokasi').val(data[4]);
      $('#jenis').val(data[2]);
      $('#berat').val(data[3]);
    });
  });
</script>
<?php include 'template/footer.php'; ?>