<?php if ($this->session->flashdata('deleteSuccess')) : ?>
    <div class="alert alert-success mr-5 alert-dismissible fade show col-lg-auto" role="alert">
        <?= $this->session->flashdata('deleteSuccess') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-lg-9 mx-auto">

        <div class="card">
            <div class="card-header">
                <h5>Tambah Data Kategori</h5>
            </div>
            <div class="card-body">

                <form class="form-insert mb-5 mt-3" action="" method="post">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input name="kode_kategori" type="text" class="form-control" id="kode" placeholder="Kode Barang" autocomplete="off" value="<?= $kode_kategori; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama_kategori" type="text" class="form-control" id="nama" placeholder="Nama kategori" autocomplete="off" value="<?= set_value('nama_kategori') ?>">
                        <?= form_error('nama_kategori', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status_kategori">
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> </i> Tambah Data</button>
                    <a class="btn btn-info btn-sm float-right mr-3" href="<?= base_url(); ?>Kategori/index"><i class="fa fa-angle-left"> </i> Kembali</a>

                </form>
            </div>
        </div>
    </div>
</div> 