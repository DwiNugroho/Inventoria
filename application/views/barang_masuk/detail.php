<div class="row">
    <div class="col-lg-10 mx-auto">

        <div class="card">
            <div class="card-header">
                <h5>Informasi Detail Barang Masuk</h5>
            </div>
            <br>
            <div class="card-body table-responsive">
                <div class="form-group mr-3 ml-3">
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Supplier</strong>
                        </div>
                        <div class="col-md-auto">
                            <?= $barang_masuk['nama_supplier'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Nomor</strong>
                        </div>
                        <div class="col-md-auto">
                            <?= $barang_masuk['no_invoice'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Waktu</strong>
                        </div>
                        <div class="col-md-auto">
                            <?= $barang_masuk['date'] ?>
                        </div>
                    </div>
                    <br>
                    <hr>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1;
                            foreach ($detail_masuk as $x) : ?>
                            <tr>
                                <th scope="row"><?= $nomor ?></th>
                                <td><?= $x['nama'] ?></td>
                                <td><?= $x['kode'] ?></td>
                                <td><?= $x['jml'] ?></td>


                            </tr>
                            <?php $nomor++;
                        endforeach ?>
                        </tbody>
                    </table>
                </div>




            </div>
        </div>
    </div>
</div> 