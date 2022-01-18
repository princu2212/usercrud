<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Crud</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <br />
        <h3 align="center">Datatables Server Side Pagination</h3>
        <div class="text-left">
            <a href="{{ route('create') }}" class="btn btn-primary mx-5">Add
                Customer</a>
        </div>

        <div class="dropdown" style="margin-top: 20px">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Filter <i class="fas fa-filter"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <div class="col-md-12 dropdown-item">
                        <label for="s_no" class="form-label">S No.</label>
                        <input type="text" class="form-control" id="s_no" placeholder="S No.">
                    </div>
                </li>
                <li>
                    <div class="col-md-12 dropdown-item">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="fname" id="fname"
                            data-column="0">
                    </div>
                </li>
                <li>
                    <div class="col-md-12 dropdown-item">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="lname" id="lname"
                            data-column="1">
                    </div>
                </li>
                <li>
                    <div class="col-md-12 dropdown-item ">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Enter Username" name="username"
                            id="username" data-column="2">
                    </div>
                </li>
                <li>
                    <div class="col-md-12 dropdown-item">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email"
                            data-column="3">
                    </div>
                </li>
                <li>
                    <div class="input-daterange">
                        <div class="col-md-12" style="margin-top: 20px">
                            <input type="text" name="from_date" id="from_date" class="form-control"
                                placeholder="From Date" readonly />
                        </div>
                        <div class="col-md-12" style="margin-top: 20px;margin-bottom:20px">
                            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date"
                                readonly />
                        </div>
                    </div>
                </li>

                <div class="text-center">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                </div>
            </ul>
        </div>

        <br />
        <br />
        {{-- <div class="row input-daterange">
            <div class="col-md-4">
                <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date"
                    readonly />
            </div>
            <div class="col-md-4">
                <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
            </div>
            <div class="col-md-4">
                <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
            </div>
        </div> --}}
        <br />
        <div class="table-responsive">
            <table class="table table-bordered" id="userTable">
                <thead>
                    <tr>
                        <td>S.no</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Date of Birth</td>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function() {
            $('.input-daterange').datepicker({
                todayBtn: 'linked',
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            load_data();

            function load_data(from_date = '', to_date = '') {
                $('#userTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('user') }}',
                        data: {
                            from_date: from_date,
                            to_date: to_date
                        }
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'fname',
                            name: 'fname'
                        },
                        {
                            data: 'lname',
                            name: 'lname'
                        },
                        {
                            data: 'username',
                            name: 'username'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'date_of_birth',
                            name: 'date_of_birth'
                        },
                    ]
                });
            }

            $('#filter').click(function() {
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if (from_date != '' && to_date != '') {
                    $('#userTable').DataTable().destroy();
                    load_data(from_date, to_date);
                } else {
                    alert('Both Date is required');
                }
            });

            $('#refresh').click(function() {
                $('#from_date').val('');
                $('#to_date').val('');
                $('#userTable').DataTable().destroy();
                load_data();
            });

        });
    </script>
</body>

</html>
