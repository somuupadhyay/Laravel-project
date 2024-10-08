@extends('layouts.app')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <h1 class="my-4">Edit Product</h1>

    <form id="editProductForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $product->id }}"> <!-- Hidden input for product ID -->

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subcategory_id">Subcategory</label>
            <select class="form-control" id="subcategory_id" name="subcategory_id" required>
                <option value="">Select Subcategory</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>
                        {{ $subcategory->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="images">Product Image</label>
            <input type="file" class="form-control" id="images" name="images" accept="image/*">
            @if($product->images)
                <img src="{{ asset('images/' . $product->images) }}" alt="Current Image" class="img-thumbnail mt-2" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Product List</a>
    </form>

    <div id="responseMessage" class="mt-3"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#editProductForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('products.update', $product->id) }}',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                    setTimeout(function() {
                        window.location.href = "{{ route('products.index') }}"; 
                    }, 500);
                },
                error: function(xhr) {
                    $('#responseMessage').html(errorMessage);
                }
            });
        });
    });
</script>
@endsection
