<?php if ($this->session->flashdata('ubahSuccess')) : ?>
    <div class="alert alert-success mr-5 alert-dismissible fade show col-lg-auto" role="alert">
        <?= $this->session->flashdata('ubahSuccess') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif ?>
<?php if ($this->session->flashdata('deleteSuccess')) : ?>
    <div class="alert alert-success mr-5 alert-dismissible fade show col-lg-auto" role="alert">
        <?= $this->session->flashdata('deleteSuccess') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif ?>
<?php if ($this->session->flashdata('addSuccess')) : ?>
<div class="alert alert-success alert-dismissible fade show col-lg-auto" role="alert">
    <?= $this->session->flashdata('addSuccess') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif ?>
<?php if ($this->session->flashdata('addgagal')) : ?>
<div class="alert alert-danger alert-dismissible fade show col-lg-auto" role="alert">
    <?= $this->session->flashdata('addgagal') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif ?>

<div class="row">
    <div class="col-md-11 mx-auto">
        <div class="card">
            <div class="card-header form-inline d-flex justify-content-between">
                <h5>Form Users</h5>
                <span class="form-group ml-2">

                    <a class="btn btn-yellow btn-sm mr-2" href="<?= base_url(); ?>Users/cetak" target="_blank"><i class="far fa-file-pdf"></i> Cetak PDF</a>
                    <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>Users/tambah"><i class="fa fa-plus"></i> Tambah data</a>
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php $nomor = 1;
                        foreach ($users as $u) : ?>
                            <tr>
                                <td><?= $nomor++ ?></td>
                                <td><?= $u['nama'] ?></td>
                                <td><?= $u['username'] ?></td>
                                <td>
                                    <?php if ($u['status'] == 2) : ?>
                                        <span class="badge badge-primary"><?= $u['nama_level'] ?></span>
                                    <?php endif ?>
                                    <?php if ($u['status'] == 1) : ?>
                                        <span class="badge badge-info"><?= $u['nama_level'] ?></span>
                                    <?php endif ?>
                                    <?php if ($u['status'] == 0) : ?>
                                        <span class="badge badge-warning"><?= $u['nama_level'] ?></span>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="<?= base_url() ?>Users/ubah/<?= $u['id_user'] ?>"> <i class="fa fa-pen"></i> Ubah</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>