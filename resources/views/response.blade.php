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
        *{
            font-family: 'Poppins';
        }
        body {
            background-color: #f8f9fa;
        }


        /* Adjusted Navbar Styling */
        .navbar-brand {
            color: #fff; /* White text */
            font-weight: bold;
            margin-left: auto; /* Align to the center */
            margin-right: auto; /* Align to the center */
            text-align: center; /* Center the text */
            width: 100%; /* Full width */
        }

        /* Styling the Form */
        form {
            background-color: #fff;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            margin-bottom: 20px;
        }

        button {
            width: 100%;
        }
        .row{
            text-align: center;
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

    <!-- Form -->
    <form id="form" action="#" method="post" class="mt-6">

        <!-- Name -->
        <div class="row">
        <h1>Thank you!</h1>
        <p>Your Data is Also Submitted</p>
    </div>

        <!-- Submit Button -->
        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
    </form>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>






















