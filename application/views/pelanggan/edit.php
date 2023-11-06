<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Pelanggan</h1>
        <?php echo validation_errors(); ?>

        <form class="mt-3" action="<?= site_url('pelanggan/edit/' . $pelanggan->id) ?>" method="post">
            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan:</label>
                <input type="text" class="form-control" name="nama_pelanggan" value="<?= $pelanggan->nama_pelanggan ?>" required>
            </div>

            <div class="form-group">
                <label for="user_pppoe">User PPPOE:</label>
                <input type="text" class="form-control" name="user_pppoe" value="<?= $pelanggan->user_pppoe ?>" required>
            </div>

            <div class="form-group">
                <label for="password_pppoe">Password PPPOE:</label>
                <input type="text" class="form-control" name="password_pppoe" value="<?= $pelanggan->password_pppoe ?>" required>
            </div>

            <div class="form-group">
                <label for="paket_berlangganan">Paket Berlangganan:</label>
                <input type="text" class="form-control" name="paket_berlangganan" value="<?= $pelanggan->paket_berlangganan ?>" required>
            </div>

            <div class="form-group">
                <label for="sn">SN:</label>
                <input type="text" class="form-control" name="sn" value="<?= $pelanggan->sn ?>" required>
            </div>

            <div class="form-group">
                <label for="no_port_olt">No Port OLT:</label>
                <input type="text" class="form-control" name="no_port_olt" value="<?= $pelanggan->no_port_olt ?>" required>
            </div>

            <div class="form-group">
                <label for="no_onu">No ONU:</label>
                <input type="text" class="form-control" name="no_onu" value="<?= $pelanggan->no_onu ?>" required>
            </div>

            <div class="form-group">
                <label for="lokasi_pemasangan">Lokasi Pemasangan:</label>
                <input type="text" class="form-control" name="lokasi_pemasangan" value="<?= $pelanggan->lokasi_pemasangan ?>" required>
            </div>

            <div class="form-group">
                <label for="jenis_modem">Jenis Modem:</label>
                <input type="text" class="form-control" name="jenis_modem" value="<?= $pelanggan->jenis_modem ?>" required>
            </div>

            <!-- Lanjutkan dengan kolom data lainnya -->

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <a class="btn btn-secondary mt-3" href="<?= site_url('pelanggan') ?>">Kembali ke Daftar Pelanggan</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
