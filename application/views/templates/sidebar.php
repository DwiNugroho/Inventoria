<div class="wrapper">

    <!-- Sidebar -->

    <div class="sidebar" id="sidebar">
        <div class="sidebar-head mb-4">
            <a class="c-ungu" href=""><i class="fas fa-tasks mr-3"></i><span class="hide">INVENTORIA</span> </a>
        </div>

        <div class="list-menu">
            <div class="list-head">
                <span class="hide">Main</span>
                <span>
                    <hr></span>
            </div>
            <div class="list-link row">
                <a class="<?php if ($title == 'Home') {
                                echo 'bg-link';
                            } ?>" href="<?= base_url(); ?>Home/dashboard">
                    <i class="fa fa-desktop col-md-3"></i><span class="col hide">Dashboard</span>
                </a>
            </div>

            <?php if ($this->session->userdata('level') > 2) : ?>
                <div class="list-link row">
                    <a class="<?php if ($title == 'Users') {
                                    echo 'bg-link';
                                } ?>" href="<?= base_url(); ?>Users/index">
                        <i class="fa fa-user col-md-3"></i><span class="col hide">Users</span>
                    </a>
                </div>
                <div class="list-link row">
                    <a class="<?php if ($title == 'Suppliers') {
                                    echo 'bg-link';
                                } ?>" href="<?= base_url(); ?>Suppliers/index">
                        <i class="fa fa-truck col-md-3"></i><span class="col hide">Supplier</span>
                    </a>
                </div>

                <div class="list-link row">
                    <a class="<?php if ($title == 'Ruangan') {
                                    echo 'bg-link';
                                } ?>" href="<?= base_url(); ?>Ruangan/index">
                        <i class="fas fa-building col-md-3"></i><span class="col hide">Tempat/Ruang</span>
                    </a>
                </div>

                <div class="list-link row">
                    <a class="<?php if ($title == 'Kategori') {
                                    echo 'bg-link';
                                } ?>" href="<?= base_url(); ?>Kategori/index">
                        <i class="fas fa-tags col-md-3"></i><span class="col hide">Kategori</span>
                    </a>
                </div>


            <?php endif ?>

        </div>


        <div class="list-menu">
            <div class="list-head">
                <span class="hide">Manajemen Barang</span>
                <span>
                    <hr></span>
            </div>
            <div class="list-link row">
                <a class="<?php if ($title == 'Barang') {
                                echo 'bg-link';
                            } ?>" href="<?= base_url(); ?>Barang/index">
                    <i class="fa fa-box-open col-md-3"></i><span class="col hide">Barang</span>
                </a>
            </div>

            <?php if ($this->session->userdata('level') > 2) : ?>

                <div class="list-link row">
                    <a class="<?php if ($title == 'Barang Masuk') {
                                    echo 'bg-link';
                                } ?>" href="<?= base_url(); ?>Barang_masuk/index">
                        <i class="fa fa-download col-md-3"></i><span class="col hide">Barang Masuk</span>
                    </a>
                </div>
                <div class="list-link row">
                    <a class="<?php if ($title == 'Barang Keluar') {
                                    echo 'bg-link';
                                } ?>" href="<?= base_url(); ?>Barang_keluar/index">
                        <i class="fa fa-upload col-md-3"></i><span class="col hide">Barang Keluar</span>
                    </a>
                </div>

            <?php endif ?>


            <div class="list-link row">
                <a class="<?php if ($title == 'Peminjaman') {
                                echo 'bg-link';
                            } ?>" href="<?= base_url(); ?>Peminjaman/index">
                    <i class="fas fa-hands-helping col-md-3"></i><span class="col hide">Peminjaman</span>
                </a>
            </div>
        </div>

    </div>


    <!-- Content -->

    <div class="content">

        <!-- Header -->

        <nav class="navbar navbar-admin">
            <div class="btn-shape" id="btn-sidebar">
                <div class="shape shape1"></div>
                <div class="shape shape2"></div>
                <div class="shape shape3"></div>
            </div>
            <div class="ml-auto form-inline mr-3">
                <span style="color:white;" class="mr-3">Welcome</span>
                <span class="dropdown">
                    <?php if ($this->session->userdata('nama')) : ?>
                        <button class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo $this->session->userdata('nama'); ?>
                        </button>
                    <?php endif ?>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="card">
                            <div class="card-header">
                                Welcome
                            </div>
                            <div class="card-body">
                                <a class="dropdown-item" href="<?= base_url(); ?>Login/logout" onclick="return confirm('Anda Yakin ingin Keluar?')"><i class="fa fa-sign-out-alt mr-2"> </i> Logout</a>
                            </div>
                        </div>
                    </div>
                </span>
            </div>
        </nav>

        <!-- Content Start -->
        <div class="content-start">
            <div class="container mt-4">