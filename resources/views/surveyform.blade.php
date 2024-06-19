<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDTP Employment Survey</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        /* Adjusted Navbar Styling */
        .navbar-brand {
            color: #fff; /* White text */
            font-weight: bold;
            text-align: center; /* Center the text */
            width: 100%; /* Full width */
            letter-spacing: 2px;
        }

        /* Form styling */
        .form-group {
            margin-bottom: 1rem;
        }

        button[type="submit"] {
            width: 100%;
        }
        .btn{
            font-size: 25px;
            letter-spacing: 3px;
        }
    </style>
</head>

<body>
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            timer: 1000,
            showConfirmButton: false
        })
    </script>
    @endif

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">SDTP Alumni Employment Survey</span>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <div class="btn"><i class="fa-solid fa-arrow-rotate-left"></i>Alumni Survey Form</div>
                        </div>
                    </div>
                    <form id="form" action="{{ route('store', ['alumni' => $alumni->alumni_id]) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="batchNumber" class="form-label">Batch Number</label>
                                        <input type="number" id="batchNumber" name="batchNumber" class="form-control" value="{{ $alumni->batchNumber }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $alumni->firstName }} {{ $alumni->lastName }} {{ $alumni->middleName }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="employment_status" class="form-label">Current employment status</label>
                                        <select name="employment_status" id="employment_status" class="form-select" required>
                                            <option value="">Select one</option>
                                            <option value="Employed">Employed</option>
                                            <option value="Unemployed">Unemployed</option>
                                            <option value="With Job Offer">With Job Offer</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="additional-fields" style="display: none;">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="company_name" class="form-label">Company name</label>
                                            <input type="text" id="company_name" name="company_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="job_title" class="form-label">Job Title</label>
                                            <input type="text" id="job_title" name="job_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="location" class="form-label">Location</label>
                                            <input type="text" id="location" name="location" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="remarks" class="form-label">Remarks</label>
                                            <textarea name="remarks" id="remarks" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script to toggle additional fields based on employment status -->
    <script>
        function toggleFields() {
            var employmentStatus = document.getElementById("employment_status").value;
            var additionalFields = document.getElementById("additional-fields");

            if (employmentStatus === "Employed" || employmentStatus === "With Job Offer") {
                additionalFields.style.display = "block";
            } else {
                additionalFields.style.display = "none";
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("employment_status").addEventListener("change", toggleFields);
            toggleFields(); // Initial call to set the initial state
        });
    </script>
</body>

</html>
