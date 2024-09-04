<?php
include '../../../config/Database.php';

$namaDept = $_POST['Nama_Dept'];

$query = mysqli_query($connection, "INSERT INTO department (Nama_Dept) VALUES ('$namaDept')");

if ($query) {
    session_start();
    $_SESSION['success_message'] = 'Department ' . $namaDept . ' berhasil ditambahkan.';
    header('location:../index-dept.php');
    exit();
} else {
    echo "Gagal menambahkan department.";
}
?>
