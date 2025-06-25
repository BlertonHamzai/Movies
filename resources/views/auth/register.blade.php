<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register | Blerti's Cinema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(to right, #ff6600, #ff9966);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-box {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .register-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #ff6600;
        }

        .form-control {
            border-radius: 25px;
            padding: 12px 20px;
        }

        .btn-register {
            background-color: #ff6600;
            color: #fff;
            font-weight: 600;
            border-radius: 25px;
            padding: 10px 0;
            transition: 0.3s ease;
        }

        .btn-register:hover {
            background-color: #e65c00;
        }

        .logo-text {
            font-size: 32px;
            font-weight: bold;
            color: #333;
        }

        .footer-link {
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="register-box">
    <div class="text-center mb-4">
        <div class="logo-text">🎬 Blerti's Cinema</div>
    </div>

    <h3 class="register-title text-center">Create Your Account</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Full Name" required>
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-register">Register</button>
        </div>

        <div class="text-center footer-link">
            Already have an account?
            <a href="{{ route('login') }}" class="text-decoration-none text-primary">Login here</a>
        </div>
    </form>
</div>

</body>
</html>
