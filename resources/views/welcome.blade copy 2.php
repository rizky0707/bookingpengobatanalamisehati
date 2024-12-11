<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pengobatan Alami Sehati - Home</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- javascript -->

    <!-- css -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="{{asset('assets/landing/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/landing/css/slider.css')}}" />
  </head>
  <body>
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
          <img
            src="https://uploads.codesandbox.io/uploads/user/8e41599d-1575-4a05-b4b9-4673af3feb4f/f808-logo+klinik+baru-01.png"
            width="150"
            height="150"
            class="d-inline-block align-top"
            alt="logo"
            id="logo"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto w-100 justify-content-center">
            <li class="nav-item active">
              <a class="nav-link" href="#" style="font-size: 1.33rem;">
                Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="font-size: 1.33rem;"
                >About Us</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="font-size: 1.33rem;"
                >Services</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="font-size: 1.33rem;"
                >Contact Us</a
              >
            </li>
          </ul>
          @if (Route::has('login'))
              @auth
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{route('userLanding')}}">Dashboard</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();" 
                                 {{ __('Logout') }} data-toggle="modal" data-target="#logoutModal">
                                    Logout
                                </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    </div>
                  </li>
              @else
              <a href="{{route('login')}}" class="btn btn-lg btn-outline-success mr-2">Login</a>

                  @if (Route::has('register'))
                  <a href="{{route('register')}}" class="btn btn-lg btn-outline-danger">Daftar</a>
                  @endif
              @endauth
      @endif
        </div>
      </div>
    </nav>

    <!-- navbar -->

    <!-- banner Image -->

    {{-- content --}}
    @yield('content')
    <!-- end content -->

    <!-- footer -->
    <footer class="footer-area footer--light">
      <div class="footer-big">
        <!-- start .container -->
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-12">
              <div class="footer-widget">
                <div class="widget-about">
                  <img src="https://uploads.codesandbox.io/uploads/user/8e41599d-1575-4a05-b4b9-4673af3feb4f/f808-logo+klinik+baru-01.png" alt="" class="img-fluid" />

                  <ul class="contact-details">
                    <li>
                      <span class="icon-earphones"></span> Call Us:
                      <a href="tel:344-755-111">344-755-111</a>
                    </li>
                    <li>
                      <span class="icon-envelope-open"></span>
                      <a href="mailto:support@aazztech.com"
                        >support@aazztech.com</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Ends: .footer-widget -->
            </div>
            <!-- end /.col-md-4 -->
            <div class="col-md-3 col-sm-4">
              <div class="footer-widget">
                <div class="footer-menu footer-menu--1">
                  <h4 class="footer-widget-title">Popular Category</h4>
                  <ul>
                    <li>
                      <a href="#">Wordpress</a>
                    </li>
                    <li>
                      <a href="#">Plugins</a>
                    </li>
                    <li>
                      <a href="#">Joomla Template</a>
                    </li>
                    <li>
                      <a href="#">Admin Template</a>
                    </li>
                    <li>
                      <a href="#">HTML Template</a>
                    </li>
                  </ul>
                </div>
                <!-- end /.footer-menu -->
              </div>
              <!-- Ends: .footer-widget -->
            </div>
            <!-- end /.col-md-3 -->

            <div class="col-md-3 col-sm-4">
              <div class="footer-widget">
                <div class="footer-menu">
                  <h4 class="footer-widget-title">Our Company</h4>
                  <ul>
                    <li>
                      <a href="#">About Us</a>
                    </li>
                    <li>
                      <a href="#">How It Works</a>
                    </li>
                    <li>
                      <a href="#">Affiliates</a>
                    </li>
                    <li>
                      <a href="#">Testimonials</a>
                    </li>
                    <li>
                      <a href="#">Contact Us</a>
                    </li>
                    <li>
                      <a href="#">Plan &amp; Pricing</a>
                    </li>
                    <li>
                      <a href="#">Blog</a>
                    </li>
                  </ul>
                </div>
                <!-- end /.footer-menu -->
              </div>
              <!-- Ends: .footer-widget -->
            </div>
            <!-- end /.col-lg-3 -->

            <div class="col-md-3 col-sm-4">
              <div class="footer-widget">
                <div class="footer-menu no-padding">
                  <h4 class="footer-widget-title">Help Support</h4>
                  <ul>
                    <li>
                      <a href="#">Support Forum</a>
                    </li>
                    <li>
                      <a href="#">Terms &amp; Conditions</a>
                    </li>
                    <li>
                      <a href="#">Support Policy</a>
                    </li>
                    <li>
                      <a href="#">Refund Policy</a>
                    </li>
                    <li>
                      <a href="#">FAQs</a>
                    </li>
                    <li>
                      <a href="#">Buyers Faq</a>
                    </li>
                    <li>
                      <a href="#">Sellers Faq</a>
                    </li>
                  </ul>
                </div>
                <!-- end /.footer-menu -->
              </div>
              <!-- Ends: .footer-widget -->
            </div>
            <!-- Ends: .col-lg-3 -->
          </div>
          <!-- end /.row -->
        </div>
        <!-- end /.container -->
      </div>
      <!-- end /.footer-big -->

      <div class="mini-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="copyright-text">
                <p>
                  © 2022 <a href="#home">Pengobatan Alami Sehati</a>. All rights
                  reserved. Created by
                  <a href="#">Kembangin</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>

  <!-- script jquery -->

  <script
    src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
    crossorigin="anonymous"
  ></script>
  @yield('script')
</html>
