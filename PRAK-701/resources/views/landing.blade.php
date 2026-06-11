<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Perpustakaan Arutala</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        header {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
            color: #3b82f6;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            letter-spacing: 0.5px;
        }

        .logo i {
            color: #f59e0b;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        nav a {
            text-decoration: none;
            color: #64748b;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        nav a:hover, nav a.active {
            color: #3b82f6;
        }

        .btn-login {
            background: #3b82f6;
            color: #ffffff !important;
            padding: 10px 26px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
        }

        .btn-login:hover {
            background: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(59, 130, 246, 0.3);
        }

        .hero-container {
            flex: 1;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: center;
            gap: 60px;
        }

        .hero-content {
            max-width: 560px;
        }

        .badge {
            display: inline-block;
            background: rgba(59, 130, 246, 0.08);
            color: #3b82f6;
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-content h1 {
            font-size: 46px;
            line-height: 1.25;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 20px;
        }

        .hero-content h1 span {
            color: #3b82f6;
        }

        .hero-content p {
            font-size: 16px;
            line-height: 1.65;
            color: #475569;
            margin-bottom: 35px;
        }

        .cta-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .btn-primary {
            text-decoration: none;
            background: #0f172a;
            color: #ffffff;
            padding: 14px 32px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #1e293b;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.25);
        }

        .hero-image {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .hero-image img {
            width: 100%;
            height: 480px;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        @media (max-width: 968px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                padding-top: 20px;
                padding-bottom: 60px;
                gap: 40px;
            }
            .hero-content {
                max-width: 100%;
                order: 2;
            }
            .hero-image {
                order: 1;
            }
            .hero-image img {
                height: 320px;
            }
            .cta-buttons {
                justify-content: center;
            }
            .hero-content h1 {
                font-size: 34px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <a href="#" class="logo">
            <i class="fa-solid fa-book-bookmark"></i> Arutala Lib
        </a>
        <nav>
            <a href="{{ route('landing') }}" class="active">Home</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('buku.index') }}">Data Buku</a>
            
            @auth
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-login" style="border: none; font-size: 15px; cursor: pointer;">Keluar</button>
               </form>
            @else
                <a href="{{ route('login') }}" class="btn-login">Masuk</a>
            @endauth
        </nav>
    </header>

    <div class="hero-container">
        
        <div class="hero-content">
            <span class="badge">Sistem Informasi Perpustakaan</span>
            <h1>Membaca Buku Kini Lebih <span>Mudah</span> & Teratur</h1>
            <p>Selamat datang di Perpustakaan Arutala. Platform digital terintegrasi untuk mempermudah manajemen sirkulasi buku, pendataan member aktif, hingga pemantauan transaksi sirkulasi peminjaman secara real-time.</p>
            
            <div class="cta-buttons">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-primary">Buka Dashboard <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i></a>
                @else
                    <a href="{{ route('login') }}" class="btn-primary">Mulai Sekarang <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i></a>
                @endauth
            </div>
        </div>

        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1000&auto=format&fit=cover" alt="Foto Perpustakaan Arutala">
        </div>

    </div>

</body>
</html>
