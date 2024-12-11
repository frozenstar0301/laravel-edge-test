<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts.header')

    <div class="container mt-5">
        <h1>User Dashboard</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <p>Welcome, {{ Auth::user()->name }}!</p>
        <p>Your email: {{ Auth::user()->email }}</p>

        <div class="mt-4">
            <h2>Your Details</h2>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>{{ ucfirst(Auth::user()->role) }}</td>
                </tr>
            </table>
        </div>

        <div class="mt-4">
            <h2>Available Features</h2>
            <ul>
                <li>View personal details</li>
                <li>Update your profile (coming soon!)</li>
                <li>More features will be added here...</li>
            </ul>
        </div>
    </div>
</body>
</html>
