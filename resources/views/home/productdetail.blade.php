<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Basic Meta Tags -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Meta -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="">
      <title>Product Details - Famms</title>
      <!-- Bootstrap Core CSS -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- Font Awesome -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom Styles for this Template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- Responsive Style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <style>
         .error {
            color: red;
         }
      </style>
   </head>
   <body>
      <!-- Hero Area -->
      <div class="hero_area">
         <!-- Header Section -->
         @include('home.homeheader')

         <!-- Product Detail Section -->
         <section class="product_section layout_padding">
            <div class="container">
               <div class="heading_container heading_center">
                  <h2>Product <span>Details</span></h2>
               </div>
               <div class="row justify-content-center">
                  <div class="col-sm-8 col-md-6 col-lg-6">
                     <div class="box">
                        <div class="img-box">
                            @if($product->images && file_exists(public_path('images/' . $product->images))) 
                                    <img src="{{ asset('images/' . $product->images) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 200px; height: auto;">
                                @else
                                    <span>No Image</span>
                                @endif
                        </div>
                        <div class="detail-box">
                           <h5>{{ $product->name }}</h5>
                           <h6 style="color: blue;">Price: ${{ number_format($product->price, 2) }}</h6>
                           <button onclick="history.back()" class="btn btn-warning mt-3">Back</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         <!-- Footer Section -->
         @include('home.footer')
      </div>

      <!-- Copyright -->
      <div class="cpy_">
         <p>© 2021 All Rights Reserved By <a href="https://html.design">Free Html Templates</a></p>
      </div>

      <!-- JS Files -->
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      <script src="{{asset('home/js/custom.js')}}"></script>
   </body>
</html>
