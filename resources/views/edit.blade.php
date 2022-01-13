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
    <div class="container">
        <div class="card mt-3 mx-auto shadow rounded-3" style="width: 70%">
            <h4 class="card-title text-center pt-3">User Details</h4>
            <hr class="w-75 mx-auto">
            <div class="card-body">
                <form class="form-horizontal mx-auto" action="{{ route('update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label class="control-label" for="name">First Name:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter First Name" name="fname"
                                value="{{ $user->fname }}">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label" for="name">Last Name:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter Last Name" name="lname"
                                value="{{ $user->lname }}">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label" for="name">Date of Birth:</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" placeholder="Date of Birth" name="date_of_birth"
                                value="{{ $user->date_of_birth }}">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label" for="name">Username:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Username" name="username"
                                value="{{ $user->username }}">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label" for="email">Email:</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" placeholder="Enter email" name="email"
                                value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="  form-group mb-3">
                        <label class="control-label" for="password">Password:</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" placeholder="Enter password" name="password"
                                value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class=" modal-footer mt-3 justify-content-center">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
