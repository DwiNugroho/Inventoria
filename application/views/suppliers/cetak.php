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
    Data Suppliers
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
            <th>Kota</th>
            <th>Status</th>
        </tr>
        <?php $nomor = 1;
        foreach ($suppliers as $suppliers) : ?>
            <tr>
                <td scope="row"><?= $nomor ?></td>
                <td><?= $suppliers['nama_supplier'] ?></td>
                <td><?= $suppliers['kota'] ?></td>

                <td>
                    <?php if ($suppliers['status'] == '1') : ?>
                        Aktif
                    <?php elseif ($suppliers['status'] == '0') : ?>
                        Tidak Aktif
                    <?php endif ?>
                </td>

            </tr>
            <?php $nomor++;
        endforeach ?>
    </table>
</center>