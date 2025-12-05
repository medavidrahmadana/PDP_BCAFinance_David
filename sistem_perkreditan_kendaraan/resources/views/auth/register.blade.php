<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Akun Baru</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f4f4f4; display: grid; place-items: center; min-height: 90vh; }
        form { width: 400px; padding: 20px; background: #fff; border-radius: 8px; }
        h1 { text-align: center; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background: #28a745; color: white; border: none; cursor: pointer; width: 100%; }
        .error { color: red; font-size: 0.9em; }
        .error-box { background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; }
    </style>
</head>
<body>

    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <h1>Register Akun</h1>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password (min. 8 karakter)</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <div>
            <button type="submit">Register</button>
        </div>

    </form>

</body>
</html>