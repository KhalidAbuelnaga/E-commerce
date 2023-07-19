<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Lato&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/master.css">
</head>
<body class="bg-body-secondary">
    <div class="container">
        <h1 class="logo text-center my-4">Fashion</h1>
        <div class="row my-5 shadow w-75 mx-auto bg-white">
            <div class="col-6 px-0">
                <div class="login-image h-100">
                    <img src="uploads/collection-3.png" alt="" class="w-100 h-100">
                </div>
            </div>
            <div class="col-6 px-4">
                <div class="">
                    <h2 class="my-4">Sign In</h2> 
                    <form action="{{ url("login") }}" method="POST" >
                        @csrf
                        <a href="{{ route('facebook.login') }}" class="btn btn-facebook btn-user btn-block border rounded-circle float-end p-1 mb-2">
                            <i class="fab fa-facebook-f fa-fw opacity-50"></i></a>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label> 
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn w-100 signBtn text-white py-2 rounded-0 mb-3">Sign in</button>
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" name="remember" type="checkbox" value="1" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <a href="#" class="text-secondary float-right">forgot your password?</a>
                        </div>
                    </form>
                    <p class="text-center mt-3">Not a member? <a href="{{ url("register")}}" class="mainColor">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>