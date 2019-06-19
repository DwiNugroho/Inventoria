<div class="row">
    <div class="col-lg-9 mx-auto">

        <div class="card">
            <div class="card-header">
                <h5>Ubah Data Users</h5>
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
                <?php if ($this->session->flashdata('ubahSuccess')) : ?>
                <div class="alert alert-success alert-dismissible fade show col-lg-auto" role="alert">
                    <?= $this->session->flashdata('ubahSuccess') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif ?>

                <form class="form-insert mb-5 mt-3" action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input name="nama" type="text" class="form-control" id="nama" placeholder="Full Name" autocomplete="off" value="<?= $users['nama'] ?>">
                            <?= form_error('nama', '<small class="text-primary pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" id="username" placeholder="Username" autocomplete="off" value="<?= $users['username'] ?>">
                            <?= form_error('username', '<small class="text-primary pl-3">', '</small>') ?>
                        <span class="pl-3 text-muted"> * harus beirisi minimal 4 karakter</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Level</label>
                            <select name="level" class="form-control" required>
                                <?php foreach ($level as $l) : ?>
                                <option <?php if ($users['level'] == $l['id_level']) {
                                            echo "selected";
                                        } ?> value="<?= $l['id_level'] ?>"><?= $l['nama_level'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                    </div>
                    <a class="btn btn-danger btn-sm" href="<?= base_url() ?>Users/hapus/<?= $users['id_user'] ?>" onclick="return confirm('Anda yakin menghapus data <?= $users['nama'] ?>?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-pen"> </i> Simpan</button>
                    <a class="btn btn-info btn-sm mr-3 float-right" href="<?= base_url(); ?>/Users/index"><i class="fa fa-angle-left"> </i> Kembali</a>

                </form>
            </div>
        </div>
    </div>
</div> 