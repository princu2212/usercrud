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

        <div class="dropdown text-end">
            <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Filter <i class="fas fa-filter"></i>
            </button>
            <ul class="dropdown-menu px-2" aria-labelledby="dropdownMenuButton1">
                <li>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <div class="d-flex justify-content-between mx-3">
                                <h6>Filter</h6>
                                <a href="" id="reset" class="text-decoration-none text-primary"
                                    style="font-weight:bold;">Reset</a>
                            </div>
                            <tbody>
                                <tr id="filter_col1" data-column="1">
                                    <td>First Name</td>
                                    <td><input type="text" class="column_filter form-control" placeholder="First Name"
                                            id="col1_filter"></td>
                                </tr>
                                <tr id="filter_col2" data-column="2">
                                    <td>Last Name</td>
                                    <td><input type="text" class="column_filter form-control" placeholder="Last Name"
                                            id="col2_filter"></td>
                                </tr>
                                <tr id="filter_col3" data-column="3">
                                    <td>Username</td>
                                    <td><input type="text" class="column_filter form-control" placeholder="Username"
                                            id="col3_filter"></td>
                                </tr>
                                <tr id="filter_col4" data-column="4">
                                    <td>Email</td>
                                    <td><input type="text" class="column_filter form-control" placeholder="Email"
                                            id="col4_filter"></td>
                                </tr>
                                <tr>
                                    <td>DOB Start Date</td>
                                    <td><input type="date" class="form-control" placeholder="Start Date" id="min"
                                            name="min"></td>
                                </tr>
                                <tr>
                                    <td>DOB End Date</td>
                                    <td><input type="date" class="form-control" placeholder="End Date" id="max"
                                            name="max"></td>
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
        <div class="table-responsive">
            <table class="table table-bordered" id="userTable">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date of Birth</th>
                        <th data-orderable="false">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row">{{ $user->id }}</td>
                            <td scope="row">{{ $user->fname }}</td>
                            <td scope="row">{{ $user->lname }}</td>
                            <td scope="row">{{ $user->username }}</td>
                            <td scope="row">{{ $user->email }}</td>
                            <td>{{ Carbon\Carbon::parse($user->date_of_birth)->format('d/m/Y') }}</td>
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
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                "order": [
                    [0, "desc"]
                ]

            });
        });
    </script>
    {{-- Date Range Start --}}
    <script type="text/javascript">
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = parseInt($('#min').val(), 10);
                var max = parseInt($('#max').val(), 10);
                var age = parseFloat(data[5]) || 0; // use data for the age column

                if ((isNaN(min) && isNaN(max)) ||
                    (isNaN(min) && age <= max) ||
                    (min <= age && isNaN(max)) ||
                    (min <= age && age <= max)) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            var table = $('#userTable').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').keyup(function() {
                table.draw();
            });
        });
    </script>
    {{-- Date Range End --}}

    {{-- Search filter Start --}}
    <script type="text/javascript">
        function filterColumn(i) {
            $('#userTable').DataTable().column(i).search(
                $('#col' + i + '_filter').val(),
            ).draw();
        }

        $(document).ready(function() {
            $('#userTable').DataTable();
            $('input.column_filter').on('keyup click', function() {
                filterColumn($(this).parents('tr').attr('data-column'));
            });
        });
    </script>
    {{-- Search filter End --}}

    {{-- Reset Start --}}
    <script type="text/javascript">
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#col1_filter").val('');
            $("#col2_filter").val('');
            $("#col3_filter").val('');
            $("#col4_filter").val('');
            $('#userTable').DataTable().destroy();
            fetch();
        });
    </script>
    {{-- Reset End --}}
</body>

</html>
