<nav class="navbar navbar-expand-lg navbar-light mb-5 navbar-landing">
  <div class="container">
    <a class="navbar-brand" href="#home">Inventoria</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon btn-sm"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#fitur">Fitur</a>
        </li>
        <li class="nav-item">
          <?php if ($this->session->userdata('nama')) : ?>
            <a class="nav-link btn-navbar mt-1 ml-2" href="<?= base_url() ?>Home/dashboard">Dashboard</a>
          <?php else : ?>
            <a class="nav-link btn-navbar mt-1 ml-2" href="<?= base_url() ?>Login/index">Masuk</a>
          <?php endif ?>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="background-1">
  <div class="jumbotron jumbotron-fluid bg-transparent" id="home">
    <div class="container">
      <h1 class="display-4 d-flex justify-content-center animated fadeInDown"><strong class="mr-3">Inventoria</strong> Easy Your Life</h1>
      <p class="lead mb-4 text-center d-flex justify-content-center animated fadeInUp">Sebuah media pendataan Sarana Prasarana SMK Negeri Jatirogo</p>
      <div class="form-inline d-flex justify-content-center animated bounceIn">
        <a href="#about" class="btn btn-outline-green mr-3">Pelajari</a>
        <?php if (!$this->session->userdata('nama')): ?>
          <a href="<?= base_url() ?>Login/index" class="btn btn-home-green bg-green">Masuk</a>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>

<div class="background-2" id="about">
  <br>
  <div class="container">
    <div class="row">
      <div class="col mx-auto">
        <center>
          <img src="<?= base_url() ?>img/undraw/undraw_Memory_storage_reh0.svg" width="400px" alt="">
        </center>
      </div>
      <div class="col mx-auto mt-5">
        <h1 class="inventoria">Inventoria</h1>
        <p class="about text-justify">
          Merupakan sebuah Aplikasi Inventaris berbasis Website yang berfungsi sebagai media pendataan Sarana Prasarana di SMKN Jatirogo.
          Inventoria bertujuan untuk memudahkan pendataan Masuk, Keluar, dan Peminjaman sarana Prasarana Sekolah.
        </p>
      </div>
    </div>
  </div>
</div>

<div class="background-3" id="fitur">
  <h2 class="text-center text-light mb-5">Main Feature</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <center>
              <img src="<?= base_url() ?>/img/undraw/undraw_upload_87y9.svg" width="190px" class="mx-auto" alt="">
            </center>
          </div>
          <div class="card-body">
            <h5>Barang Masuk</h5>
            <p class="text-break">
              fitur ini memudahkan kita melakukan Pendataan Terhadap Sarana dan Prasarana yang masuk.
            </p>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <center>
              <img src="<?= base_url() ?>/img/undraw/undraw_interview_rmcf.svg" width="200px" class="mx-auto" alt="">
            </center>
          </div>
          <div class="card-body">
            <h5>Peminjaman</h5>
            <p class="text-break">
              fitur ini memudahkan kita melakukan Pendataan Terhadap Peminjaman Sarana dan Prasarana di Sekolah.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <center>
              <img src="<?= base_url() ?>/img/undraw/undraw_collecting_fjjl.svg" width="130px" class="mx-auto" alt="">
            </center>
          </div>
          <div class="card-body">
            <h5>Barang Keluar</h5>
            <p class="text-break">
              fitur ini memudahkan kita melakukan Pendataan Terhadap Sarana dan Prasarana yang Keluar.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="background-4">
  <div class="container">
    <div class="row">
      <div class="col">
        <center>
          <img src="<?= base_url() ?>/img/undraw/undraw_login_jdch.svg" width="300px" class="mx-auto" alt="">
        </center>
      </div>
      <div class="col mt-5">
        <h1 class="display-4 text-center"><strong>Inventoria</strong></h1>
        <p class="text-center">Silahkan Masuk dan Temukan Manfaatnya!</p>
        <div class="form-inline mt-5 d-flex justify-content-center animated bounceIn">
          <?php if ($this->session->userdata('nama')) : ?>
            <a class="nav-link btn-navbar mt-1 ml-2" href="<?= base_url() ?>Home/dashboard">Dashboard</a>
          <?php else : ?>
            <a class="nav-link btn-navbar mt-1 ml-2" href="<?= base_url() ?>Login/index">Masuk</a>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>