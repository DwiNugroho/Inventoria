<div class="row mb-4">

</div>

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



<div class="row">

    <div class="col-md-11 mx-auto">
        <div class="card">
            <div class="card-header form-inline d-flex justify-content-between">
                <h5>Ruangan</h5>
                <span class="form-group ml-2">
                    <a class="btn btn-yellow btn-sm mr-2" href="<?= base_url(); ?>Ruangan/cetak" target="_blank"><i class="far fa-file-pdf"></i> Cetak PDF</a>
                    <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>Ruangan/tambah"><i class="fa fa-plus"></i> Tambah data</a>
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kode Ruang</th>
                                <th scope="col">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1;
                            foreach ($ruangan as $ruangan) : ?>
                                <tr>
                                    <th scope="row"><?= $nomor ?></th>
                                    <td><?= $ruangan['nama_ruang'] ?></td>
                                    <td><strong><?= $ruangan['kode_ruang'] ?></strong></td>
                                    <td>
                                        <?php if ($ruangan['status'] == '1') : ?>
                                            <a href="<?= base_url() ?>Ruangan/nonaktif/<?= $ruangan['id_ruang'] ?>" class="badge badge-info">Tersedia</a>
                                        <?php elseif ($ruangan['status'] == '0') : ?>
                                            <a href="<?= base_url() ?>Ruangan/aktif/<?= $ruangan['id_ruang'] ?>" class="badge badge-danger">Tidak Tersedia</a>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <span>
                                            <a class="btn btn-info btn-sm" href="<?= base_url(); ?>Ruangan/ubah/<?= $ruangan['id_ruang'] ?>"><i class="fa fa-pen"></i> Ubah</a>
                                        </span>
                                    </td>
                                </tr>
                                <?php $nomor++;
                            endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>