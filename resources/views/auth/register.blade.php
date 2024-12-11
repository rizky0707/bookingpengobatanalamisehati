<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - Pengobatan Alami Sehati</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/admin/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/admin/assets/images/logo-real.png')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{asset('assets/admin/assets/images/logo-real.png')}}">
                </div>
                <h4>Daftar Disini</h4>
                <h6 class="font-weight-light">Register. Hello! sobat Alami Sehati</h6>
                <form class="pt-3" method="POST" action="{{ route('register') }}">
                    @csrf
                  <div class="form-group">
                    <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" id="exampleInputUsername1" placeholder="Nama Lengkap">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
                </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}"  id="exampleInputEmail1" placeholder="Email">
                    <span>contoh : alamisehati@pas.com </span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
                </div>

                <div class="form-group position-relative">
                  <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password" placeholder="Password">
                  <i class="mdi mdi-eye-off password-toggle-icon" id="togglePassword" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer;"></i>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                <div class="form-group position-relative">
                  <input type="password" name="password_confirmation" class="form-control form-control-lg" value="{{ old('password_confirmation') }}" id="password_confirmation" placeholder="Confirm Password">
                  
                </div>
                
                
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Setuju dengan segala Peraturan </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                        {{ __('REGISTER') }}
                    </button>  
                </div>
                  <div class="text-center mt-4 font-weight-light"> Sudah punya akun? <a href="{{route('login')}}" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <script>
  document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const icon = this;
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      icon.classList.remove('mdi-eye-off');
      icon.classList.add('mdi-eye');
    } else {
      passwordField.type = 'password';
      icon.classList.remove('mdi-eye');
      icon.classList.add('mdi-eye-off');
    }
  });

</script>

    
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets/admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/misc.js')}}"></script>
    <!-- endinject -->
  </body>
</html>