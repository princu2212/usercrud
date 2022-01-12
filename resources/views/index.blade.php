<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="header_title">
        <div class="container d-flex">
            <h4>User Details</h4>
            <button class="btn ms-auto mx-5 rounded add_user" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add
                New User</button>
        </div>
    </div>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)
                    <tr>
                        <td scope="row">{{ $user->fname }}</td>
                        <td scope="row">{{ $user->lname }}</td>
                        <td scope="row">{{ $user->date_of_birth->format('d/m/Y') }}</td>
                        <td scope="row">{{ $user->username }}</td>
                        <td scope="row">{{ $user->email }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Modal part for Add User Start --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal mx-auto" action="{{ route('store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="control-label" for="name">First Name:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Enter First Name" name="fname">
                                @error('fname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label" for="name">Last Name:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
                                @error('lname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label" for="name">Date of Birth:</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" placeholder="Date of Birth"
                                    name="date_of_birth">
                                @error('date_of_birth')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label" for="name">Username:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Username" name="username">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label" for="email">Email:</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email" autocomplete="off">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label" for="password">Password:</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" placeholder="Enter password"
                                    name="password" autocomplete="off">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal part for Add User End --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
