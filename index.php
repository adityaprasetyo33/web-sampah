<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daur Ulang Sampahmu</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <?php include 'admin/connection.php'; ?>
  <style>
    .redtext {
      color: red;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container" id="navbar">
      <div class="navbar-header">
        <a href="#" class="navbar-brand navbar-link"><img src="assets/img/recycle.png"></a>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav navbar-right">
          <li role="presentation"><a href="login.html">LOGIN</a></li>
          <li role="presentation"><a href="#home">TABEL SAMPAH</a></li>
          <li role="presentation"><a href="#persyaratan">JENIS SAMPAH</a></li>
          <li role="presentation"><a href="#news">IDE DAUR ULANG</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar -->

  <!-- jumbotron -->
  <div id="background">
    <div class="jumbotron">
      <ul class="nav navbar-nav"></ul>
      <h1>Jenis Sampah</h1>
      <p>Sampah merupakan material sisa yang tidak diinginkan setelah berakhirnya suatu proses.
        Sampah didefinisikan oleh manusia menurut derajat keterpakaiannya, dalam proses-proses alam sebenarnya tidak ada
        konsep sampah, yang ada hanya produk-produk yang dihasilkan setelah dan selama proses alam tersebut berlangsung.
        Akan tetapi karena dalam kehidupan manusia didefinisikan konsep lingkungan maka sampah dapat dibagi menurut
        jenis-jenisnya.</p>
      <!-- <p><a href="#" class="btn btn-default" role="button">EXPLORE</a></p> -->
    </div>
  </div>
  <!-- jumbotron -->

  <!-- container atas -->
  <div id="home">
    <div class="isi">
      <div class="container atas">
        <h1>Tabel Pemasukan Bulan ini</h1>
        <div class="row">
          <div class="col-sm-12">
            <?php $conn = connect();
            $sql = "SELECT id_penghasil,nama_lokasi,nama_kategori,jumlah_sampah FROM `tempat_penghasil` JOIN jenis_sampah,lokasi,kategori WHERE tempat_penghasil.id_jenis=jenis_sampah.id_jenis && kategori.id_kategori=jenis_sampah.id_kategori && tempat_penghasil.id_lokasi=lokasi.id_lokasi && tempat_penghasil.bulan=MONTH(NOW()) ORDER BY tempat_penghasil.id_jenis ASC";
            $result = mysqli_query($conn, $sql);
            $cek = mysqli_num_rows($result);
            if ($cek > 0) { ?>
              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">Lokasi</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td><?= $row['nama_lokasi']; ?></td>
                      <td><?= $row['nama_kategori']; ?></td>
                      <td><?= $row['jumlah_sampah']; ?> Kg</td>
                    </tr>
                  <?php }
                  ?>
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
    </div>
    <!-- container atas -->

    <!-- container bawah -->
    <div id="persyaratan">
      <div class="container bawah">
        <h1>Jenis - Jenis Sampah</h1>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img class="img-circle" src="assets/img/sampahdaun.jpg" width="200px">
            <h3>Sampah organik - dapat diurai (degradable)</h3>
            <p class="text-center"><strong></strong>Sampah Organik, yaitu sampah yang mudah membusuk seperti sisa
              makanan, sayuran, daun-daun kering, dan sebagainya. Sampah ini dapat diolah lebih lanjut menjadi kompos.
              Contohnya: Daun, kayu, kulit telur, bangkai hewan, bangkai tumbuhan, kotoran hewan dan manusia, Sisa
              makanan, Sisa manusia. kardus, kertas dan lain-lain.</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img class="img-circle" src="assets/img/sampahbotol.jpg" width="200px">
            <h3>Sampah anorganik - tidak terurai (undegradable)</h3>
            <p class="text-center"><strong></strong>Sampah Anorganik, yaitu sampah yang tidak mudah membusuk, seperti
              plastik wadah pembungkus makanan, kertas, plastik mainan, botol dan gelas minuman, kaleng, kayu, dan
              sebagainya. Sampah ini dapat dijadikan sampah komersial atau sampah yang laku dijual untuk dijadikan
              produk laiannya. Beberapa sampah anorganik yang dapat dijual adalah plastik wadah pembungkus makanan,
              botol dan gelas bekas minuman, kaleng, kaca, dan kertas, baik kertas koran, HVS, maupun karton.</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img class="img-circle" src="assets/img/sampahberacun.jpg" width="200px">
            <h3>Beracun (B3)</h3>
            <p class="text-center"><strong></strong>Suatu limbah digolongkan sebagai limbah B3 bila mengandung bahan
              berbahaya atau beracun yang sifat dan konsentrasinya, baik langsung maupun tidak langsung, dapat merusak
              atau mencemarkan lingkungan hidup atau membahayakan kesehatan manusia.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- container bawah -->

    <!-- container news -->
    <div id="news">
      <div class="container">
        <h1>Ide Daur Ulang Sampah Plastik</h1>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="thumbnail"><img src="assets/img/anggrek.jpg">
              <div class="caption">
                <h3>Anggrek dari Kantong Kresek</h3>
                <p class="text-justify">Perpaduan warna terang kuning, pink dan hijau membuat angrek bulan ini sangat
                  otentik dan menggoda. Jangan salah, karya ini dibuat dari limbah kantong kresek yang selama ini banyak
                  mengotori lautan kita.</p>
                <!-- <button class="btn btn-default"tyoe="button">READ MORE</button> -->
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="thumbnail"><img src="assets/img/tempatpermen.jpg">
              <div class="caption">
                <h3>Tempat Permen dari Koran Bekas</h3>
                <p class="text-justify">Bila terlihat sepintas, tempat permen ini tampak seperti guci yang terbuat dari
                  tanah liat. Warnanya yang cokelat berkilauan, terlihat seperti benda antik. Jangan salah, ini hanyalah
                  benda yang dibuat dari koran-koran bekas. Karya ini diperkenalkan oleh Naning Hudiyono pada 3 Maret
                  2020.</p>
                <!-- <button class="btn btn-default"tyoe="button">READ MORE</button> -->
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="thumbnail"><img src="assets/img/tas.jpg">
              <div class="caption">
                <h3>Tas Rajut dari Plastik Bekas</h3>
                <p class="text-justify">Karya satu ini dibuat oleh Reny Puspitaningrum dari Yogyakarta. Beragam tas-tas
                  menarik berhasil dihasilkan oleh Reny. Sepintas terlihat, buah tangan Reny ini seperti benda super
                  mahal yang terbuat dari bahan tertentu. Faktanya, tas ini dibuat dari kantong kresek bekas. Corak dan
                  warnanya yang terang dan dinamis bakal membuat kamu tertarik memiliki tas daur ulang ini.</p>
                <!--  <button class="btn btn-default"tyoe="button">READ MORE</button> -->
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="thumbnail"><img src="assets/img/sajadah.jpg">
              <div class="caption">
                <h3>Sajadah Tikar dari Bungkus Kopi</h3>
                <p class="text-justify">Tikar atau sajadah hasil daur ulang seperti ini dibutuhkan saat perayaan hari
                  raya di lapangan terbuka. Selain ramah lingkungan, benda satu ini dapat menekan penggunaan koran dan
                  plastik yang selama ini jadi sampah buangan. Dishare oleh akun bernama Mbah Wage, karya kreatif ini
                  dianyam dari sisa-sisa bungkus kopi.</p>
                <!-- <button class="btn btn-default"tyoe="button">READ MORE</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- container news -->

    <!-- gallery -->
    <!--  <div id="gallery">
    <div class="container">
      <h1>Gallery</h1>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="satu"><img class="img-responsive" src="assets/img/gambar-3-A.jpg" width="3000px"></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="satu"><img class="img-responsive" src="assets/img/gambar-3-B.jpg" width="300px"></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="satu"><img class="img-responsive" src="assets/img/gambar-3-C.jpg" width="300px"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="dua"><img class="img-responsive" src="assets/img/gambar-3-D.jpg" width="600px"></div>
      </div>
    </div>
  </div> -->
    <!-- gallery -->

    <!-- about -->
    <!--  <div id="about">
    <div class="container footer">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <h1> <img src="assets/img/logoo.png" width="180px"></h1>
        <h2>About Us</h2>
        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus...</p>
      </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <h2>Newsletter Subscription</h2>
          <div class="input-group input-group-lg">
            <input type="text" class="form-control" value="Your Email">
            <div class="input-group-btn">
              <button class="btn btn-primary" type="submit">Subscribe </button>
            </div>
          </div>
          <div id="icon"><i class="fa fa-instagram"></i><i class="fa fa-facebook-official"></i><i class="fa fa-twitter-square"></i><i class="fa fa-youtube-play"></i></div>
        </div>
    </div>
  </div> -->
    <!-- about -->

    <!-- kaki -->
    <div id="kaki">
      <div class="container">
        <h5 class="text-center">Kelompok Jenis Sampah</h5>
      </div>
    </div>
    <!-- kaki -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>