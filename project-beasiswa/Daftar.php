<?php
include 'konek.php';
define('IPK_SISTEM', 3.4); 
$ipk = IPK_SISTEM;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Beasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets//css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">BeasiswaKU</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="Index.php">Beasiswa</a></li>
        <li class="nav-item"><a class="nav-link active" href="Daftar.php">Daftar</a></li>
        <li class="nav-item"><a class="nav-link" href="Hasil.php">Hasil</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Form Container -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow mb-5">
        <div class="card-body">
          <h4 class="card-title text-center mb-4">Formulir Pendaftaran Beasiswa</h4>

          <form action="Proses_pendafataran.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email Aktif</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Nomor HP</label>
              <input type="number" name="hp" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Semester Saat Ini</label>
              <select name="semester" class="form-select" required>
                <?php for ($i = 1; $i <= 8; $i++): ?>
                  <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">IPK (Otomatis dari Sistem)</label>
              <input type="text" name="ipk" class="form-control" value="<?= $ipk ?>" readonly>
            </div>

            <?php if ($ipk >= 3.0): ?>
              <div class="mb-3">
                <label class="form-label">Pilihan Beasiswa</label>
                <select name="beasiswa" class="form-select" required>
                  <?php if ($ipk >= 3.2): ?>
                    <option value="Akademik">Akademik</option>
                  <?php endif; ?>
                  <option value="Non-Akademik">Non-Akademik</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Upload Berkas Pendukung</label>
                <input type="file" name="berkas" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-success w-100" name="submit">Daftar Sekarang</button>
            <?php else: ?>
              <div class="alert alert-danger">
                Maaf, IPK Anda belum memenuhi syarat untuk mendaftar beasiswa.
              </div>
              <select class="form-select mb-2" disabled>
                <option>-- Pilihan Tidak Aktif --</option>
              </select>
              <input type="file" class="form-control mb-2" disabled>
              <button type="submit" class="btn btn-secondary w-100" disabled>Daftar</button>
            <?php endif; ?>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
