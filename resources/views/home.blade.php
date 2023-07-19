@extends('components.master')

@section('title', 'Home page')

@section('content')
<div id="carouselExampleControls" class="carousel slide d-flex align-items-center banner" data-bs-ride="carousel">
  <div class="" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="" aria-hidden="true"><i class="fa-regular fa-circle-left "></i></span>
    <span class="visually-hidden">Previous</span>
  </div>
  <div class="carousel-inner position-relative">
    <div class="carousel-item active">
      <img src="uploads/banner1.png" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="uploads/banner1.png" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="uploads/banner1.png" class="d-block w-100" alt="">
    </div>
  </div>
  <div class="" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="" aria-hidden="true"><i class="fa-regular fa-circle-right"></i></span>
    <span class="visually-hidden">Next</span>
  </div>
</div>
<div class="container">
  <div class="row mt-5 mainScreen">
    <div class="col-md-6 Hot">
                <div class="card border-0">
                    <img src="uploads/collection1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title collection1 fw-light">Hot Collection</h3>
                        <h1 class="card-text">New Trend For Women</h1>
                        <p class="card-text openSans opacity-75">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mollis neque eu erat aliquet posuere. Curabitur quis placerat nulla,<br> nec vulputate arcu</p>
                        <a href="{{ url("products")}}" class="btn btn-outline-dark rounded-0 px-4 fw-medium">Shop Now</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pe-0 ">
                    <div class="row">
                      <div class="card border-0 w-75 m-auto col-md-6 item px-md-0">
                        <img src="uploads/collection-3.png" class="card-img-top" alt="...">
                        <div class="card-img-overlay text-center align-items-center justify-content-center d-flex">
                          <a href="#" class="btn btn-outline-light border-2 rounded-0 fw-medium">View Collection</a>
                        </div>
                      </div>
                      <div class="card border-0 w-75 m-auto mt-md-4 col-md-6 item px-md-0">
                        <img src="uploads/collection-2.png" class="card-img-top" alt="...">
                        <div class="card-img-overlay text-center align-items-center justify-content-center d-flex">
                          <a href="#" class="btn btn-outline-light border-2 rounded-0 fw-medium">View Collection</a>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <section class="featured items my-5">
                <div class="welcome position-relative">
                  <h3 class="text text-muted text-center">Featured Items</h3>
                </div>
                  <ul class="nav mb-5 mt-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-muted" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-muted" id="pills-men-tab" data-bs-toggle="pill" data-bs-target="#pills-men" type="button" role="tab" aria-controls="pills-men" aria-selected="false">Men</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-muted" id="pills-women-tab" data-bs-toggle="pill" data-bs-target="#pills-women" type="button" role="tab" aria-controls="pills-women" aria-selected="false">Women</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-muted" id="pills-kids-tab" data-bs-toggle="pill" data-bs-target="#pills-kids" type="button" role="tab" aria-controls="pills-kids" aria-selected="false">Kids</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <div class="row">
                      @foreach ($featuredAll as $product)
                        <div class="item col-md-3 my-4 product_data">
                        <div class="card border-0">
                            <div class="image position-relative">
                              <img src="{{ asset("$product->image")}}" class="card-img-top rounded-0 w-100" alt="...">
                                <p class="card-text bg-dark text-light price p-1">${{ $product->original_price}}</p>
                                <div class="card-img-overlay text-center align-items-center justify-content-center d-flex">
                                    <a href="{{url("products" , $product->id)}}" class="btn btn-outline-light border-2 rounded-circle p-3 fw-medium"><i class="fa-regular fa-eye display-6"></i></a>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <h3 class="card-title">{{ $product->name }}</h3>
                                <input type="hidden" value="{{$product->id}}" class="prod_id">
                        <div class="card-text mt-4">
                            <button type="button" class="addToWishlist wishlist text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-solid fa-heart"></i></button>
                            <button type="button" class="cart-icon text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-solid fa-cart-plus"></i></button>
                            <button type="button"  class="share-icon text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-sharp fa-solid fa-share-nodes"></i></button>
                        </div>
                                @if (Auth::user() && Auth::user()->role == "admin")
                                <div class="card-text d-block">
                                    <a href="{{ url("products/destroy" , $product->id )}}" class="btn btn-danger">Delete</a>
                                    <a href="{{ url("products/edit" , $product->id) }}" class="btn btn-info">edit</a>
                                </div>
                                @endif
                                <!--<div class="card-text rate d-block">
                                  <input type="radio" id="star5" name="rate" value="5" />
                                  <label for="star5" title="text">5 stars</label>
                                  <input type="radio" id="star4" name="rate" value="4" />
                                  <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                  </div>-->
                                </div>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                  <div class="tab-pane fade" id="pills-men" role="tabpanel" aria-labelledby="pills-men-tab">
                <div class="row">
                  @foreach ($featuredMen as $product)
                    <div class="col-md-3 item product_data">
                    <div class="card border-0  px-0">
                        <div class="image position-relative">
                          <img src="{{ asset("$product->image")}}" class="card-img-top rounded-0 w-100" alt="...">
                            <p class="card-text bg-dark text-light price p-1">${{ $product->original_price}}</p>
                            <div class="card-img-overlay text-center align-items-center justify-content-center d-flex">
                                <a href="{{url("products" , $product->id)}}" class="btn btn-outline-light border-2 rounded-circle p-3 fw-medium"><i class="fa-regular fa-eye display-6"></i></a>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                        <div class="card-text mt-4">
                            <button type="button" class="addToWishlist wishlist text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-solid fa-heart"></i></button>
                            <button type="button" class="cart-icon text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-solid fa-cart-plus"></i></button>
                            <button type="button"  class="share-icon text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-sharp fa-solid fa-share-nodes"></i></button>
                        </div>
                            @if (Auth::user() && Auth::user()->role == "admin")
                            <div class="card-text d-block">
                                <a href="{{ url("products/destroy" , $product->id )}}" class="btn btn-danger">Delete</a>
                                <a href="{{ url("products/edit" , $product->id) }}" class="btn btn-info">edit</a>
                            </div>
                            @endif
                            <!-- 
                              <div class="card-text rate d-block">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                              </div>
                            -->
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
              <div class="tab-pane fade" id="pills-women" role="tabpanel" aria-labelledby="pills-women-tab">
                <div class="row">
                  @foreach ($featuredWomen as $product)
                    <div class="col-md-3 item product_data">
                    <div class="card border-0  px-0">
                        <div class="image position-relative">
                          <img src="{{ asset("$product->image")}}" class="card-img-top rounded-0 w-100" alt="...">
                            <p class="card-text bg-dark text-light price p-1">${{ $product->original_price}}</p>
                            <div class="card-img-overlay text-center align-items-center justify-content-center d-flex">
                                <a href="{{url("products" , $product->id)}}" class="btn btn-outline-light border-2 rounded-circle p-3 fw-medium"><i class="fa-regular fa-eye display-6"></i></a>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                        <div class="card-text mt-4">
                            <button type="button" class="addToWishlist wishlist text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-solid fa-heart"></i></button>
                            <button type="button" class="cart-icon text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-solid fa-cart-plus"></i></button>
                            <button type="button"  class="share-icon text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-sharp fa-solid fa-share-nodes"></i></button>
                        </div>
                            @if (Auth::user() && Auth::user()->role == "admin")
                            <div class="card-text d-block">
                                <a href="{{ url("products/destroy" , $product->id )}}" class="btn btn-danger">Delete</a>
                                <a href="{{ url("products/edit" , $product->id) }}" class="btn btn-info">edit</a>
                            </div>
                            @endif
                            <!-- 
                              <div class="card-text rate d-block">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                              </div>
                            -->
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
              <div class="tab-pane fade" id="pills-kids" role="tabpanel" aria-labelledby="pills-kids-tab">
                <div class="row">
                  @foreach ($featuredKids as $product)
                    <div class="col-md-3 item product_data">
                    <div class="card border-0  px-0">
                        <div class="image position-relative">
                          <img src="{{ asset("$product->image")}}" class="card-img-top rounded-0 w-100" alt="...">
                            <p class="card-text bg-dark text-light price p-1">${{ $product->original_price}}</p>
                            <div class="card-img-overlay text-center align-items-center justify-content-center d-flex">
                                <a href="{{url("products" , $product->id)}}" class="btn btn-outline-light border-2 rounded-circle p-3 fw-medium"><i class="fa-regular fa-eye display-6"></i></a>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                        <div class="card-text mt-4">
                            <button type="button" class="addToWishlist wishlist text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-solid fa-heart"></i></button>
                            <button type="button" class="cart-icon text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-solid fa-cart-plus"></i></button>
                            <button type="button"  class="share-icon text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-sharp fa-solid fa-share-nodes"></i></button>
                        </div>
                            @if (Auth::user() && Auth::user()->role == "admin")
                            <div class="card-text d-block">
                                <a href="{{ url("products/destroy" , $product->id )}}" class="btn btn-danger">Delete</a>
                                <a href="{{ url("products/edit" , $product->id) }}" class="btn btn-info">edit</a>
                            </div>
                            @endif
                            <!-- 
                              <div class="card-text rate d-block">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                              </div>
                            -->
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                      </div>
                    </section>
    </div>
    <div class="offer my-5">
      <div class="d-md-flex">
          <div class="col-md-6 px-0">
            <div class="image">
              <img src="/uploads/offer2.jpg" alt="" class="w-100">
            </div>
          </div>
          <div class="col-md-6 px-0">
            <div class="image">
              <img src="/uploads/offer1.jpg" alt="" class="w-100">
            </div>
          </div>

      </div>
    </div>
    <div class="container">
      <div class="trending-items my-5 py-5">
        <div class="welcome position-relative mb-5">
          <h3 class="text text-muted text-center">Trending Items</h3>
        </div>
              <div class="row">
                  @foreach ($trending as $product)
                <div class="col-md-3 item product_id">
                    <div class="card border-0  px-0">
                        <div class="image position-relative">
                          <img src="{{ asset("$product->image")}}" class="card-img-top rounded-0 w-100" alt="...">
                            <p class="card-text bg-dark text-light price p-1">${{ $product->original_price}}</p>
                            <div class="card-img-overlay text-center align-items-center justify-content-center d-flex">
                                <a href="{{url("products" , $product->id)}}" class="btn btn-outline-light border-2 rounded-circle p-3 fw-medium"><i class="fa-regular fa-eye display-6"></i></a>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                        <div class="card-text mt-4">
                            <button type="button" class="addToWishlist wishlist text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-solid fa-heart"></i></button>
                            <button type="button" class="cart-icon text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-solid fa-cart-plus"></i></button>
                            <button type="button"  class="share-icon text-muted border rounded-circle border-2 p-2 opacity-50"><i class="fa-sharp fa-solid fa-share-nodes"></i></button>
                        </div>
                            @if (Auth::user() && Auth::user()->role == "admin")
                            <div class="card-text d-block">
                                <a href="{{ url("products/destroy" , $product->id )}}" class="btn btn-danger">Delete</a>
                                <a href="{{ url("products/edit" , $product->id) }}" class="btn btn-info">edit</a>
                            </div>
                            @endif
                            <!--<div class="card-text rate d-block">
                              <input type="radio" id="star5" name="rate" value="5" />
                              <label for="star5" title="text">5 stars</label>
                              <input type="radio" id="star4" name="rate" value="4" />
                              <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                              </div>-->
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
              <div class="more text-center mt-2">
                  <a href="#" class="btn btn-outline-dark rounded-0 px-5 py-2 font-weight-bolder border-secondary border-2">LOAD MORE</a>
              </div>
    </div>
      </div>
    <div class="feedback my-4">
      <div class="image w-100">
        <img src="/uploads/feedback.jpg" alt="" class="w-100">
      </div>
    </div>
    <div class="container">
      <div class="latestBlog">
        <div class="welcome position-relative mb-5">
          <h3 class="title text-muted text-center">Latest Blog</h3>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card border-0">
              <img src="/uploads/blog1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title fw-light text-capitalize">some headline here</h3>
                  <p class="card-text openSans opacity-75">Vivamus ultrices ut erat ut ullamcorper. Sed sem est, pellentesque auctor malesuada in, sollicitu pulvinar metus. Aliquam scelerisque aliquet faucibus</p>
                  <a href="#" class="btn btn-outline-dark rounded-0 px-4 fw-medium">Read More</a>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img src="/uploads/blog2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title fw-light text-capitalize">some headline here</h3>
                  <p class="card-text openSans opacity-75">Vivamus ultrices ut erat ut ullamcorper. Sed sem est, pellentesque auctor malesuada in, sollicitu pulvinar metus. Aliquam scelerisque aliquet faucibus</p>
                  <a href="#" class="btn btn-outline-dark rounded-0 px-4 fw-medium">Read More</a>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0">
              <img src="/uploads/blog3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3 class="card-title fw-light text-capitalize">some headline here</h3>
                  <p class="card-text openSans opacity-75">Vivamus ultrices ut erat ut ullamcorper. Sed sem est, pellentesque auctor malesuada in, sollicitu pulvinar metus. Aliquam scelerisque aliquet faucibus</p>
                  <a href="#" class="btn btn-outline-dark rounded-0 px-4 fw-medium">Read More</a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="shopBrand my-5 py-4">
        <div class="welcome position-relative mb-5">
          <h3 class="text text-muted text-center">Shop By Brand</h3>
        </div>
        <div class="row mb-3">
          <div class="col-md-3 item mt-3 pe-2">
            <div class="image">
              <img src="/uploads/shopbrand1.jpg" alt="" class="w-100">
            </div>
          </div>
          <div class="col-md-3 item mt-3 pe-2">
            <div class="image">
              <img src="/uploads/shopbrand1.jpg" alt="" class="w-100">
            </div>
          </div>
          <div class="col-md-3 item mt-3 pe-2">
            <div class="image">
              <img src="/uploads/shopbrand2.jpg" alt="" class="w-100">
            </div>
          </div>
          <div class="col-md-3 item mt-3 pe-2">
            <div class="image">
              <img src="/uploads/shopbrand1.jpg" alt="" class="w-100">
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection

