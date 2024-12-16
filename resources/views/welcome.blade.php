<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - Pengobatan Alami Sehati</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/css/vendor.bundle.base.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/admin/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/admin/assets/images/logo.png')}}" />
    <style>
      .alert-css {
        display: none; /* Default: disembunyikan */
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        background-color: #f8d7da; /* Warna merah muda untuk alert */
        color: #721c24; /* Warna teks merah gelap */
        padding: 15px 20px;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        font-size: 16px;
        box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
      }
    </style>
    
    
    @yield('style')
  </head>
  <body>

    {{-- <!-- Modal untuk melengkapi profil -->
<div class="modal fade" id="profileIncompleteModal" tabindex="-1" role="dialog" aria-labelledby="profileIncompleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileIncompleteModalLabel">Profil Belum Lengkap</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Mohon lengkapi profil Anda untuk menggunakan semua fitur aplikasi dengan optimal.
      </div>
      <div class="modal-footer">
        <a href="{{route('indexUser')}}" class="btn btn-primary">Lengkapi Profil</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div> --}}

<div id="profileAlert" class="alert-css">
  <a href="{{route('indexUser')}}"> 
    Anda belum lengkap. Mohon lengkapi untuk menggunakan semua fitur aplikasi dengan optimal.
  </a>
</div>

    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="#">PAS</a>
          {{-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/admin/assets/images/logo-mini.svg')}}" alt="logo" /></a> --}}
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          
          <ul class="navbar-nav navbar-nav-right">
           
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{asset('assets/admin/assets/images/faces/face1.jpg')}}" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  @foreach($welcomeUser as $item)
                  @if($item->nik == "" || $item->no_hp == "" || $item->jenis_kelamin == "" || $item->tempat == "" || $item->tanggal_lahir == "" || $item->alamat == "")
                  <p class="mb-1 text-black">{{ Auth::user()->name }}
                    <span class="badge badge-pill badge-danger">1</span>
                  @else 
                  <p class="mb-1 text-black">{{ Auth::user()->name }}
                    @endif
                  @endforeach                      

                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{route('indexUser')}}">
                  
                  @foreach($welcomeUser as $item)
                  @if($item->nik == "" || $item->no_hp == "" || $item->jenis_kelamin == "" || $item->tempat == "" || $item->tanggal_lahir == "" || $item->alamat == "")
                  <i class="mdi mdi-account mr-2 text-success"></i> 
                  Profile
                  <span class="badge badge-pill badge-danger">1</span>
                  @else 
                  <i class="mdi mdi-account mr-2 text-success"></i> 
                  Profile
                    @endif
                  @endforeach 
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();" 
                                 {{ __('Logout') }} data-toggle="modal" data-target="#logoutModal">
                                    <i class="mdi mdi-logout mr-2 text-primary"></i>
                                    Signout
                                </a>
              
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
              </div>
            </li>
           
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{asset('assets/admin/assets/images/faces/face1.jpg')}}" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                  <span class="font-weight-bold mb-2">{{ Auth::user()->no_rm }}</span>
                  <span class="text-secondary text-small">Member</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('indexUserKomfir')}}">
                <span class="menu-title">Pembayaran</span>
                <i class="mdi mdi-cash menu-icon"></i>
                
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('userLanding')}}">
                <span class="menu-title">History</span>
                <i class="mdi mdi-calendar-multiple-check menu-icon"></i>
              </a>
            </li>
           
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3"></h6>
                </div>
              
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            @yield('content')

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © PAS</span>
              {{-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates </a> from Bootstrapdash.com</span> --}}
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        // Periksa data pengguna dari server-side atau variabel Blade
        @foreach($welcomeUser as $item)
          @if($item->nik == "" || $item->no_hp == "" || $item->jenis_kelamin == "" || $item->tempat == "" || $item->tanggal_lahir == "" || $item->alamat == "")
            // Tampilkan alert secara permanen
            const alertBox = document.getElementById('profileAlert');
            alertBox.style.display = 'block';
          @endif
        @endforeach
      });
    </script>
    
    

    
    <!-- plugins:js -->
    <script src="{{asset('assets/admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets/admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('assets/admin/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/todolist.js')}}"></script>
    <!-- End custom js for this page -->


    {{-- <script>
      $(document).ready(function() {
  // Periksa data pengguna melalui server-side atau variabel dari Blade
  @foreach($welcomeUser as $item)
    @if($item->nik == "" || $item->no_hp == "" || $item->jenis_kelamin == "" || $item->tempat == "" || $item->tanggal_lahir == "" || $item->alamat == "")
      // Tampilkan modal jika data tidak lengkap

      // Delay the modal popup by 3 seconds
      setTimeout(function() {
          $('#profileIncompleteModal').modal('show');
        }, 2000); // 1000 milliseconds = 1 seconds

      $('#profileIncompleteModal').modal({
        backdrop: 'static', // Modal tidak bisa ditutup dengan klik di luar
        keyboard: false      // Menonaktifkan tombol ESC
      });
    @endif
  @endforeach
});
    </script> --}}
    @yield('script')
    
  </body>
</html>