<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pelanggan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Daftar Pelanggan</h1>
        <a class="btn btn-primary mt-3" href="<?= site_url('pelanggan/tambah') ?>">Tambah Pelanggan</a>
        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>User PPPOE</th>
                    <th>Paket Berlangganan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pelanggan as $p) { ?>
                    <tr>
                        <td><?= $p->id ?></td>
                        <td><?= $p->nama_pelanggan ?></td>
                        <td><?= $p->user_pppoe ?></td>
                        <td><?= $p->paket_berlangganan ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="<?= site_url('pelanggan/edit/' . $p->id) ?>">Edit</a>
                            <a class="btn btn-sm btn-danger" href="<?= site_url('pelanggan/hapus/' . $p->id) ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                            <a class="btn btn-sm btn-success" href="<?= site_url('pelanggan/view_cli_config/' . $p->id) ?>">CLI</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
