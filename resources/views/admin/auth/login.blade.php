<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Matri Seva Samiti</title>
    <link rel="shortcut icon" href="{{ asset(config('site.favicon', 'logo/Logo.png')) }}" type="image/x-icon">
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #0b1a30 0%, #081324 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 440px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .login-header {
            background: linear-gradient(135deg, #0F2B5B 0%, #173f80 100%);
            padding: 32px 24px;
            text-align: center;
            color: #ffffff;
        }

        .login-header img {
            height: 52px;
            background: #ffffff;
            padding: 6px;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .login-header h4 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .login-header p {
            font-size: 0.85rem;
            opacity: 0.8;
            margin-bottom: 0;
        }

        .login-body {
            padding: 32px 28px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
        }

        .form-control:focus {
            border-color: #0F2B5B;
            box-shadow: 0 0 0 3px rgba(15, 43, 91, 0.15);
        }

        .btn-login {
            background: linear-gradient(135deg, #E35E25 0%, #f37740 100%);
            color: #ffffff;
            font-weight: 700;
            padding: 12px;
            border-radius: 12px;
            border: none;
            width: 100%;
            font-size: 1rem;
            box-shadow: 0 4px 15px rgba(227, 94, 37, 0.35);
            transition: all 0.2s ease;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #c94c1a 0%, #e35e25 100%);
            color: #ffffff;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <img src="{{ asset(config('site.logo', 'logo/Logo.png')) }}" alt="Matri Seva Samiti Logo">
            <h4>Matri Seva Samiti</h4>
            <p>Admin Portal Sign In</p>
        </div>

        <div class="login-body">
            @if(session('info'))
                <div class="alert alert-info py-2 px-3 small rounded-3 mb-3">
                    {{ session('info') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger py-2 px-3 small rounded-3 mb-3">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label font-weight-600 small text-muted">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 rounded-start-3"><i class="bi bi-envelope text-muted"></i></span>
                        <input type="email" name="email" class="form-control border-start-0 rounded-end-3" placeholder="admin@matrisevasamiti.org" value="{{ old('email', 'admin@matrisevasamiti.org') }}" required autofocus>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label font-weight-600 small text-muted">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 rounded-start-3"><i class="bi bi-lock text-muted"></i></span>
                        <input type="password" name="password" class="form-control border-start-0 rounded-end-3" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                        <label class="form-check-label small text-muted" for="rememberMe">Remember me</label>
                    </div>
                    <a href="{{ route('home') }}" class="small text-decoration-none text-muted">Back to website</a>
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Log In
                </button>
            </form>
        </div>
    </div>

</body>
</html>
