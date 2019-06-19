<div class="row">
    <div class="col-lg-9 mx-auto">

        <div class="card">
            <div class="card-header">
                <h5>Ubah Data Ruangan</h5>
            </div>
            <div class="card-body">

                <form class="form-insert mb-5 mt-3" action="" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama_ruang" type="text" class="form-control" id="nama" placeholder="Nama Ruangan" autocomplete="off" value="<?= $ruangan['nama_ruang'] ?>">
                        <?= form_error('nama_ruang', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="kode_ruang" type="text" class="form-control" id="nama" placeholder="Nama Ruangan" autocomplete="off" value="<?= $ruangan['kode_ruang'] ?>">
                        <?= form_error('kode_ruang', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-pen"> </i> Simpan Data</button>
                    <a class="btn btn-info btn-sm float-right mr-3" href="<?= base_url(); ?>/Ruangan/index"><i class="fa fa-angle-left"> </i> Kembali</a>
                    <a class="btn btn-danger btn-sm" href="<?= base_url(); ?>Ruangan/hapus/<?= $ruangan['id_ruang'] ?>" onclick="return confirm('Anda yakin ingin menghapus data <?= $ruangan['nama_ruang'] ?>')"> <i class="fa fa-trash-alt"></i> Hapus</a>
                </form>
            </div>
        </div>
    </div>
</div> 