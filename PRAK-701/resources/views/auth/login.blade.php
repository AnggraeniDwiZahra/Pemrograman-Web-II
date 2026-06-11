<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Arutala</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header h2 {
            color: #0d6efd;
            margin-bottom: 5px;
            font-weight: 700;
        }
        .login-header p {
            color: #6c757d;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #333;
        }
        .input-wrapper {
            position: relative;
        }
        .input-wrapper i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        .form-control {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #0d6efd;
            outline: none;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            background: #0d6efd;
            border: none;
            color: white;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn-login:hover {
            background: #0b5ed7;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-left: 4px solid #dc3545;
            color: #842029;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .btn-back {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #6c757d;
            text-decoration: none;
        }
        .btn-back:hover {
            color: #0d6efd;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-header">
            <h2>Perpustakaan Arutala</h2>
            <p>Silakan masuk menggunakan akun pengguna</p>
        </div>

        @if($errors->has('loginError'))
            <div class="alert-danger">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>{{ $errors->first('loginError') }}</span>
            </div>
        @endif

        @if(session('unauthenticated'))
            <div class="alert-danger">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>{{ session('unauthenticated') }}</span>
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf 
            
            <div class="form-group">
                <label for="email">Email Pengguna</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" class="form-control" id="email" placeholder="contoh: admin@perpus.com" value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
                </div>
            </div>

            <button type="submit" class="btn-login">
                <i class="fa-solid fa-right-to-bracket"></i> Masuk
            </button>
        </form>

        <a href="{{ route('landing') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
    </div>

</body>
</html>
