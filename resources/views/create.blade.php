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
            <h4 class="card-title text-center pt-3">Add New User</h4>
            <hr class="w-75 mx-auto">
            <div class="modal-body">
                <form class="form-horizontal mx-auto" action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="control-label" for="name">First Name<span class="text-danger">*</span></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter First Name" name="fname">
                            @error('fname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label" for="name">Last Name<span class="text-danger">*</span></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
                            @error('lname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label" for="name">Date of Birth<span
                                class="text-danger">*</span></label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" placeholder="Date of Birth" name="date_of_birth">
                            @error('date_of_birth')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label" for="name">Username<span class="text-danger">*</span></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label" for="email">Email<span class="text-danger">*</span></label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                name="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label" for="password">Password<span
                                class="text-danger">*</span></label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" placeholder="Enter password" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="/" class="btn btn-warning">Cancel</a>
                    </div>
            </div>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
