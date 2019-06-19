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



<div class="row mb-5">

    <div class="col col-lg-11 mx-auto">
        <div class="card">
            <div class="card-header form-inline d-flex justify-content-between">
                <h5>Barang Keluar</h5>
                <span class="form-group ml-2">
                    <a class="btn btn-yellow btn-sm mr-2" href="<?= base_url(); ?>Barang_keluar/cetak" target="_blank"><i class="far fa-file-pdf"></i> Cetak PDF</a>
                    <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>Barang_keluar/tambah"><i class="fa fa-plus"></i> Tambah data</a>
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nomor Invoice</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Penerima </th>
                                <th scope="col">Barang keluar </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1;
                                                                foreach ($barang_keluar as $x) : ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $nomor ?></th>
                                                                    <td><?= $x['no_invoice'] ?></td>
                                                                    <td><?= $x['date'] ?></td>
                                                                    <td><?= $x['penerima'] ?></td>
                                                                    <td><?= $x['jumlah_keluar'] ?> Barang</td>
                                                                    <td>
                                                                        <a href="<?= base_url() ?>Barang_keluar/detail/<?= $x['id_keluar'] ?>" class="btn btn-info btn-sm">Detail</a>
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

<br><br>