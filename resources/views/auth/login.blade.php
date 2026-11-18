<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login - SIKAP Sawit</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .auth-card {
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      padding: 40px 35px;
    }
    .btn-sawit {
      background-color: #2e7d32;
      border-color: #2e7d32;
      color: #fff;
      font-weight: 600;
      padding: 12px;
      border-radius: 8px;
    }
    .btn-sawit:hover {
      background-color: #1b5e20;
      color: #fff;
    }
    .form-control {
      border-radius: 8px;
      padding: 12px 15px;
      height: auto;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 col-lg-4">
        <div class="auth-card">
          <div class="text-center mb-4">
            <span class="badge badge-success px-3 py-1 mb-2" style="font-size: 13px; letter-spacing: 1px;">LOGIN</span>
            <h3 class="font-weight-bold text-success mb-1">SIKAP SAWIT</h3>
            <p class="text-muted small mb-0">Sistem Informasi K3 Perkebunan Kelapa Sawit</p>
          </div>

          @if($errors->any())
            <div class="alert alert-danger py-2">
              <small>{{ $errors->first() }}</small>
            </div>
          @endif

          <form action="{{ route('login.post') }}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
              <label class="small font-weight-bold text-muted">Alamat Email</label>
              <input type="email" name="email" class="form-control" placeholder="nama@sikapsawit.com" value="{{ old('email', $rememberedEmail ?? '') }}" autocomplete="off" required autofocus>
            </div>
            <div class="form-group mb-3">
              <label class="small font-weight-bold text-muted">Kata Sandi</label>
              <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi" autocomplete="new-password" required>
            </div>
            <div class="form-group form-check mb-4">
              <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ !empty($rememberedEmail) ? 'checked' : '' }}>
              <label class="form-check-label small text-muted" for="remember">Ingat saya (Cookie)</label>
            </div>
            <button type="submit" class="btn btn-sawit btn-block">MASUK</button>
          </form>

          <div class="text-center mt-4">
            <small class="text-muted">Belum punya akun?
              <a href="{{ route('register') }}" class="text-success font-weight-bold">Register di sini</a>
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>