<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <!-- Logo with asset() -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img width="250" src="{{ asset('home/images/logo.png') }}" alt="Logo" />
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                            <span class="nav-label">Categories <span class="caret"></span></span>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('category.products', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="{{ asset('home/images/cart-icon.svg') }}" alt="Cart Icon" width="20">
                        </a>
                    </li>
                    <form class="form-inline">
                        <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </ul>
            </div>
        </nav>
    </div>
</header>
