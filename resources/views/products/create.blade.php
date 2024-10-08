@extends('layouts.app')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <h1 class="my-4">Add Product</h1>

    <form id="product-form" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id" required>
                <option value="">Select a Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subcategory">Subcategory</label>
            <select class="form-control" id="subcategory" name="subcategory_id" required>
                <option value="">Select a Subcategory</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="images">Product Image</label>
            <input type="file" class="form-control" id="images" name="images" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Product List</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#product-form').on('submit', function(e) {
        e.preventDefault(); 

        $.ajax({
            url: '{{ route("products.store") }}',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                alert(response.message);
                $('#product-form')[0].reset(); 
                setTimeout(function() {
                    window.location.href = "{{ route('products.index') }}"; 
                },500);
            },
            error: function(xhr) {
                alert('Something went wrong!'); 
            }
        });
    });
});
</script>
@endsection
