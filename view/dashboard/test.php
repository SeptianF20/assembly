<?php
                                session_start();
                                ?>
<?php include '../templates/login/login-header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counting and Monitoring Application</title>
    <link rel="stylesheet" href="../../assets/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            /* Light gray-blue background */
        }

        .container-fluid {
            padding: 20px;
        }

        .card {
            border: 1px solid #e0e0e0;
            /* Light gray border */
            border-radius: 0.25rem;
            margin-bottom: 20px;
            background-color: #ffffff;
            /* White background */
        }

        .card-header {
            background-color: #007bff;
            /* Primary blue color */
            color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
            padding: 0.75rem 1.25rem;
            border-radius: 0.25rem 0.25rem 0 0;
        }

        .card-body {
            padding: 1.25rem;
        }

        .alert {
            margin-bottom: 0.5rem;
        }

        .form-control {
            margin-bottom: 1rem;
        }

        .table thead th {
            background-color: #007bff;
            /* Primary blue color */
            color: #ffffff;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f8f9fa;
            /* Light gray background for alternate rows */
        }

        .table tbody tr:hover {
            background-color: #e2e6ea;
            /* Slightly darker gray for hover */
        }

        .fs-6 {
            font-size: 1rem;
        }

        .btn {
            margin-top: 0.5rem;
        }

        .completed {
            color: #28a745;
            /* Success green color */
            font-weight: bold;
        }

        .log-entry {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
        }

        .log-entry span {
            flex: 1;
        }

        .log-entry.completed span {
            color: #28a745;
            /* Success green color */
        }

        .card-body {
            padding: 1.25rem;
        }

        .form-check-label {
            font-size: 1.25rem;
            /* Membesarkan ukuran font label */
        }

        .form-label {
            font-weight: bold;
        }

        #output {
            max-height: 200px;
            /* Set a fixed height for the output container */
            overflow-y: auto;
            /* Enable vertical scrolling */
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Content Header -->
    <!-- <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark text-center">DASHBOARD ASSY</h1>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Form -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">


                        <div class="col-sm-3 mb-2">
                            <?php
                            // Tampilkan nomor registrasi
                            echo "<h3>" . $_SESSION['nama'] . "</h3>";
                            ?>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <?php
                                // Tampilkan shift
                                echo "<h3>Shift: " . $_SESSION['shift'] . "</h3>";
                                ?>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <?php
                                // Tampilkan mesin
                                echo "<h3>Mesin: " . $_SESSION['mesin'] . "</h3>";
                                ?>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <?php
                                // Tampilkan part number
                                echo "<h3>Part: " . $_SESSION['part_no'] . "</h3>";
                                ?>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                <!-- Table Section -->
                <div class="col-lg-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Jam</th>
                                        <th>Target</th>
                                        <th>Aktual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Tabel Jam 07:30 - 08:30 -->
                                    <tr>
                                        <td>19:30 - 20:30</td>
                                        <td>0</td> <!-- Target per jam -->
                                        <td>0</td> <!-- Aktual output per jam -->
                                    </tr>
                                    <!-- Tabel Jam 08:30 - 09:30 -->
                                    <tr>
                                        <td>20:30 - 21:30</td>
                                        <td>0</td> <!-- Target per jam -->
                                        <td>0</td> <!-- Aktual output per jam -->
                                    </tr>
                                    <!-- Tabel Jam 09:30 - 10:30 -->
                                    <tr>
                                        <td>21:30 - 22:30</td>
                                        <td>0</td> <!-- Target per jam -->
                                        <td>0</td> <!-- Aktual output per jam -->
                                    </tr>
                                    <!-- Tabel Jam 10:30 - 11:30 -->
                                    <tr>
                                        <td>22:30 - 23:30</td>
                                        <td>0</td> <!-- Target per jam -->
                                        <td>0</td> <!-- Aktual output per jam -->
                                    </tr>
                                    <!-- Tabel Jam 12:30 - 13:30 -->
                                    <tr>
                                        <td>23:30 - 01:30</td>
                                        <td>0</td> <!-- Target per jam -->
                                        <td>0</td> <!-- Aktual output per jam -->
                                    </tr>
                                    <!-- Tabel Jam 13:30 - 14:30 -->
                                    <tr>
                                        <td>01:30 - 02:30</td>
                                        <td>0</td> <!-- Target per jam -->
                                        <td>0</td> <!-- Aktual output per jam -->
                                    </tr>
                                    <!-- Tabel Jam 14:30 - 15:30 -->
                                    <tr>
                                        <td>02:30 - 03:30</td>
                                        <td>0</td> <!-- Target per jam -->
                                        <td>0</td> <!-- Aktual output per jam -->
                                    </tr>
                                    <!-- Tabel Jam 15:30 - 16:30 -->
                                    <tr>
                                        <td>03:30 - 04:30</td>
                                        <td>0</td> <!-- Target per jam -->
                                        <td>0</td> <!-- Aktual output per jam -->
                                    </tr>
                                </tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Statistics Section -->
                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-6">TARGET SHIFT
                                <a href="#" data-toggle="modal" data-target="#setTargetModal">(SET)</a>
                            </p>
                            <h1 id="targetShift"><b>0</b></h1>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="fs-6">TARGET PER DETIK INI <a href="#">(SET)</a></p>
                            <h1 id="targetPerSecond"><b>0</b></h1>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="fs-6">AKTUAL OUTPUT <a href="#">(SET)</a></p>
                            <h1 id="actualOutput"><b>0</b></h1>
                        </div>
                    </div>
                </div>
                <!-- Alert Section -->
                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <input type="text" id="scanInput" class="form-control" placeholder="SCAN"
                                aria-label="SCAN" />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div id="output">
                                <!-- Log entries will be added here dynamically -->
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <!-- Sign out button with an icon -->
                            <a href="../logout.php" class="btn btn-danger btn-flat float-right">
                                <i class="fas fa-sign-out-alt"></i> Sign out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="setTargetModal" tabindex="-1" role="dialog" aria-labelledby="setTargetLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="setTargetLabel">Set Target Shift</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="setTargetForm">
                        <div class="form-group">
                            <label for="targetShiftInput" class="form-label">Target Shift</label>
                            <input type="number" class="form-control" id="targetShiftInput" value="0">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/bootstrap-4.5.3-dist/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../../assets/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Show the modal when the document is loaded
            $('#setTargetModal').modal('show');

            // Define sessions with empty actual values
            const sessions = [{
                    time: '07:30 - 08:30',
                    target: 0,
                    actual: 0
                },
                {
                    time: '08:30 - 09:30',
                    target: 0,
                    actual: 0
                },
                {
                    time: '09:30 - 10:30',
                    target: 0,
                    actual: 0
                },
                {
                    time: '10:30 - 12:00',
                    target: 0,
                    actual: 0
                },
                {
                    time: '13:00 - 13:30',
                    target: 0,
                    actual: 0
                },
                {
                    time: '13:30 - 14:30',
                    target: 0,
                    actual: 0
                },
                {
                    time: '14:30 - 15:30',
                    target: 0,
                    actual: 0
                },
                {
                    time: '15:30 - 16:30',
                    target: 0,
                    actual: 0
                }
            ];

            let actualOutput = 0;
            const scanStatus = {};

            // Render sessions in the table
            function renderSessions() {
                const tableBody = document.getElementById('sessionTableBody');
                tableBody.innerHTML = '';
                sessions.forEach((session, index) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                <td>${session.time}</td>
                <td><input type="number" value="${session.target}" data-index="${index}" class="target-input" /></td>
                <td>${session.actual}</td>
            `;
                    tableBody.appendChild(row);
                });
                updateTargetValues();
            }

            // Update target values in the table
            function updateTargetValues() {
                const targetInputs = document.querySelectorAll('.target-input');
                targetInputs.forEach(input => {
                    input.addEventListener('input', (event) => {
                        const index = event.target.getAttribute('data-index');
                        sessions[index].target = parseInt(event.target.value, 10) || 0;
                        updateTable();
                    });
                });
            }

            // Update the table with sessions data
            function updateTable() {
                let totalTarget = 0;
                let targetPerSecond = 0;
                sessions.forEach(session => {
                    totalTarget += session.target;
                    targetPerSecond += session.target / (60 * 60);
                });
                document.getElementById('targetShift').innerText = totalTarget;
                document.getElementById('targetPerSecond').innerText = targetPerSecond.toFixed(2);
            }

            // Save target data to the server
            function saveTarget() {
                const target = document.getElementById('targetShiftInput').value;
                const noreg = 'some_value'; // Replace with actual value
                const shift = 'some_shift'; // Replace with actual value

                $.ajax({
                    type: 'POST',
                    url: 'save_target.php',
                    data: {
                        target: target,
                        noreg: noreg,
                        shift: shift,
                        supervisor: document.getElementById('supervisorInput').value
                    },
                    success: function (response) {
                        alert('Data target berhasil disimpan: ' + response);
                        $('#setTargetModal').modal('hide');
                    },
                    error: function (xhr, status, error) {
                        console.error('Error occurred: ' + error);
                        alert('Gagal menyimpan data target.');
                    }
                });
            }

            // Event listener for the save button in the modal
            document.getElementById('saveTargetButton').addEventListener('click', function () {
                saveTarget();
            });

            // Distribute targets across sessions
            function distributeTargetShift() {
                let targetShift = parseInt(document.getElementById('targetShiftInput').value) || 0;

                const baseTargetPerSession = Math.floor(targetShift / sessions.length);
                let remainder = targetShift % sessions.length;

                sessions.forEach(session => {
                    session.target = baseTargetPerSession;
                });

                while (remainder > 0) {
                    const randomIndex = Math.floor(Math.random() * sessions.length);
                    sessions[randomIndex].target += 1;
                    remainder -= 1;
                }

                updateTable();
            }

            // Update the counters or other elements
            function updateCounters() {
                const targetShiftElement = document.querySelector('#targetShift');
                const targetPerSecondElement = document.querySelector('#targetPerSecond');
                const actualOutputElement = document.querySelector('#actualOutput');

                const targetShift = parseInt(targetShiftElement.textContent);
                const targetPerSecond = Math.round(targetShift / 8);

                targetPerSecondElement.textContent = targetPerSecond;
                actualOutputElement.textContent = actualOutput;
            }

            // Update the actual output based on current time
            function updateActualOutput() {
                const now = new Date();
                const hours = now.getHours();
                const minutes = now.getMinutes();

                const currentTime = `${hours < 10 ? '0' : ''}${hours}:${minutes < 10 ? '0' : ''}${minutes}`;

                sessions.forEach(session => {
                    const [startTime, endTime] = session.time.split(' - ');
                    const [startHours, startMinutes] = startTime.split(':');
                    const [endHours, endMinutes] = endTime.split(':');

                    const start = new Date(now.getFullYear(), now.getMonth(), now.getDate(), parseInt(
                        startHours), parseInt(startMinutes));
                    const end = new Date(now.getFullYear(), now.getMonth(), now.getDate(), parseInt(
                        endHours), parseInt(endMinutes));

                    if (now >= start && now <= end) {
                        session.actual += 1;
                    }
                });

                updateTable();
            }

            // Handle form input change for scanning
            document.getElementById('scanInput').addEventListener('change', function () {
                const input = document.getElementById('scanInput');
                const code = input.value.trim();
                const output = document.getElementById('output');

                if (code !== '') {
                    let action = '';
                    let status = scanStatus[code];

                    if (status === 'IN') {
                        action = 'OUT';
                        scanStatus[code] = 'COMPLETED';
                        actualOutput += 1; // Increment actualOutput
                        updateActualOutput(); // Update table with actual values
                    } else if (status === 'OUT') {
                        action = 'Already processed OUT';
                    } else if (status === undefined) {
                        action = 'IN';
                        scanStatus[code] = 'IN';
                    } else if (status === 'COMPLETED') {
                        action = 'Already completed';
                    }

                    const entry = document.createElement('div');
                    entry.className = 'log-entry';

                    if (action === 'Already processed OUT' || action === 'Already completed') {
                        entry.classList.add('completed');
                    }

                    entry.innerHTML = `<span>${code}</span> <span>${action}</span>`;

                    output.prepend(entry);
                    input.value = '';
                }
            });

            // Event listener for input changes
            document.getElementById('targetShiftInput').addEventListener('input', distributeTargetShift);

            // Initialize and set intervals
            renderSessions();
            distributeTargetShift();
            setInterval(updateCounters, 1000);
        });
    </script>
</body>



</html>