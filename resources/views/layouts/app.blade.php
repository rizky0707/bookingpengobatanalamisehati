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
    <link rel="shortcut icon" href="{{asset('assets/admin/assets/images/logo-real.png')}}" />
    @yield('style')
  </head>
  <body>
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
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              {{-- <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div> --}}
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            {{-- <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                  <span class="count-symbol bg-danger"></span>
                </a> --}}
                
                {{-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-calendar"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-1">Booking(nomor rm) - tanggal</h6>
                      <p class="text-gray ellipsis mb-0"> nama lengkap </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-warning">
                        <i class="mdi mdi-settings"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-1">Pembayaran(nomor Rekening) - tanggal</h6>
                      <p class="text-gray ellipsis mb-0"> nama Rekening  </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-info">
                        <i class="mdi mdi-link-variant"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-1">User(username)</h6>
                      <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                </div> --}}

              </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{asset('assets/admin/assets/images/faces/face1.jpg')}}" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-account mr-2 text-success"></i> Profile 
                </a>
                {{-- <a class="dropdown-item" href="#">
                  <i class="mdi mdi-settings mr-2 text-success"></i> Settings 
                </a> --}}
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
            {{-- <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li> --}}
            {{-- <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('assets/admin/assets/images/faces/face4.jpg')}}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('assets/admin/assets/images/faces/face2.jpg')}}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('assets/admin/assets/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li> --}}
            
            {{-- <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li> --}}
            {{-- <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li> --}}
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
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.home')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-bookings" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Bookings 
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-calendar-multiple-check menu-icon"></i>
              </a>
              <div class="collapse" id="ui-bookings">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> 
                    <a class="nav-link" href="{{route('booking.index')}}">Booking 
                      @if($bookings_countApp > 0)
                      <span class="badge badge-pill badge-danger" id="bookingCount">{{$bookings_countApp}}</span>
                      @else
                      <span class="badge badge-pill badge-danger" id="bookingCount"></span></span>
                      @endif  
                    </a>
                  </li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('komfirmasiPembayaran.index')}}">Pembayaran
                    @if($pembayarans_countApp > 0)
                    <span class="badge badge-pill badge-danger" id="pembayaransCount">{{$pembayarans_countApp}}</span>
                    @else
                    <span class="badge badge-pill badge-danger" id="pembayaransCount"></span></span>
                    @endif  
                  </a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-rawat" aria-expanded="false" aria-controls="ui-basic" >
                <span class="menu-title">Rawat Jalan</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-switch menu-icon"></i>
              </a>
              <div class="collapse" id="ui-rawat">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link"  href="{{route('rawatJalan.index')}}">Rekam Medis</a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link"  href="{{route('indexKartuRekamMedis')}}">Kartu Rekam Medis</a></li>
                </ul>
               
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-obat" aria-expanded="false" aria-controls="ui-basic" >
                <span class="menu-title">Obat</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="ui-obat">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link"  href="{{route('obat.index')}}">Data Obat  </a></li>
                </ul>
                {{-- <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#">Terapis</a></li>
                </ul> --}}
              </div>
            </li>
            
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-donations" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Services</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-package-down menu-icon"></i>
              </a>
              <div class="collapse" id="ui-donations">
                {{-- <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('category_services.index')}}">Category Services</a></li>
                </ul> --}}
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('service.index')}}">Health Services</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-terapis" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Biaya</span>
                <i class="menu-arrow"></i>
                <i class="mdi  mdi-cash menu-icon"></i>
              </a>
              <div class="collapse" id="ui-terapis">
                {{-- <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('doctor.index')}}">Terapis</a></li>
                </ul> --}}
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('tarif.index')}}">Biaya Pendaftaran</a></li>
                </ul>
              </div>
            </li>

            
            
           
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-manage" aria-expanded="false" aria-controls="ui-basic" >
                <span class="menu-title">Manage Users</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-multiple-outline menu-icon"></i>
              </a>
              <div class="collapse" id="ui-manage">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link"  href="{{route('manageusers')}}">Member</a></li>
                </ul>
                {{-- <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#">Terapis</a></li>
                </ul> --}}
              </div>
            </li>
            

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-laporan" aria-expanded="false" aria-controls="ui-laporan" >
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-download-outline menu-icon"></i>
              </a>
              
              <div class="collapse" id="ui-laporan">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link"  href="{{route('laporan_booking')}}">Booking</a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('laporan_biaya_pendaftaran')}}">Biaya Pendaftaran</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/setting/1/edit')}}">
                <span class="menu-title">Settings</span>
                <i class="mdi mdi-settings menu-icon"></i>
              </a>
            </li>
            
            {{-- <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-report" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Report</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-arrow-down-bold-circle menu-icon"></i>
              </a>
              <div class="collapse" id="ui-report">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('laporan_booking')}}">Report Booking</a></li>
                </ul>
              </div>
            </li> --}}
            
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
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Pengobatan Alami Sehati</span>
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
    <!-- plugins:js -->
    <script>
      // Utility function to fetch and cache data
      async function fetchAndCacheData(url, cacheKey, interval = 5000) {
        try {
          const response = await fetch(url); // Fetch data from the server
          const data = await response.json(); // Parse JSON response
    
          // Cache data in localStorage
          localStorage.setItem(cacheKey, JSON.stringify({
            value: data,
            timestamp: Date.now()
          }));
    
          return data;
        } catch (error) {
          console.error(`Error fetching ${cacheKey}:`, error);
          
          // Use cached data if available
          const cachedData = localStorage.getItem(cacheKey);
          if (cachedData) {
            const { value } = JSON.parse(cachedData);
            return value;
          }
          
          return null; // Fallback in case of an error
        }
      }
    
      // Function to update booking count
      async function updateBookingCount() {
        const data = await fetchAndCacheData('/path-to-get-booking-count', 'bookingCountCache');
        if (data) {
          document.getElementById('bookingCount').textContent = data.bookings_countApp;
        }
      }
    
      // Function to update payment count
      async function updatePaymentCount() {
        const data = await fetchAndCacheData('/path-to-get-pembayaran-count', 'paymentCountCache');
        if (data) {
          const paymentCount = data.pembayarans_countApp;
          document.getElementById('pembayaransCount').textContent = paymentCount;
    
          // Play sound logic
          if (isUserInteracted && paymentCount > 0 && !soundPlayed) {
            playSound();
            soundPlayed = true;
          } else if (paymentCount === 0) {
            soundPlayed = false;
          }
        }
      }
    
      // Set interval to update data
      setInterval(updateBookingCount, 5000);
      setInterval(updatePaymentCount, 5000);
    
      // Play notification sound
      function playSound() {
        const audio = new Audio('{{ asset("assets/admin/assets/sounds/payment-notification.MP3") }}');
        audio.play().catch((error) => console.error('Error playing sound:', error));
      }
    
      // Track user interaction
      let soundPlayed = false;
      let isUserInteracted = false;
      document.body.addEventListener('click', () => isUserInteracted = true);
    
      // Initial data load
      updateBookingCount();
      updatePaymentCount();
    </script>
    
    
    
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
    @yield('script')
    
    
  </body>
</html>