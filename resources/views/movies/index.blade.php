{{-- resources/views/movies/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Blerti's Cinema - Movies List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: #ff6600;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: 600;
        }
        .card:hover {
            box-shadow: 0 8px 20px rgba(255,102,0,0.4);
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        .btn-primary, .btn-success, .btn-warning, .btn-info, .btn-danger {
            border-radius: 20px;
        }
        footer {
            background-color: #222;
            color: #bbb;
            padding: 15px 0;
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Blerti's Cinema</a>
        <div>
            @if(auth()->check())
                <span class="text-white me-3">Hello, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register</a>
            @endif
        </div>
    </div>
</nav>

<div class="container my-5">
    <h1 class="mb-4 text-center text-secondary">Movies List</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if($isAdmin)
        <div class="mb-4 text-end">
            <a href="{{ route('movies.create') }}" class="btn btn-primary">+ Add New Movie</a>
        </div>
    @endif

    <div class="row g-4">
        @forelse($movies as $movie)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    @if($movie->movie_image)
                        <img src="{{ asset('images/movies/' . $movie->movie_image) }}"
                             class="card-img-top" alt="{{ $movie->movie_name }}"
                             style="height: 300px; object-fit: cover;">
                    @else
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="300" xmlns="http://www.w3.org/2000/svg"
                             role="img" aria-label="No image available" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>No image available</title>
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em" text-anchor="middle">No image</text>
                        </svg>
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">{{ $movie->movie_name }}</h5>
                        <p class="card-text flex-grow-1">{{ \Illuminate\Support\Str::limit($movie->movie_desc, 120) }}</p>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item"><strong>Quality:</strong> {{ $movie->movie_quality }}</li>
                            <li class="list-group-item"><strong>Rating:</strong> {{ $movie->movie_rating }}</li>
                        </ul>

                        <div class="mt-auto">
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-sm btn-info me-1">View</a>

                            @if($isAdmin)
                                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this movie?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            @else
                                <a href="{{ route('booking.create', $movie->id) }}" class="btn btn-sm btn-success">Book</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">No movies found.</p>
        @endforelse
    </div>
</div>

<footer>
    &copy; {{ date('Y') }} Blerti's Cinema. All rights reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>