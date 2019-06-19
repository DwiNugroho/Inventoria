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
    Data Peminjaman
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
            <th>Peminjam</th>
            <th>Jumlah Pinjam</th>
            <th>Jumlah Kembali</th>
            <th>Waktu Pinjam</th>
            <th>Waktu Kembali</th>
            <th>Status</th>
        </tr>
        <?php $nomor = 1;
        foreach ($peminjaman as $x) : ?>
        <tr>
            <td scope="row"><?= $nomor ?></td>
            <td><?= $x['no_invoice'] ?></td>
            <td><strong><?= $x['nama'] ?></strong></td>
            <td><?= $x['jumlah_pinjam'] ?></td>
            <td><?= $x['jumlah_kembali'] ?></td>
            <td><?= $x['waktu_pinjam'] ?></td>
            <td>
                <?php if ($x['waktu_kembali'] > 0) : ?>
                <?= $x['waktu_kembali'] ?>
                <?php endif ?>
                <?php if ($x['waktu_kembali'] < 1) : ?>
                -
                <?php endif ?>
            </td>
            <td>
                <?php if ($x['status'] == 1) : ?>
                <div class="badge badge-primary">Kembali</div>
                <?php endif ?>
                <?php if ($x['status'] == 0) : ?>
                <div class="badge badge-warning">Pinjam</div>
                <?php endif ?>
            </td>



        </tr>
        <?php $nomor++;
    endforeach ?>
    </table>
</center> 