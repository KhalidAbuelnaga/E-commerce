    <nav class="navbar navbar-expand-lg bg-light first-nav">
        <div class="container">
            <a class="navbar-brand" href="">Free Shipping on All orders Over $75!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if (! Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("login")}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("register")}}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('profile')}}">My Account</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url("wishlist")}}">Wishlist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="£">Currency:</a>
                    </li>
                    @if (Auth::user() && Auth::user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("categories")}}">All Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("categories/create")}}">Create Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("products")}}">All Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("products/create")}}">Create product</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url("orders")}}">Orders</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url("users")}}">Users</a>
                    </li>
                    @endif
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url("cart")}}"><i class="fa-sharp fa-solid fa-cart-shopping me-md-2"></i>Cart()</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url("my-orders")}}">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("logout")}}">Logout</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>