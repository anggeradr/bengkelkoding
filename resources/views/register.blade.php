<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Aplikasi</title>

  <!-- Include your CSS -->
  @include('layouts.lib.ext-css')
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Bengkel</b>Koding</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Silahkan Register</p>

        <!-- Form Register -->
        <form action="{{ route('register') }}" method="post">
          @csrf
          <div class="input-group mb-3">
          <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
          <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ old('alamat') }}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-home"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
          <input type="text" name="no_hp" class="form-control" placeholder="No HP" value="{{ old('no_hp') }}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-8">
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Include JS -->
  @include('layouts.lib.ext-js')
</body>
</html>
