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
                    <h5>Suppliers</h5>
                    <span class="form-group ml-2">
                        <?php if ($this->session->userdata('level') > 1) : ?>
                            <a class="btn btn-yellow btn-sm mr-2" href="<?= base_url(); ?>Suppliers/cetak" target="_blank"><i class="far fa-file-pdf"></i> Cetak PDF</a>
                            <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>Suppliers/tambah"><i class="fa fa-plus"></i> Tambah data</a>
                        <?php endif ?>
                    </span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table data" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Kota</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1;
                                foreach ($suppliers as $suppliers) : ?>
                                    <tr>
                                        <th scope="row"><?= $nomor ?></th>
                                        <td><?= $suppliers['nama_supplier'] ?></td>
                                        <td><?= $suppliers['kota'] ?></td>

                                        <td>
                                            <?php if ($suppliers['status'] == '1') : ?>
                                                <a href="<?= base_url() ?>Suppliers/nonaktif/<?= $suppliers['id_supplier'] ?>" class="badge badge-info">Aktif</a>
                                            <?php elseif ($suppliers['status'] == '0') : ?>
                                                <a href="<?= base_url() ?>Suppliers/aktif/<?= $suppliers['id_supplier'] ?>" class="badge badge-danger">Tidak Aktif</a>
                                            <?php endif ?>
                                        </td>
                                        <?php if ($this->session->userdata('level') > 1) : ?>
                                            <td>
                                                <span>
                                                    <a class="btn btn-info btn-sm" href="<?= base_url(); ?>suppliers/ubah/<?= $suppliers['id_supplier'] ?>"><i class="fa fa-pen"></i> Ubah</a>
                                                </span>
                                            </td>
                                        <?php endif ?>

                                    </tr>
                                    <?php $nomor++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </di v>


            </div>
        </div>