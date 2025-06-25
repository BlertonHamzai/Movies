<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Movie - Blerti's Cinema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
        }
        .form-container {
            max-width: 700px;
            margin: 60px auto;
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }
        .form-title {
            font-size: 28px;
            font-weight: bold;
            color: #ff6600;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-control:focus {
            border-color: #ff6600;
            box-shadow: 0 0 0 0.25rem rgba(255, 102, 0, 0.25);
        }
        .btn-primary {
            background-color: #ff6600;
            border-color: #ff6600;
        }
        .btn-primary:hover {
            background-color: #e05500;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h1 class="form-title">Add New Movie</h1>

        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="movie_name" class="form-label">Movie Name</label>
                <input type="text" id="movie_name" name="movie_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="movie_desc" class="form-label">Description</label>
                <textarea id="movie_desc" name="movie_desc" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="movie_quality" class="form-label">Quality</label>
                <input type="text" id="movie_quality" name="movie_quality" class="form-control">
            </div>

            <div class="mb-3">
                <label for="movie_rating" class="form-label">Rating (0-10)</label>
                <input type="number" id="movie_rating" name="movie_rating" class="form-control" min="0" max="10" step="0.1">
                @error('movie_rating')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="movie_image" class="form-label">Movie Poster</label>
                <input type="file" id="movie_image" name="movie_image" class="form-control">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Create Movie</button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('movies.index') }}" class="text-decoration-none text-secondary">&larr; Back to List</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
