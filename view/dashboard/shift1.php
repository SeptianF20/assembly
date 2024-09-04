<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counting and Monitoring Application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                        <div class="col-sm-2 mb-2">
                            <input type="date" id="tanggal" class="form-control" placeholder="Tanggal"
                                aria-label="Tanggal" />
                        </div>
                        <div class="col-sm-3 mb-2">
                            <h3>Shift 1</h3>
                        </div>
                        <div class="col-sm-3 mb-2">
                            <h3>Line Assy 4</h3>
                        </div>
                        <div class="col-sm-2 mb-2">
                            <h3>Nama Lengkap</h3>
                        </div>
                        <div class="col-sm-2 mb-2">
                            <input type="text" id="scanInput" class="form-control" placeholder="SCAN"
                                aria-label="SCAN" />
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
                                        <th>JAM</th>
                                        <th>TARGET</th>
                                        <th>AKTUAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be added here dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Statistics Section -->
                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-6">TARGET SHIFT <a href="#">(SET)</a></p>
                            <h1 id="targetShift"><b>350</b></h1>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="fs-6">TARGET PER DETIK INI <a href="#">(SET)</a></p>
                            <h1 id="targetPerSecond"><b>44</b></h1>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="fs-6">AKTUAL OUTPUT <a href="#">(SET)</a></p>
                            <h1 id="actualOutput"><b>45</b></h1>
                        </div>
                    </div>
                </div>
                <!-- Alert Section -->
                <div class="col-lg-3 mb-3">
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Object to track the scan status of each code
        const scanStatus = {};

        // Auto-update counter every second
        function updateCounters() {
            const targetShiftElement = document.querySelector('#targetShift');
            const targetPerSecondElement = document.querySelector('#targetPerSecond');
            const actualOutputElement = document.querySelector('#actualOutput');

            // Dummy data for demonstration
            const targetShift = 350;
            const targetPerSecond = 44;
            const actualOutput = 45;

            // Update elements
            targetShiftElement.textContent = targetShift;
            targetPerSecondElement.textContent = targetPerSecond;
            actualOutputElement.textContent = actualOutput;
        }

        // Update counters every second
        setInterval(updateCounters, 1000);

        // Handle form input change
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
                
                // Prepend the new entry to make it appear at the top
                output.prepend(entry);

                // Clear the input field for the next scan
                input.value = '';
            }
        });
    });
</script>

</body>

</html>