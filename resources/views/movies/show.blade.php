<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details - {{ $movie->movie_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            margin-top: 60px;
            max-width: 900px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }
        .movie-poster {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 12px 0 0 12px;
        }
        .card-body {
            padding: 30px;
        }
        .movie-title {
            font-size: 32px;
            font-weight: 700;
            color: #ff6600;
        }
        .movie-desc {
            font-style: italic;
            margin-bottom: 20px;
        }
        .movie-attr {
            margin-bottom: 10px;
        }
        .back-link {
            margin-top: 30px;
            display: inline-block;
            text-decoration: none;
            font-weight: 500;
            color: #555;
        }
        .back-link:hover {
            text-decoration: underline;
            color: #ff6600;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card overflow-hidden">
        <div class="row g-0">
            <div class="col-md-5">
                @if($movie->movie_image)
                    <img src="{{ asset('images/movies/' . $movie->movie_image) }}" class="movie-poster" alt="{{ $movie->movie_name }}">
                @else
                    <div class="d-flex align-items-center justify-content-center h-100 bg-secondary text-white">
                        <p class="text-center">No image available</p>
                    </div>
                @endif
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h1 class="movie-title">{{ $movie->movie_name }}</h1>
                    <p class="movie-desc">{{ $movie->movie_desc }}</p>

                    <div class="movie-attr"><strong>Quality:</strong> {{ $movie->movie_quality }}</div>
                    <div class="movie-attr"><strong>Rating:</strong> {{ $movie->movie_rating }}</div>
                    <div class="movie-attr"><strong>ID:</strong> {{ $movie->id }}</div>

                    <a href="{{ route('movies.index') }}" class="back-link">&larr; Back to Movie List</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
