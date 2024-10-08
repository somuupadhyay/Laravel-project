@extends('layouts.app')

@section('content')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <h1>Edit Category</h1>

    <form id="editCategoryForm">
        @csrf
        @method('PUT')
        <input type="hidden" name="category_id" value="{{ $category->id }}">
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <div id="responseMessage" class="mt-3"></div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#editCategoryForm').on('submit', function(event) {
                event.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('categories.update', $category) }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                        setTimeout(function() {
                            window.location.href = "{{ route('categories.index') }}";
                        }, 1500);
                    },
                    error: function(xhr) {
                        $('#responseMessage').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
                    }
                });
            });
        });
    </script>
@endsection
