<?php
session_start();

include '../config/Database.php';

// Ambil input noreg, shift, mesin, dan part_no dari form login
$noreg = $_POST['noreg'];
$shift = $_POST['shift'];
$mesin = $_POST['mesin']; // Ambil input mesin
$supervisor = $_POST['supervisor']; // Ambil input supervisor
$part_no = $_POST['part_no']; // Ambil input part_no

// Menggunakan prepared statement untuk keamanan
$stmt = $connection->prepare("SELECT * FROM pegawai WHERE noreg = ?");
$stmt->bind_param("s", $noreg);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah ada pengguna dengan noreg yang cocok
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    // Simpan informasi sesi untuk pengguna yang berhasil login
    $_SESSION['noreg'] = $noreg;
    $_SESSION['shift'] = $shift;
    $_SESSION['mesin'] = $mesin;
    $_SESSION['supervisor'] = $supervisor;
    $_SESSION['part_no'] = $part_no;
    $_SESSION['nama'] = $data['nama']; // Simpan nama lengkap ke sesi
    $_SESSION['status'] = 'login';

    // Arahkan pengguna berdasarkan lokasi kerja
    if ($data['work_location'] == 'Nganjuk') {
        // Jika lokasi kerja di Nganjuk, arahkan ke halaman set_target.php
        header('location:dashboard/set_target.php');
    } else {
        // Jika lokasi kerja bukan Nganjuk, arahkan sesuai lokasi kerja
        header('location:dashboard//index.php?'); // Ubah sesuai kebutuhan
    }
    exit();
} else {
    // noreg tidak ditemukan
    header('location:../index.php?pesan=gagal');
    exit();
}
?>
