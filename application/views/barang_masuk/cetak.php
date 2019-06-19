<style>
    body {
        font-family: arial;
        background-color: white;
    }

    td {
        border-top: 1px solid #dddddd;
    }

    tr:nth-child(even) {}

    th {
        background-color: #2E2E2E;
        color: white;
        text-align: left;
    }

    .title {
        font-size: 25px;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .tanggal {
        font-size: 15px;
        font-weight: 600;
        color: grey;
    }
</style>

<div class="title">
    Data Barang Masuk
</div>
<span class="tanggal">Tanggal Cetak <?= date('D, d-m-Y') ?></span>
<br>
<br>
<br>

<center>
    <table cellpadding="15" cellspacing="0" width="100%">
        <tr>
            <th>#</th>
            <th>Nomor Invoice</th>
            <th>Waktu Masuk</th>
            <th>Supplier</th>
            <th>Jumlah Masuk</th>
        </tr>
        <?php $nomor = 1;
        foreach ($barang_masuk as $x) : ?>
        <tr>
            <td scope="row"><?= $nomor ?></td>
            <td><?= $x['no_invoice'] ?></td>
            <td><?= $x['date'] ?></td>
            <td><?= $x['nama_supplier'] ?></td>
            <td><?= $x['jumlah_masuk'] ?> Barang</td>
        </tr>
        <?php $nomor++;
    endforeach ?>
    </table>
</center> 