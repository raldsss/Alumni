@extends('template.mains')
@section('title', 'Alumnis Record')
@section('content')
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css">

<style>
     @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
        *{
            font-family: 'Poppins';
        }
    .bold-blue {
        font-weight: bold;
        color: blue;
    }

    #table {
        table-layout: fixed;
    }

    th, td {
        text-align: center;
    }

    #table th:first-child,
    #table td:first-child,
    #table th:nth-child(2),
    #table td:nth-child(2),
    #table th:nth-child(3),
    #table td:nth-child(3) {
        position: sticky;
        left: 0;
        z-index: 1;
        background-color: white;
    }

    #table th:nth-child(n+4),
    #table td:nth-child(n+4) {
        position: sticky;
        z-index: 0;
    }
    .content{
        margin-left: -17rem;
    }
    h1{
        position: relative;
        left: -17rem;
    }

</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="text-right">
                                <a href="/alumni/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Alumni</a>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="font-size:17px;"><i class="fa-regular fa-paper-plane"></i>Import Data</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size:17px;"><i class="fa-regular fa-paper-plane"></i>Send Email</button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div id="toolbar">
                                <button id="exportExcelButton" class="btn btn-success"><i class="fa-solid fa-download" style="margin: 5px;"></i>Export to Excel</button>
                            </div>
                            <table id="table"
                                   data-toggle="table"
                                   data-search="true"
                                   data-show-export="true"
                                   data-pagination="true"
                                   data-page-list="[5, 10, 25, 50, 100, 250, 500]"
                                   data-toolbar="#toolbar"
                                   class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="action" data-filter-control="input">Action</th>
                                        <th data-field="alumni_id" data-filter-control="input">#</th>
                                        <th data-field="firstName" data-filter-control="input">First Name</th>
                                        <th data-field="middleName" data-filter-control="input">Middle Name</th>
                                        <th data-field="lastName" data-filter-control="input">Last Name</th>
                                        <th data-field="streetAddress" data-filter-control="input">Street Address</th>
                                        <th data-field="barangay" data-filter-control="input">Barangay</th>
                                        <th data-field="city" data-filter-control="input">City</th>
                                        <th data-field="district" data-filter-control="input">District</th>
                                        <th data-field="province" data-filter-control="input">Province</th>
                                        <th data-field="region" data-filter-control="input">Region</th>
                                        <th data-field="birthdate" data-filter-control="input">Birth Date</th>
                                        <th data-field="age" data-filter-control="input">Age</th>
                                        <th data-field="sex" data-filter-control="input">Gender</th>
                                        <th data-field="nationality" data-filter-control="input">Nationality</th>
                                        <th data-field="civil_status" data-filter-control="input">Civil Status</th>
                                        <th data-field="email" data-filter-control="input">Email</th>
                                        <th data-field="batchNumber" data-filter-control="input">Batch #</th>
                                        <th data-field="training_status" data-filter-control="input">Training Status</th>
                                        <th data-field="scholarship" data-filter-control="input">Scholarship</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alumni as $data)
                                    <tr>
                                        <td class="bs-checkbox"><input data-index="{{ $loop->index }}" name="btSelectItem" type="checkbox"></td>
                                        <td>
                                            <form class="d-inline" action="/alumni/{{ $data->alumni_id }}/edit" method="GET">
                                                <button type="submit" class="btn btn-success btn-sm mr-1">
                                                    <i class="fa-solid fa-pen"></i> Edit
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{ $data->alumni_id }}</td>
                                        <td>{{ $data->firstName }}</td>
                                        <td>{{ $data->middleName }}</td>
                                        <td>{{ $data->lastName }}</td>
                                        <td>{{ $data->streetAddress }}</td>
                                        <td>{{ $data->barangay }}</td>
                                        <td>{{ $data->city }}</td>
                                        <td>{{ $data->district }}</td>
                                        <td>{{ $data->province }}</td>
                                        <td>{{ $data->region }}</td>
                                        <td>{{ $data->birthdate }}</td>
                                        <td>{{ $data->age }}</td>
                                        <td>{{ $data->sex }}</td>
                                        <td>{{ $data->nationality }}</td>
                                        <td>{{ $data->civil_status }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->batchNumber }}</td>
                                        <td>{{ $data->training_status }}</td>
                                        <td>{{ $data->scholarship }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="position: relative;left:7rem;">Send Email</h1>
            </div>
            <div class="modal-body">
            <form method="post" action="{{ route('sendmail.send') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Body:</label>
                    <textarea name="body" class="form-control @error('body') is-invalid @enderror" required rows="8">
                Dear Alumni,

                We invite you to participate in our Alumni Employment Survey. Your feedback is important to us!

                Please complete the survey using the link below:

                [http://127.0.0.1:8000/alumnilog]

                Thank you for your participation!

                Best regards,
                Admin
                    </textarea>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Send Email</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel" style="position: relative;left:4rem;">Alumni Registration</h2>
            </div>
            <div class="modal-body">
            <form method="post" action="#">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Import File :</label>
                    <input type="file" name="body" class="form-control" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Import</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.3/xlsx.full.min.js"></script>
<script>
 $(function () {
    var $table = $('#table');

    $('#exportExcelButton').click(function () {
        exportTableToExcel($table);
    });

    $table.bootstrapTable({
    });

    $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
        var selectedRows = $table.bootstrapTable('getSelections');
        var exportButton = $('#exportExcelButton');

        if (selectedRows.length > 0) {
            exportButton.prop('disabled', false);
        } else {
            exportButton.prop('disabled', true);
        }
    });
});

function exportTableToExcel($table) {
    var selectedRows = $table.bootstrapTable('getSelections');

    if (selectedRows.length === 0) {
        alert('No rows selected');
        return;
    }

    var headers = [];
    $table.find('thead th').each(function () {
        var headerText = $(this).text().trim();
        if (headerText && headerText !== 'Action' && headerText !== '') {
            headers.push(headerText);
        }
    });

    var data = selectedRows.map(function (row) {
        return headers.map(function (header) {
            var key = $table.find('th:contains("' + header + '")').data('field');
            return row[key] || '';
        });
    });

    var workbook = XLSX.utils.book_new();
    var worksheet = XLSX.utils.aoa_to_sheet([headers].concat(data));
    XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");

    XLSX.writeFile(workbook, 'Alumni Record.xlsx');
}



</script>
