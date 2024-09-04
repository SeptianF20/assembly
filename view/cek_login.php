<?php
session_start();

include '../config/Database.php';

// Ambil input noreg dan shift dari form login
$noreg = $_POST['noreg'];
$shift = $_POST['shift'];

// Menggunakan prepared statement untuk keamanan
$stmt = $connection->prepare("SELECT * FROM pegawai WHERE noreg = ?");
$stmt->bind_param("s", $noreg);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah ada pengguna dengan noreg yang cocok
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    // Periksa lokasi kerja pengguna
    if ($data['work_location'] == 'Nganjuk') {
        // Simpan informasi sesi untuk pengguna yang berhasil login
        $_SESSION['noreg'] = $noreg;
        $_SESSION['work_location'] = 'Nganjuk';
        $_SESSION['shift'] = $shift; // Simpan shift yang dipilih
        $_SESSION['status'] = 'login';
        
        // Arahkan pengguna ke halaman berdasarkan shift
        if ($shift == 'shift1') {
            header('location:dashboard/shift1.php');
        } else {
            header('location:dashboard/shift2.php');
        }
        exit();
    } else {
        // Pengguna tidak memiliki akses ke lokasi yang diminta
        header('location:../index.php?pesan=akses_dilarang');
        exit();
    }
} else {
    // noreg tidak ditemukan
    header('location:../index.php?pesan=gagal');
    exit();
}
?>
