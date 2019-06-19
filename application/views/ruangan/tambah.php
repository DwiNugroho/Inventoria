<div class="row">
    <div class="col-lg-9 mx-auto">

        <div class="card">
            <div class="card-header">
                <h5>Tambah Data Ruangan</h5>
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

                <form class="form-insert mb-5 mt-3" action="" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama_ruang" type="text" class="form-control" id="nama" placeholder="Nama Ruangan" autocomplete="off" value="<?= set_value('nama_ruang') ?>" autofocus>
                        <?= form_error('nama_ruang', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Kode Ruang</label>
                        <input name="kode_ruang" type="text" class="form-control" id="nama" placeholder="Kode Ruangan" autocomplete="off" value="<?= set_value('kode_ruang') ?>" autofocus>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> </i> Tambah Data</button>
                    <a class="btn btn-info btn-sm float-right mr-3" href="<?= base_url(); ?>/Ruangan/index"><i class="fa fa-angle-left"> </i> Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div> 