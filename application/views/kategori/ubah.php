<div class="row">
    <div class="col-lg-9 mx-auto">

        <div class="card">
            <div class="card-header">
                <h5>Ubah Data Kategori</h5>
            </div>
            <div class="card-body">

                <form class="form-insert mb-5 mt-3" action="" method="post">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input name="kode_kategori" type="text" class="form-control" id="kode" placeholder="Kode kategori" autocomplete="off" value="<?= $kategori['kode_kategori'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama_kategori" type="text" class="form-control" id="nama" placeholder="Nama kategori" value="<?= $kategori['nama_kategori'] ?>" autocomplete="off">
                        <?= form_error('nama_kategori', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status_kategori">
                            <option <?php if ($kategori['status_kategori'] == 1) : echo "selected"; ?><?php endif ?> value="1">Tersedia</option>
                            <option <?php if ($kategori['status_kategori'] == 0) : echo "selected"; ?><?php endif ?> value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <a class="btn btn-danger btn-sm" href="<?= base_url(); ?>Kategori/hapus/<?= $kategori['id_kategori'] ?>" onclick="return confirm('Anda Yakin ingin menghapus kategori <?= $kategori['nama_kategori'] ?>')"><i class="fa fa-trash-alt"></i> hapus</a>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-pen"> </i> Simpan Data</button>
                    <a class="btn btn-info btn-sm float-right mr-3" href="<?= base_url(); ?>Kategori/index"><i class="fa fa-angle-left"> </i> Kembali</a>

                </form>
            </div>
        </div>
    </div>
</div>