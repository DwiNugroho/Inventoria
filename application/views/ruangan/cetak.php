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
    Data Ruangan
</div>
<span class="tanggal">Tanggal Cetak <?= date('D, d-m-Y') ?></span>
<br>
<br>
<br>

<center>
    <table cellpadding="15" cellspacing="0" width="100%">
        <tr>
            <th>#</th>
            <th>Nama Ruang</th>
            <th>Kode Ruang</th>
            <th>Status</th>
        </tr>
        <?php $nomor = 1;
        foreach ($ruangan as $ruangan) : ?>
            <tr>
                <td scope="row"><?= $nomor ?></td>
                <td><?= $ruangan['nama_ruang'] ?></td>
                <td><strong><?= $ruangan['kode_ruang'] ?></strong></td>
                <td>
                    <?php if ($ruangan['status'] == '1') : ?>
                        Tersedia
                    <?php elseif ($ruangan['status'] == '0') : ?>
                        Tidak Tersedia
                    <?php endif ?>
                </td>
            </tr>
        <?php $nomor++; endforeach ?>
    </table>
</center> 