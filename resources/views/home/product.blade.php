<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
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
        </div>
        <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div>
    </div>
</section>
