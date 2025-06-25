{{-- resources/views/booking/book.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Book Movie - {{ $movie->movie_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .booking-container {
            max-width: 600px;
            margin: 60px auto;
            background: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        h1 {
            color: #ff6600;
            margin-bottom: 25px;
            font-weight: 700;
        }
        label {
            font-weight: 600;
            margin-top: 15px;
        }
        .btn-primary {
            border-radius: 30px;
            padding: 10px 40px;
            font-weight: 600;
            background-color: #ff6600;
            border: none;
        }
        .btn-primary:hover {
            background-color: #e65c00;
        }
        .movie-desc {
            background: #fff3e0;
            padding: 15px;
            border-radius: 8px;
            color: #663300;
            font-style: italic;
            margin-bottom: 20px;
            box-shadow: inset 0 0 10px #ffcc80;
        }
        a.back-link {
            display: inline-block;
            margin-top: 20px;
            color: #555;
            text-decoration: none;
            font-weight: 500;
        }
        a.back-link:hover {
            text-decoration: underline;
            color: #ff6600;
        }
    </style>
</head>
<body>

<div class="booking-container">
    <h1>Book: {{ $movie->movie_name }}</h1>

    <div class="movie-desc">
        <strong>Description:</strong> {{ $movie->movie_desc }}
    </div>

    <form action="{{ route('booking.store') }}" method="POST" novalidate>
        @csrf
        <input type="hidden" name="movie_id" value="{{ $movie->id }}">

        <div class="mb-3">
            <label for="date" class="form-label">Select Date</label>
            <input type="date" id="date" name="date" class="form-control" required
                   min="{{ date('Y-m-d') }}" />
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Select Time</label>
            <input type="time" id="time" name="time" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="tickets" class="form-label">Number of Tickets</label>
            <input type="number" id="tickets" name="tickets" class="form-control" min="1" max="10" value="1" required />
        </div>

        <button type="submit" class="btn btn-primary w-100">Book Now</button>
    </form>

    <a href="{{ route('movies.index') }}" class="back-link">&larr; Back to Movies</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
