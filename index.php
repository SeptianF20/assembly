<?php include 'view/templates/login/login-header.php'; ?>

<?php
include 'Config/Database.php';
session_start();

$errorMsg = '';
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == 'gagal') {
        $errorMsg = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        No Registrasi Tidak Sesuai!
     </div>';
    } elseif ($_GET['pesan'] == 'logout') {
        $errorMsg = '
        <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Anda berhasil Logout!
                </div>';
    } elseif ($_GET['pesan'] == 'notlogin') {
        $errorMsg = '
        <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                  Anda harus login dulu!
                </div>';
    }
}

// Ambil data part_no dari database
$query = "SELECT part_no FROM part";
$result = $connection->query($query);

// Cek jika ada data
$options = '';
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='{$row['part_no']}'>{$row['part_no']}</option>";
    }
} else {
    $options .= "<option value=''>Tidak Ada part</option>";
}
?>

<body class="container-fluid">
    <div class="">
        <p><?= $errorMsg; ?></p>
        <div class="login-logo">
            <img src="assets/img/logo.png" alt="Assembly App Logo" />
            <link rel="stylesheet" href="assets/css/select2.min.css">
            <p>Assembly App</p>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body">
                <form action="view/cek_login.php" method="post">
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-3 text-end">
                            <label for="date" class="form-label">TANGGAL</label>
                        </div>
                        <div class="col-md-9">
                            <input type="date" name="date" id="date" class="form-control form-control-lg"
                                placeholder="TANGGAL" required readonly>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-3 text-end">
                            <label for="text" class="form-label">NO REGISTER</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="noreg" id="noreg" class="form-control form-control-lg"
                                placeholder="NO REGISTER" required>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-3 text-end">
                            <label for="mesin" class="form-label">MESIN</label>
                        </div>
                        <div class="col-md-9">
                            <select name="mesin" id="mesin" class="form-control form-control-lg" required>
                                <option value="">-- Pilih Mesin --</option> <!-- Placeholder option -->
                                <option value="LAS01">LAS01</option>
                                <option value="LAS02">LAS02</option>
                                <option value="LAS03">LAS03</option>
                                <option value="LAS04">LAS04</option>
                                <option value="LAS05">LAS05</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-3 text-end">
                            <label for="supervisor" class="form-label">SUPERVISOR</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="supervisor" id="supervisor" class="form-control form-control-lg"
                                placeholder="SUPERVISOR" required>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-3 text-end">
                            <label for="part_no" class="form-label">PART NO</label>
                        </div>
                        <div class="col-md-9">
                            <select name="part_no" id="part_no" class="form-control form-control-lg select2" required>
                                <option value="">-- Pilih Part No --</option>
                                <?php echo $options; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary btn-block"
                                onclick="resetForm()">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <?php include 'view/templates/login/login-footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script>
        function resetForm() {
            // Mengambil elemen form dan meresetnya
            document.querySelector('form').reset();
        }

        document.addEventListener("DOMContentLoaded", function () {
            // Set the date input to today's date
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('date').value = today;
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#part_no').select2({
                placeholder: "-- Pilih Part No --",
                allowClear: true
            });
        });
    </script>