<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bulma.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bulma.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="header_title ">
        <div class="container-fluid d-flex">
            <h4><a href="{{ url('/') }}" class="text-white text-decoration-none">User Details</a> </h4>
            <a href="{{ route('create') }}" class="btn ms-auto rounded add_user">Add
                New User</a>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr id="daterange">
                                <td>Date:</td>
                                <td><input type="text" class="form-control" placeholder="Start Date" id="min"
                                        name="min">
                                </td>
                                <td><input type="text" class="form-control" placeholder="End Date" id="max"
                                        name="max">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group mt-2 ">
                    <select id='status' class="form-control" style="width: 150px">
                        <option value="">Status</option>
                        <option value="1">Active</option>
                        <option value="0">In Active</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 text-end">
                <div class="dropdown ">
                    <a href="{{ url('/') }}" id="reset" class="btn btn-outline-warning mt-1 mr-1">Reset</a>
                    <button class="btn btn-outline-info dropdown-toggle mt-1" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Filter <i class="fas fa-filter"></i>
                    </button>
                    <ul class="dropdown-menu px-2" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <div class="d-flex justify-content-between mx-3">
                                        <h6>Filter</h6>
                                        <a href="{{ url('/') }}" id="reset"
                                            class="text-decoration-none text-primary"
                                            style="font-weight:bold;">Reset</a>
                                    </div>
                                    <tbody>
                                        <tr id="filter_col2" data-column="2">
                                            <td>First Name</td>
                                            <td><input type="text" class="column_filter form-control"
                                                    placeholder="First Name" id="col2_filter"></td>
                                        </tr>
                                        <tr id="filter_col3" data-column="3">
                                            <td>Last Name</td>
                                            <td><input type="text" class="column_filter form-control"
                                                    placeholder="Last Name" id="col3_filter"></td>
                                        </tr>
                                        <tr id="filter_col4" data-column="4">
                                            <td>Username</td>
                                            <td><input type="text" class="column_filter form-control"
                                                    placeholder="Username" id="col4_filter"></td>
                                        </tr>
                                        <tr id="filter_col5" data-column="5">
                                            <td>Email</td>
                                            <td><input type="text" class="column_filter form-control"
                                                    placeholder="Email" id="col5_filter"></td>
                                        </tr>
                                        <tr>
                                            <td>DOB Start Date</td>
                                            <td><input type="text" class="form-control" placeholder="Start Date"
                                                    id="min1" name="min1"></td>
                                        </tr>
                                        <tr>
                                            <td>DOB End Date</td>
                                            <td><input type="text" class="form-control" placeholder="End Date"
                                                    id="max1" name="max1"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button id="search" class="btn btn-primary mx-3">Apply</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="userTable">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Status</th>
                        <th data-orderable="false">Action</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row">{{ $user->id }}</td>
                            <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                            <td scope="row">{{ $user->fname }}</td>
                            <td scope="row">{{ $user->lname }}</td>
                            <td scope="row">{{ $user->username }}</td>
                            <td scope="row">{{ $user->email }}</td>
                            <td scope="row">{{ $user->date_of_birth }}</td>
                            <td scope="row" id="statusfilter">
                                <span
                                    class="badge bg-{{ $user->status == 'Active' ? 'success' : 'secondary' }}">{{ $user->status }}</span>
                            </td>
                            <td>
                                <div class="dropdown text-center">
                                    <a class="dropdown-button" id="dropdown-menu-{{ $user->id }}"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-menu-{{ $user->id }}">
                                        <a class="dropdown-item" href="{{ route('edit', $user->id) }}">
                                            <i class="fa fa-edit"></i>
                                            {{ trans('Edit') }}
                                        </a>
                                        <form id="delete-{{ $user->id }}"
                                            action="{{ route('destroy', $user->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="#"
                                            onclick="if(confirm('{{ trans('Are you sure to delete?') }}')) document.getElementById('delete-{{ $user->id }}').submit()">
                                            <i class="fa fa-trash"></i>
                                            {{ trans('Delete') }}
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{-- <div class="pagination">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown button
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div> --}}
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bulma.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.13/sorting/datetime-moment.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

    <script>
        // Column search Start
        function filterColumn(i) {
            $('#userTable').DataTable().column(i).search(
                $('#col' + i + '_filter').val(),
            ).draw();
        }

        // Date Filter
        var minDate, maxDate;
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[6]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );
        //Filter
        var minDate1, maxDate1;
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min1 = minDate1.val();
                var max1 = maxDate1.val();
                var date = new Date(data[6]);

                if (
                    (min1 === null && max1 === null) ||
                    (min1 === null && date <= max1) ||
                    (min1 <= date && max1 === null) ||
                    (min1 <= date && date <= max1)
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {

            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'DD/MM/YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'DD/MM/YYYY'
            });

            minDate1 = new DateTime($('#min1'), {
                format: 'DD/MM/YYYY'
            });
            maxDate1 = new DateTime($('#max1'), {
                format: 'DD/MM/YYYY'
            });

            var table = $('#userTable').DataTable({
                "dom": '<f<t>ilp>',
                "language": {
                    "info": "Showing _START_ - _END_ of _TOTAL_"
                },
                oLanguage: {
                    oPaginate: {
                        sNext: '<span class="pagination-default"></span><span class="pagination-fa"><i class="fa fa-chevron-right" ></i></span>',
                        sPrevious: '<span class="pagination-default"></span><span class="pagination-fa"><i class="fa fa-chevron-left" ></i></span>'
                    }

                },

                "order": [
                    [0, "desc"]
                ],
                "pagingType": "simple_numbers",

            });

            // Refilter the table
            $('#min, #max').on('change', function() {
                moment().format("MMM Do YY");
                table.draw();
            });
            $('#min1, #max1').on('change', function() {
                moment().format("MMM Do YY");
                table.draw();
            });

            // Column Search
            $('input.column_filter').on('keyup click', function() {
                filterColumn($(this).parents('tr').attr('data-column'));
            });

        });
    </script>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $(function() {

                var table = $('#userTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('select') }}",
                        data: function(d) {
                            d.status = $('#status').val(),
                                d.search = $('input[type="search"]').val()
                        }
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
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
                        {
                            data: 'status',
                            name: 'status'
                        },

                    ],
                    "order": [
                        [0, "desc"]
                    ]
                });

                $('#status').change(function() {
                    table.draw();
                });

            });
        });
    </script> --}}




</body>

</html>
