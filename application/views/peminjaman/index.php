<div class="row mb-5">

    <div class="col col-lg-11 mx-auto">
        <div class="card">
            <div class="card-header form-inline d-flex justify-content-between">
                <h5>Peminjaman</h5>
                <span class="form-group ml-2">
                    <?php if ($this->session->userdata('level') > 2) : ?>
                        <a class="btn btn-yellow btn-sm mr-2" href="<?= base_url(); ?>Peminjaman/cetak" target="_blank"><i class="far fa-file-pdf"></i> Cetak PDF</a>
                    <?php endif ?>
                    <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>Peminjaman/tambah"><i class="fa fa-plus"></i> Tambah data</a>
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data" id="data">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nomor Invoice</th>
                                <th scope="col">Peminjam</th>
                                <th scope="col">Pinjam </th>
                                <th scope="col">Kembali </th>
                                <th scope="col">Waktu Pinjam </th>
                                <th scope="col">Waktu Kembali </th>
                                <th scope="col">Status </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1;
                            foreach ($peminjaman as $x) : ?>
                                <tr>
                                    <th scope="row"><?= $nomor ?></th>
                                    <td><?= $x['no_invoice'] ?></td>
                                    <td><strong><?= $x['nama'] ?></strong></td>
                                    <td><?= $x['jumlah_pinjam'] ?></td>
                                    <td><?= $x['jumlah_kembali'] ?></td>
                                    <td><?= $x['waktu_pinjam'] ?></td>
                                    <td>
                                        <?php if ($x['waktu_kembali'] > 0) : ?>
                                            <?= $x['waktu_kembali'] ?>
                                        <?php endif ?>
                                        <?php if ($x['waktu_kembali'] < 1) : ?>
                                            -
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <?php if ($x['status'] == 1) : ?>
                                            <div class="badge badge-primary">Kembali</div>
                                        <?php endif ?>
                                        <?php if ($x['status'] == 0) : ?>
                                            <div class="badge badge-warning">Pinjam</div>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url() ?>Peminjaman/detail/<?= $x['id_peminjaman'] ?>" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                    <td>
                                        <?php if ($this->session->userdata('level') > 1) : ?>
                                            <?php if ($x['status'] < 1) : ?>
                                                <a href="<?= base_url() ?>Peminjaman/kembali_semua/<?= $x['id_peminjaman'] ?>" class="btn btn-primary btn-sm">Kembali</a>
                                            <?php endif ?>
                                        <?php endif ?>
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