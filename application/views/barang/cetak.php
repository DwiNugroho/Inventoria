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
    Data Barang
</div>
<span class="tanggal"><?= date('D, d-m-Y') ?></span>
<br>
<br>
<br>

<center>
    <table cellpadding="15" cellspacing="0" width="100%">
        <tr>
            <th>#</th>
            <th>nama</th>
            <th>Kode</th>
            <th>Kondisi</th>
            <th>Jumlah</th>
            <th>Ruangan</th>
        </tr>
        <?php $nomor = 1;
    foreach ($barang as $barang) : ?>
        <tr>
            <td scope="row"><?= $nomor ?></th>
            <td><?= $barang['nama'] ?></td>
            <td><strong><?= $barang['kode'] ?></strong></td>
            <td><?= $barang['kondisi'] ?></td>
            <td><?= $barang['jumlah'] ?></td>
            <td><?= $barang['nama_ruang'] ?></td>
        </tr>
        <?php $nomor++;
    endforeach ?>
    </table>
</center> 