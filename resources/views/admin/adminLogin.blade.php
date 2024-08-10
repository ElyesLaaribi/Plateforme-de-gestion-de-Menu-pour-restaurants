<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL - Foodie - Taste Better</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="navbar navbar-expend-lg navbar-dark bg-dark">
        <div class="container">
<<<<<<< HEAD
            <a href="" class="navbar-brand">ADMIN PANEL | </a>
=======
            <a href="" class="navbar-brand">ADMIN PANEL | Foodie</a>
>>>>>>> main


        </div>
    </div>




    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">Admin Header</div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control">
                                @error('email')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" value="{{old('password')}}" class="form-control">
                                @error('password')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Admin Login" class="btn btn-danger w-100">

                            </div>
                        </form>
                        @if (session('msg'))
                            <div class="alert alert-danger">{{session('msg')}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>