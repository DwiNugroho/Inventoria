<div class="row">
    <div class="col-lg-9 mx-auto">

        <div class="card">
            <div class="card-header">
                <h5>Tambah Data Petugas</h5>
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
                <?php if ($this->session->flashdata('addgagal')) : ?>
                <div class="alert alert-danger alert-dismissible fade show col-lg-auto" role="alert">
                    <?= $this->session->flashdata('addgagal') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif ?>

                <form class="form-insert mb-5 mt-3" action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input name="nama" type="text" class="form-control" id="nama" placeholder="Full Name" autocomplete="off" value="<?= set_value('nama'); ?>">
                            <?= form_error('nama', '<small class="text-primary pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" id="username" placeholder="Username" autocomplete="off" value="<?= set_value('username'); ?>">
                            <?= form_error('username', '<small class="text-primary pl-3">', '</small>') ?>
                            <span class="pl-3 text-muted"> * harus beirisi minimal 4 karakter</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
                        <?= form_error('password', '<small class="text-primary pl-3">', '</small>') ?>
                        <span class="pl-3 text-muted"> * harus beirisi minimal 4 karakter</span>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Level</label>
                            <select name="level" class="form-control" required>
                                <?php foreach ($level as $l) : ?>
                                <option value="<?= $l['id_level'] ?>"><?= $l['nama_level'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> </i> Tambah Data</button>
                    <a class="btn btn-info btn-sm float-right mr-3" href="<?= base_url(); ?>Users/index"><i class="fa fa-angle-left"> </i> Kembali</a>

                </form>
            </div>
        </div>
    </div>
</div> 