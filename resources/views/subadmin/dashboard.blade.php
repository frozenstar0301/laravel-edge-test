<!-- resources/views/subadmin/dashboard.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>SubAdmin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    @include('layouts.header')

    <div class="container mt-5">
        <h1>SubAdmin Dashboard</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <h2>Manage Users</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if ($user->id !== auth()->user()->id && $user->role !== 'admin') <!-- Hide actions for logged-in user -->
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <!-- Update Role -->
                                <form method="POST" action="/subadmin/users/{{ $user->id }}/role" class="d-inline">
                                    @csrf
                                    <select name="role" class="form-select d-inline w-auto">
                                        <option value="normal" {{ $user->role === 'normal' ? 'selected' : '' }}>Normal</option>
                                        <option value="subadmin" {{ $user->role === 'subadmin' ? 'selected' : '' }}>SubAdmin</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-primary">Update Role</button>
                                </form>

                                <!-- Delete User -->
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">Delete</button>

                                <!-- Modal for Deletion Confirmation -->
                                <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this user?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form method="POST" action="{{ route('subadmin.users.delete', $user) }}" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
