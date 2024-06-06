<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #03774A;
            border-bottom: 1px solid #e0e0e0;
            padding: 1rem;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
            border-radius: 4px;
            padding: 0.5rem;
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #03774A;
            border-color: #03774A;
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #025d37;
            border-color: #025d37;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Change Password</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('post-change-password') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>