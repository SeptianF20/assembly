<?php
session_start();
include '../../config/Database.php';

if (isset($_POST['target']) && isset($_POST['shift'])) {
    $target = $_POST['target'];
    $_SESSION['target'] = $target; // Set the target value in session
    $noreg = $_SESSION['noreg'];
    $shift = $_POST['shift']; // Ambil shift dari data POST
    $supervisor = $_SESSION['supervisor'];
    $part_no = $_SESSION['part_no'];
    $mesin = $_SESSION['mesin'];

    // Debugging: Cetak data yang diterima
    error_log("Target: $target, Shift: $shift, NoReg: $noreg, Supervisor: $supervisor, Part No: $part_no, Mesin: $mesin");

    $stmt = $connection->prepare("INSERT INTO scan_data (noreg, shift, supervisor, target, part_no, mesin) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $noreg, $shift, $supervisor, $target, $part_no, $mesin);

    if ($stmt->execute()) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
} else {
    echo "Data tidak lengkap.";
    error_log("Data tidak lengkap: " . print_r($_POST, true)); // Debugging tambahan
}
?>
