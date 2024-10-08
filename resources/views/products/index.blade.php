@extends('layouts.app')

@section('content')
<div class="container">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    
    <h1 class="my-4">Products</h1>

    <div class="mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Product
        </a>
    </div>

    <div class="table-responsive">
        <table id="productsTable" class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Product Image</th> 
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($product->images && file_exists(public_path('images/' . $product->images))) 
                            <img src="{{ asset('images/' . $product->images) }}" alt="{{ $product->name }}" class="img-thumbnail" width="50"> 
                        @else
                            <span>No Image</span> 
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#productsTable').DataTable();
    });
</script>
@endsection
