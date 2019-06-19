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
    Data Users
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
            <th>username</th>
            <th>level</th>
        </tr>
        <?php $nomor = 1;
        foreach ($users as $users) : ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $users['nama'] ?></td>
            <td><?= $users['username'] ?></td>
            <td><?= $users['nama_level'] ?></td>
        </tr>
        <?php endforeach ?>
    </table>
</center> 