<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih | Lamaran Berhasil Dikirim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center p-5">
                        <div class="mb-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                        </div>

                        <h2 class="text-success fw-bold">Lamaran Berhasil Dikirim!</h2>
                        <p class="text-muted">
                            Terima kasih telah mengirimkan lamaran Anda. Kami akan segera menghubungi Anda melalui email atau telepon.
                        </p>

                        <div class="alert alert-info mt-4">
                            <p class="mb-0">
                                <strong>No. Lamaran:</strong> <span class="fw-bold">{{ $no_apply }}</span><br>
                                <small class="text-muted">Simpan nomor ini untuk referensi selanjutnya. Dengan nomor ini anda bisa track lamaran anda sudah sampai mana.</small>
                            </p>
                        </div>

                        <a href="/" class="btn btn-primary mt-3">
                            <i class="fas fa-home"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>