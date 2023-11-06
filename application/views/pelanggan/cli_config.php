<!DOCTYPE html>
<html>
<head>
    <title>Konfigurasi CLI</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Konfigurasi CLI</h1>
        <pre class="mt-3" id="cli-config">
            <?php echo $cli_config; ?>
        </pre>
        <button class="btn btn-primary mt-3" onclick="copyConfig()">Salin Konfigurasi</button>
        <a class="btn btn-secondary mt-3" href="<?= site_url('pelanggan') ?>">Kembali ke Daftar Pelanggan</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        function copyConfig() {
            var cliConfig = document.getElementById('cli-config');
            var textArea = document.createElement('textarea');
            textArea.value = cliConfig.innerText;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            alert('Konfigurasi telah disalin ke clipboard.');
        }
    </script>
</body>
</html>
