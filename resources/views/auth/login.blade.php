<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
        }
        .login-form {
            width: 50%; /* Default width for medium/large screens */
            max-width: 600px; /* Optional cap for very large screens */
            background-color: #f8f9fa; /* Matches header color */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
            .login-form {
                width: 90%; /* Adjust for smaller screens */
            }
        }
    </style>
</head>
<body>
    @include('layouts.header')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-form">
            <h1 class="text-center text-primary">Login</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
