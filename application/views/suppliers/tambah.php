<div class="row">
    <div class="col-lg-9 mx-auto">

        <div class="card">
            <div class="card-header">
                <h5>Tambah Data Supplier</h5>
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
                        <input name="nama_supplier" type="text" class="form-control" id="nama" placeholder="Nama Supplier" autocomplete="off" value="<?= set_value('nama_supplier') ?>">
                        <?= form_error('nama_supplier', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="5"><?= set_value('alamat') ?></textarea>
                        <?= form_error('alamat', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input name="kota" type="text" class="form-control" id="kota" placeholder="Kota" value="<?= set_value('kota') ?>">
                        <?= form_error('kota', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="no_tlp">Telepon</label>
                        <input name="no_tlp" type="number" class="form-control" id="no_tlp" placeholder="Telepon" autocomplete="off" value="<?= set_value('no_tlp') ?>">
                        <?= form_error('no_tlp', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> </i> Tambah Data</button>
                    <a class="btn btn-info btn-sm float-right mr-3" href="<?= base_url(); ?>/Suppliers/index"><i class="fa fa-angle-left"> </i> Kembali</a>

                </form>
            </div>
        </div>
    </div>
</div> 