<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie - Taste Better</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


</head>

<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a href="" class="navbar-brand ">Foodie Menu</a>

            <div class="navbar-nav nav">
                <a href="{{route("home.index")}}" class="nav-link nav-item">Home</a>


                @auth
                    <a href="" class="nav-link nav-item text-capitalize text-white">{{auth()->user()->name}}</a>
                    <a href="{{route('logout')}}" class="nav-link nav-item">Logout</a>
                @endauth

                @guest
                    <a href="{{route('signup')}}" class="nav-link nav-item">Signup</a>
                    <a href="{{route('login')}}" class="nav-link nav-item">Login</a>
                @endguest
            </div>
        </div>
    </div>


    @section('content')

    @show

    <script>

        toastr.options = {
            "closeButton":true,
        }

        @if(session('error'))
            toastr.error("<?= session('error');?>")
        @endif

        @if(session('success'))
            toastr.success("{{session('success')}}")
        @endif
    </script>
    
</body>

</html>