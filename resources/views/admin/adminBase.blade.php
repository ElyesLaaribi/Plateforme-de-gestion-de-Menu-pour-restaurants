<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL - Foodie - Taste Better</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>

<body>
    <div class="navbar navbar-expend-lg navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">ADMIN PANEL | Foodie</a>

            <div class="navbar-nav nav">
                <a href="{{route('adminLogout')}}" class="nav-link nav-item">Logout</a>
            </div>
        </div>
    </div>
    <div class="navbar navbar-expand-lg navbar-dark bg-secondary py-0 small">
        <div class="container">
            <div class="navbar-nav nav">
                <a href="{{route('admin.dashboard')}}" class="nav-link nav-item">Home</a>
                <a href="{{route('admin.category')}}" class="nav-link nav-item">Manage Category</a>
                <a href="{{route('admin.product.index')}}" class="nav-link nav-item">Manage Products</a>
                <a href="{{route('admin.product.insert')}}" class="nav-link nav-item">Insert Products</a>

            </div>
        </div>
    </div>


    @section('content')

    @show

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


    <script>

        toastr.options = {
            "closeButton": true,
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