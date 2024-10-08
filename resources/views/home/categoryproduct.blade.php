<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <title>Product Details - Famms</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.homeheader')

        <section class="product_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Our <span>Products</span>
                    </h2>
                </div>
                <div class="products-section">
                    <h2>Products</h2>
                    <div class="row">
                        @if($products->isEmpty())
                            <div class="col-12 text-center">
                                <p>No products available in this category.</p>
                            </div>
                        @else
                            @foreach($products as $product)
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="box">
                                    <div class="option_container">
                                        <div class="options">
                                            <a href="{{ route('product.detail', $product->id) }}" class="option1">
                                                Product Detail
                                            </a>
                                            <a href="" class="option2">
                                                Buy Now
                                            </a>
                                        </div>
                                    </div>
                                    <div class="img-box">
                                        @if($product->images && file_exists(public_path('images/' . $product->images))) 
                                            <img src="{{ asset('images/' . $product->images) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 200px; height: auto;">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            {{ $product->name }}
                                        </h5>
                                        <h6>
                                            ${{ $product->price }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="btn-box text-center">
                    <a href="" class="btn btn-secondary">
                        View All Products
                    </a>
                </div>
            </div>
        </section>

        @include('home.footer')
    </div>

    <div class="cpy_">
        <p>© 2021 All Rights Reserved By <a href="https://html.design">Free Html Templates</a></p>
    </div>

    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>
</body>
</html>
