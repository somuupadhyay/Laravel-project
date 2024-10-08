@extends('layouts.app')

@section('content')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <div class="container">
        <h1 class="my-4">Add Category</h1>

        <div class="card">
            <div class="card-body">
                <form id="categoryForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
                <div id="responseMessage" class="mt-3"></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#categoryForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('categories.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                        $('#categoryForm')[0].reset();
                        setTimeout(function() {
                            window.location.href = "{{ route('categories.index') }}";
                        },500);
                    },
                    error: function(xhr) {
                        $('#responseMessage').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
                    }
                });
            });
        });
    </script>
@endsection
