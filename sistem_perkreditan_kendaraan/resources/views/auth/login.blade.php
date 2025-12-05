<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f0f2f5;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 400px;
        }
    </style>
</head>

<body>

    <div class="card shadow login-card">
        <div class="card-body">
            <h3 class="text-center mb-4">Login</h3>

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password"
                        class="form-control"
                        name="password"
                        id="password"
                        required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Login
                </button>

                <div class="text-center mt-3">
                    <small>Belum punya akun? <a href="{{ route('register.form') }}">Daftar di sini</a></small>
                </div>
            </form>

        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>