<div class="row">

    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <?php if ($this->session->flashdata('gagal_input_tempo')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('gagal_input_tempo') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>
                Barang Pinjam
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Nama barang</label>
                        <br>
                        <select name="inventory_id" class="chosen-select">
                            <option value="" selected disabled>--pilih barang--</option>
                            <?php foreach ($barang as $b) : ?>
                                <option value="<?= $b['id'] ?>"><?= $b['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group jumlah_barang">
                        <label for="">Jumlah Barang</label>
                        <input type="text" class="form-control form-control-sm" disabled>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Pinjam</label>
                        <input type="number" name="jumlah_pinjam" class="form-control form-control-sm" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm float-right" name="submit" type="submit">tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Peminjaman</h5>
            </div>
            <div class="card-body">

                <?php if ($this->session->flashdata('addSuccess')) : ?>
                    <div class="alert alert-success alert-dismissible fade show col-lg-auto" role="alert">
                        <?= $this->session->flashdata('addSuccess') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tempo_peminjaman as $x) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $x['nama']; ?>( <strong><?= $x['kode'] ?></strong> )</td>
                                <td><?= $x['jml_pinjam']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>Peminjaman/hapus/<?= $x['id_tempo_peminjaman'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>

                </table>
                <br>
                <?php if ($total_tempo > 0) : ?>
                    <form action="<?= base_url() ?>Peminjaman/simpan" method="post">
                        <div class="form-group">
                            <label for="peminjam">Peminjam</label>
                            <select name="peminjam" class="chosen-select" required id="peminjam">
                                <?php if ($this->session->userdata('level') == '1') : ?>
                                    <option value="<?= $this->session->userdata('id_user') ?>" selected><?= $this->session->userdata('nama') ?></option>
                                <?php else : ?>
                                    <option value="" selected disabled>Pilih peminjam</option>
                                    <?php foreach ($peminjam as $p) : ?>
                                        <option value="<?= $p['id_user'] ?>"><?= $p['nama'] ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Tujuan" autocomplete="off">
                        </div>

                        <button type="submit" name="submit" class="float-right btn btn-primary btn-sm">Simpan Data</button>
                    </form>
                <?php endif ?>


            </div>
        </div>
    </div>

</div>