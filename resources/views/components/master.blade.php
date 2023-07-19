<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Unknown Page')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Lato&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/master.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('components.navbar1')
    <div class="search my-4">
        <form action="{{url('searchproduct')}}" method="POST">
        @csrf
            <div class="input-group mb-3 m-auto w-25 d-flex align-items-center">
                <input type="search" name="search" id="search_product" class="form-control rounded-pill py-2 px-4 opacity-75 position-relative" placeholder="Search Here What You Need..." aria-label="Search Here What You Need..." aria-describedby="basic-addon1">
                <button type="submit" class="input-group-text position-absolute end-0 border-0 bg-transparent" id="basic-addon1"><i class="fa fa-search"></i></button>
            </div>
        </form>
        </div>
    @include('components.navbar2')
    @yield('content')
    @include('components.footer')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/product-list",
            success: function(response) {
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags) {
            $( "#search_product" ).autocomplete({
                source: availableTags
            });
        }
</script>
<script src="/js/app.js"></script>
</body>
</html>