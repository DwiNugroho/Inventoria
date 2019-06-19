<div class="row">
    <div class="col-lg-9 mx-auto">

        <div class="card">
            <div class="card-header">
                <h5>Tambah Data Barang</h5>
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
                        <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Barang" autocomplete="off" value="<?= set_value('nama') ?>">
                        <?= form_error('nama', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input name="kode" type="text" class="form-control" id="kode" placeholder="Kode Barang" autocomplete="off" value="<?= $kode; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="spesifikasi">Spesifikasi</label>
                        <textarea class="form-control" name="spesifikasi" id="spesifikasi" rows="3"><?= set_value('spesifikasi') ?></textarea>
                        <?= form_error('spesifikasi', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <input name="kondisi" type="text" class="form-control" id="kondisi" placeholder="Kondisi Barang" value="<?= set_value('kondisi') ?>">
                        <?= form_error('kondisi', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="id_ruang">Ruang</label>
                        <select name="id_ruang" id="" class="chosen-select">
                            <option disabled value="" selected>--Silahkan pilih ruangan--</option>
                            <?php foreach ($ruang as $r) : ?>
                            <option value="<?= $r['id_ruang'] ?>"><?= $r['nama_ruang'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('id_ruang', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <label for="id_ruang">Kategori</label>
                        <select name="id_kategori" id="" class="chosen-select">
                            <option disabled value="" selected>--Silahkan pilih kategori--</option>
                            <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('id_kategori', '<small class="text-primary pl-3">', '</small>') ?>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> </i> Tambah Data</button>
                    <a class="btn btn-info btn-sm float-right mr-3" href="<?= base_url(); ?>Barang/index"><i class="fa fa-angle-left"> </i> Kembali</a>

                </form>
            </div>
        </div>
    </div>
</div> 