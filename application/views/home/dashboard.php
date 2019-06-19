<div class="row mb-4">
    <div class="col total form-inline">
        <span class="mr-1 logo mr-4">
            <i class="fa fa-user"></i>
        </span>
        <span class="ml-2">
            <div class="jumlah">
                <?= $total['users']; ?>
            </div>
            <div>
                Users
            </div>
        </span>
    </div>
    <div class="col total form-inline">
        <span class="mr-1 logo mr-4">
            <i class="fa fa-truck"></i>
        </span>
        <span class="ml-2">
            <div class="jumlah">
                <?= $total['suppliers']; ?>
            </div>
            <div>
                Supplier
            </div>
        </span>
    </div>
    <div class="col total form-inline">
        <span class="mr-1 logo mr-4">
            <i class="fa fa-building"></i>
        </span>
        <span class="ml-2">
            <div class="jumlah">
                <?= $total['ruangan']; ?>
            </div>
            <div>
                Ruangan
            </div>
        </span>
    </div>

</div>

<div class="jumbotron" style="background-color: white;">
    <div class="container">
        <h1 class="display-4">Selamat Datang <strong><?= $this->session->userdata['nama'] ?></strong></h1>
        <p class="lead"><strong>Inventoria</strong> merupakan media pendataan Sarana Prasarana SMK Negeri Jatirogo</p>
    </div>
</div>