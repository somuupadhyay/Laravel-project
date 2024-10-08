@extends('layouts.app')

@section('content')
<div class="container">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <h1 class="my-4">Categories</h1>

    <div class="mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Category
        </a>
    </div>

    <div class="table-responsive">
        <table id="categoriesTable" class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Subcategories</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if ($category->subcategories->isEmpty())
                            <p class="text-muted">No Subcategories</p>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach ($category->subcategories as $subcategory)
                                <li class="list-group-item">{{ $subcategory->name }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                        <form action="{{ route('categories.addSubcategory', $category) }}" method="POST" class="mt-2">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" placeholder="Add Subcategory" required>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Add
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#categoriesTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
@endsection
