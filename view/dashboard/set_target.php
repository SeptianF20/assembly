<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Target</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <!-- jQuery -->

    <script src="../../assets/bootstrap-4.5.3-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../../assets/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .card {
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>

<body>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Set Target</h5>
            <form id="targetForm">
                <div class="form-group">
                    <label for="targetShiftInput">Target Per Shift</label>
                    <input type="number" class="form-control" id="targetShiftInput" name="target" required>
                </div>
                <div class="form-group">
                    <label for="shiftInput">Shift</label>
                    <select id="shiftInput" name="shift" class="form-control">
                        <option value="1">Shift 1</option>
                        <option value="2">Shift 2</option>
                    </select>
                </div>
                <input type="hidden" id="noregInput" name="noreg" value="noreg"> <!-- Ganti dengan nilai sebenarnya -->
                <input type="hidden" id="supervisorInput" name="supervisor" value="supervisor">
                <!-- Ganti dengan nilai sebenarnya -->
                <input type="hidden" id="partNoInput" name="part_no" value="part_no">
                <!-- Ganti dengan nilai sebenarnya -->
                <input type="hidden" id="mesinInput" name="mesin" value="mesin"> <!-- Ganti dengan nilai sebenarnya -->

                <button type="button" class="btn btn-primary" onclick="saveTarget()">Set Target</button>
            </form>

        </div>
    </div>

    <script>
        function saveTarget() {
    const target = document.getElementById('targetShiftInput').value;
    const shift = document.getElementById('shiftInput').value;
    const noreg = document.getElementById('noregInput').value; 
    const supervisor = document.getElementById('supervisorInput').value; 
    const part_no = document.getElementById('partNoInput').value; 
    const mesin = document.getElementById('mesinInput').value; 

    console.log('Shift:', shift); // Debugging: Pastikan nilai shift sudah benar

    $.ajax({
        type: 'POST',
        url: 'save_target.php',
        data: {
            target: target,
            noreg: noreg,
            shift: shift,
            supervisor: supervisor,
            part_no: part_no,
            mesin: mesin
        },
        success: function (response) {
            console.log('Server Response:', response); // Debugging
            alert('Data target berhasil disimpan: ' + response);
            if (shift === '1') {
                window.location.href = 'shift1.php';
            } else if (shift === '2') {
                window.location.href = 'shift2.php';
            } else {
                alert('Shift tidak dikenali.');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error occurred: ' + error);
            alert('Gagal menyimpan data target.');
        }
    });
}

    </script>

</body>

</html>