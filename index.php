<?php include 'view/templates/login/login-header.php'; ?>

<?php
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
?>

<body class="container-fluid">
    <div class="">
        <p><?= $errorMsg; ?></p>
        <div class="login-logo">
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
                                placeholder="TANGGAL" required>
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
                                <option value="Mesin 1">Mesin 1</option>
                                <option value="Mesin 2">Mesin 2</option>
                                <option value="Mesin 3">Mesin 3</option>
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
                            <select name="part_no" id="part_no" class="form-control form-control-lg" required>
                                <option value="">-- Pilih Part No --</option> <!-- Placeholder option -->
                                <option value="Part 1">Part 1</option>
                                <option value="Part 2">Part 2</option>
                                <option value="Part 3">Part 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-3 text-end">
                            <label for="part_no" class="form-label">Shift</label>
                        </div>
                        <div class="col-md-9">
                            <select name="part_no" id="part_no" class="form-control form-control-lg" required>
                                <option value="">-- Pilih Shift No --</option> <!-- Placeholder option -->
                                <option value="shift1">Shift 1</option>
                                <option value="shift2">Shift 2</option>
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
    <script>
        function resetForm() {
            // Mengambil elemen form dan meresetnya
            document.querySelector('form').reset();
        }
    </script>