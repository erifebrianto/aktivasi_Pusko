<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
    <!-- Sertakan file CSS Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Tambah Pelanggan</h1>
        <?php echo validation_errors(); ?>

        <form action="<?= site_url('pelanggan/tambah') ?>" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama Pelanggan:</label>
                        <input type="text" name="nama_pelanggan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="user_pppoe">User PPPOE:</label>
                        <input type="text" name="user_pppoe" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password_pppoe">Password PPPOE:</label>
                        <input type="text" name="password_pppoe" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="paket_berlangganan">Paket Berlangganan:</label>
                        <select name="paket_berlangganan" class="form-control">
                            <option value="2 Mbps">2 Mbps</option>
                            <option value="5 Mbps">5 Mbps</option>
                            <option value="7 Mbps">7 Mbps</option>
                            <option value="10 Mbps">10 Mbps</option>
                            <option value="15 Mbps">15 Mbps</option>
                            <option value="20 Mbps">20 Mbps</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sn">SN:</label>
                        <input type="text" name="sn" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="no_port_olt">No Port OLT:</label>
                        <input type="text" name="no_port_olt" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="no_onu">No ONU:</label>
                        <input type="text" name="no_onu" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="lokasi_pemasangan">Lokasi Pemasangan:</label>
                        <select name="lokasi_pemasangan" class="form-control">
                            <option value="Karangnanas">Karangnanas</option>
                            <option value="Wiradadi">Wiradadi</option>
                            <option value="Karangrau">Karangrau</option>
                            <option value="Karangkedawung">Karangkedawung</option>
                            <option value="Kutasari">Kutasari</option>
                            <option value="Rempoah">Rempoah</option>
                            <option value="Kebumen">Kebumen</option>
                            <option value="Karangmangu">Karangmangu</option>
                            <option value="Kemutug Lor">Kemutug Lor</option>
                            <option value="Pamijen">Pamijen</option>
                            <option value="Sudagaran">Sudagaran</option>
                            <option value="Kalisube">Kalisube</option>
                            <option value="Pekunden">Pekunden</option>
                            <option value="Dawuhan">Dawuhan</option>
                            <option value="Kedunguter">Kedunguter</option>
                            <option value="Teluk">Teluk</option>
                            <option value="Karangklesem">Karangklesem</option>
                            <option value="Wlahar Wetan">Wlahar Wetan</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="jenis_modem">Jenis Modem:</label>
                        <select name="jenis_modem" class="form-control">
                            <option value="Huawei">Huawei</option>
                            <option value="Fiberhome">Fiberhome</option>
                            <option value="ZTE-F609">ZTE-F609</option>
                            <option value="ZTE-F660">ZTE-F660</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" value="Simpan" class="btn btn-primary">
        </form>
        <a href="<?= site_url('pelanggan') ?>" class="btn btn-secondary mt-3">Kembali ke Daftar Pelanggan</a>
    </div>

    <!-- Sertakan file JavaScript Bootstrap (JQuery dan Popper.js harus disertakan juga) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
