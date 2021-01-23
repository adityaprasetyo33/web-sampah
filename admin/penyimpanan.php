<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.html">Sampah Masyarakat</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="index.html">Home</a></li>
        <li><a href="setor_sampah.html">Setor Sampah</a></li>
        <li class="active"><a href="penyimpanan.html">Penyimpanan Sampah</a></li>
        <li><a href="jenis.html">Jenis Sampah</a></li>
        <li><a href="pemasukan.html">Pemasukan Sampah</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <h2>Tabel Penyimpanan</h2>
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Open Modal</button>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah Data</h4>
          </div>
          <div class="modal-body">
            <label>jenis sampah</label>
            <br>
            <select>
              <option>Kertas</option>
              <option>Daun</option>
            </select>
            <br>
            <label>Jumlah Simpanan</label>
            <br>
            <input>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm">Tambah Data</button>
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Jenis</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Kertas</td>
          <td>10Kg</td>
          <td>
            <button type="button" class="btn btn-success btn-sm">Ubah</button>
            <button type="button" class="btn btn-danger btn-sm">Hapus</button>
          </td>
        </tr>
        <tr>
          <td>Daun</td>
          <td>5Kg</td>
          <td>
            <button type="button" class="btn btn-success btn-sm">Ubah</button>
            <button type="button" class="btn btn-danger btn-sm">Hapus</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>

</body>

</html>