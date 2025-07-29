<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hasil Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">BeasiswaKU</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="Index.php">Beasiswa</a></li>
        <li class="nav-item"><a class="nav-link" href="Daftar.php">Daftar</a></li>
        <li class="nav-item"><a class="nav-link active" href="Hasil.php">Hasil</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Tabel Data Pendaftar -->
<div class="container">
  <div class="card shadow mb-5">
    <div class="card-body">
      <h3 class="card-title text-center mb-4">Data Pendaftaran Beasiswa</h3>

      <?php
      include 'konek.php';

      $result = mysqli_query($conn, "SELECT * FROM pendaftar");
      $data = [];

      // Menyimpan semua hasil query ke dalam array
      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
      }

      // Hitung jumlah pendaftar berdasarkan jenis beasiswa
      $akademik = 0;
      $nonAkademik = 0;
      foreach ($data as $row) {
        if (strtolower($row['beasiswa']) === 'akademik') {
          $akademik++;
        } else {
          $nonAkademik++;
        }
      }

      // Mengurutkan array berdasarkan nama
      usort($data, function($a, $b) {
        return strcmp($a['nama'], $b['nama']);
      });

      echo "<p><strong>Jumlah Pendaftar:</strong> " . count($data) . "</p>";
      ?>

      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead class="table-primary">
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>HP</th>
              <th>Semester</th>
              <th>IPK</th>
              <th>Beasiswa</th>
              <th>Berkas</th>
              <th>Status Ajuan</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $row): ?>
              <tr>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['hp']) ?></td>
                <td><?= htmlspecialchars($row['semester']) ?></td>
                <td><?= htmlspecialchars($row['ipk']) ?></td>
                <td><?= htmlspecialchars($row['beasiswa']) ?></td>
                <td>
                  <a href="uploads/<?= htmlspecialchars($row['nama_berkas']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">Lihat</a>
                </td>
                <td><span class="badge bg-success"><?= htmlspecialchars($row['status_ajuan']) ?></span></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <!-- Grafik Pie -->
    <h4 class="mt-5 text-center">Grafik Pendaftar Berdasarkan Jenis Beasiswa</h4>
    <div class="d-flex justify-content-center mt-4">
      <canvas id="grafikBeasiswa" style="max-width: 300px; max-height: 300px;"></canvas>
    </div>
    <script>
      const ctx = document.getElementById('grafikBeasiswa').getContext('2d');
      const chart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Akademik', 'Non-Akademik'],
          datasets: [{
            label: 'Jumlah Pendaftar',
            data: [<?= $akademik ?>, <?= $nonAkademik ?>],
            backgroundColor: [
              'rgba(54, 162, 235, 0.7)',
              'rgba(255, 99, 132, 0.7)'
            ],
            borderColor: [
              'rgba(54, 162, 235, 1)',
              'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top'
            },
            title: {
              display: true,
              text: 'Distribusi Beasiswa yang Dipilih'
            }
          }
        }
      });
    </script>


    </div>
  </div>
</div>

</body>
</html>
