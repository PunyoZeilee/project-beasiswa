<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Jenis Beasiswa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">BeasiswaKU</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="Index.php">Beasiswa</a></li>
        <li class="nav-item"><a class="nav-link" href="Daftar.php">Daftar</a></li>
        <li class="nav-item"><a class="nav-link " href="Hasil.php">Hasil</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Konten -->
<div class="container beasiswa-section">
  <div class="text-center mb-4">
    <h2 class="fw-bold"> Jenis Beasiswa</h2>
  </div>

  <div class="row g-4">
    <div class="col-md-6">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <h5 class="card-title"> Beasiswa Akademik</h5>
          <p class="card-text">
            Beasiswa yang ditujukan bagi mahasiswa dengan prestasi akademik yang sangat baik. Cocok untuk Anda yang memiliki fokus kuat dalam bidang studi dan hasil IPK tinggi.
          </p>
          <ul>
            <li>IPK minimal 3.2</li>
            <li>Nilai stabil dan konsisten tiap semester</li>
            <li>Rekomendasi dari dosen pembimbing</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <h5 class="card-title"> Beasiswa Non-Akademik</h5>
          <p class="card-text">
            Beasiswa bagi mahasiswa aktif di organisasi atau kegiatan sosial, dengan syarat akademik yang cukup baik. Sangat cocok untuk Anda yang berprestasi di luar kelas.
          </p>
          <ul>
            <li>IPK minimal 3.0</li>
            <li>Aktif di organisasi kampus atau komunitas</li>
            <li>Melampirkan bukti atau sertifikat kegiatan</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
