<?php
// Proses_pendaftaran.php
// Author: [Nama Anda]
// Date: [28/07/2025]
// Deskripsi: Menangani proses input form pendaftaran dan simpan ke database

include 'konek.php';

// Ambil data dari form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $hp       = $_POST['hp'];
    $semester = $_POST['semester'];
    $ipk      = $_POST['ipk'];
    $beasiswa = $_POST['beasiswa'];
    $status   = "Belum diverifikasi";

    // Proses Upload File
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Proses file upload
    $fileName = basename($_FILES['berkas']['name']);
    $tmpPath  = $_FILES['berkas']['tmp_name'];
    $target   = $uploadDir . $fileName;

    // Pindahkan file ke folder uploads
    if (move_uploaded_file($tmpPath, $target)) {
        // Query untuk menyimpan data ke database
        $query = "INSERT INTO pendaftar 
                    (nama, email, hp, semester, ipk, beasiswa, nama_berkas, status_ajuan)
                  VALUES 
                    ('$nama', '$email', '$hp', '$semester', '$ipk', '$beasiswa', '$fileName', '$status')";
        
        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            // Berhasil → redirect ke halaman hasil
            header("Location: hasil.php");
            exit;
        } else {
            // Gagal simpan ke DB
            echo "❌ Gagal menyimpan ke database: " . mysqli_error($conn);
        }
    } else {
        echo "❌ Gagal mengunggah berkas.";
    }
}
?>
