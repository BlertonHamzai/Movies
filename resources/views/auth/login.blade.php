<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Blerti's Cinema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(to right, #ff6600, #ff9966);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .login-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #ff6600;
        }

        .form-control {
            border-radius: 25px;
            padding: 12px 20px;
        }

        .btn-login {
            background-color: #ff6600;
            color: #fff;
            font-weight: 600;
            border-radius: 25px;
            padding: 10px 0;
            transition: 0.3s ease;
        }

        .btn-login:hover {
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

<div class="login-box">
    <div class="text-center mb-4">
        <div class="logo-text">🎬 Blerti's Cinema</div>
    </div>

    <h3 class="login-title text-center">Welcome Back</h3>

    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email Address" required autofocus>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-login">Log In</button>
        </div>

        <div class="text-center footer-link">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-decoration-none text-primary">Register here</a>
        </div>
    </form>
</div>

</body>
</html>
