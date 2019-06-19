

<div class="row">
    <div class="col-lg-9 mx-auto">

        <div class="card">
            <div class="card-header">
                <h5>Ubah Data Supplier</h5>
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                <div class="alert alert-primary alert-dismissible fade show col-lg-auto" role="alert">
                    <?= validation_errors(); ?>
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

                <form class="form-insert mb-5 mt-3" action="" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama_supplier" type="text" class="form-control" id="nama" placeholder="Nama Supplier" autocomplete="off" value="<?= $supplier['nama_supplier'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="5"><?= $supplier['alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input name="kota" type="text" class="form-control" id="kota" placeholder="Kota" value="<?= $supplier['kota'] ?>">
                    </div>
                    <div class="form-group mb-5">
                        <label for="no_tlp">Telepon</label>
                        <input name="no_tlp" type="number" class="form-control" id="no_tlp" placeholder="Telepon" value="<?= $supplier['no_tlp'] ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-pen"> </i> Simpan Data</button>
                    <a class="btn btn-info btn-sm float-right mr-3" href="<?= base_url(); ?>/Suppliers/index"><i class="fa fa-angle-left"> </i> Kembali</a>
                    <a class="btn btn-danger btn-sm" href="<?= base_url(); ?>suppliers/hapus/<?= $supplier['id_supplier'] ?>" onclick="return confirm('Anda yakin ingin menghapus data <?= $supplier['nama_supplier'] ?>')"> <i class="fa fa-trash-alt"></i> Hapus</a>
                </form>
            </div>
        </div>
    </div>
</div> 