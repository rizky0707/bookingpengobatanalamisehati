<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <title>Dashboard User</title>
    <style>
      .hoverbox:hover{
        color: blue;
      }
    </style>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Dashboard User</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
      </div>
    </div>
    {{-- <div class="row"> --}}
      <div class="container">
      <div class="row">
      <div class="col-3">
        <div class="card" style="width: 16rem;">
          <div class="row">
          <div class="col-4">
            <img class="rounded-circle" width="65px" src="https://mitrakeluarga.s3.ap-southeast-1.amazonaws.com/images/doctor/thumb/1127_54_drg-arlan-akbari.jpg" alt="Card image cap" style="
            margin-left: 15px;
            margin-top: 30px;
            margin-bottom: 20px;
        ">
        </div>
        <div class="col-4" style="
        margin-left: 10px;
        margin-top: 30px;
        margin-bottom: 20px;
        padding-left: 5px;
    ">
          <b>Rizky</b>
          <p>Member</p>
        </div>
      </div>
          <div class="card-body">
            <img src="{{asset('assets/landing/img/event.png')}}" width="25px" alt=""> <a class="card-text font-weight" href="{{url('/dashboarduser')}}">Reservasi</a>
            <hr>
            <img src="{{asset('assets/landing/img/notif.png')}}" width="25px" alt=""> <a class="card-text" href="{{url('/dashboardnotifikasi')}}">Notifikasi</a>
            <hr>
            <img src="{{asset('assets/landing/img/laporan.png')}}" width="25px" alt=""> <a class="card-text" href="{{url('/dashboardlaporan')}}">Laporan</a>
          </div>
        </div>

      </div>
      <div class="col-8">
        <h3>Overview</h3>
        <a href="" style="text-decoration: none; color:black;">
        <div class="shadow-sm p-3 mb-5 bg-white rounded hoverbox">
          <div class="row">
            <div class="col-9 col-md-4">
              <div class="row">
                <div class="col">
                  <h5>Nama Dokter</h5> 
                  <span class="text-h45 text-72 opacity-50">15 Feb 2022</span> 
                  <span class="project-status success ml-2 d-md-none"></span>
                </div></div> 
                <div class="row d-md-none">
                  <div class="col-6"><h6 class="text-3c opacity-50">Nominal Donasi</h6> 
                    <h6><strong>Rp. 10.000,00</strong></h6>
                  </div> 
                  <div class="col-6">
                    <h6 class="text-3c opacity-50">Tanggal</h6> 
                    <h6><strong>15 Feb 2022</strong></h6>
                  </div>
                </div>
              </div> 
              <div class="col-2 d-none d-md-block"><h5 class="text-3c opacity-50">Pelayanan</h5> 
                <b><strong>Rp. 10.000,00</strong></b></div> 
                <div class="col-2 d-none d-md-block"><h5 class="text-3c opacity-50">Jam</h5> 
                  <b><strong>09.00 - 18.00</strong></b></div> 
                  <div class="col-4 d-none d-md-block"><h5 class="text-3c opacity-50 mb10">Status</h5> 
                    <span class="project-status">Kadaluwarsa</span></div></div>
       
      </div>
      <div class="shadow-sm p-3 mb-5 bg-white rounded hoverbox">
        <div class="row">
          <div class="col-9 col-md-4">
            <div class="row">
              <div class="col">
                <h5>Nama Dokter</h5> 
                <span class="text-h45 text-72 opacity-50">15 Feb 2022</span> 
                <span class="project-status success ml-2 d-md-none"></span>
              </div></div> 
              <div class="row d-md-none">
                <div class="col-6"><h6 class="text-3c opacity-50">Nominal Donasi</h6> 
                  <h6><strong>Rp. 10.000,00</strong></h6>
                </div> 
                <div class="col-6">
                  <h6 class="text-3c opacity-50">Tanggal</h6> 
                  <h6><strong>15 Feb 2022</strong></h6>
                </div>
              </div>
            </div> 
            <div class="col-2 d-none d-md-block"><h5 class="text-3c opacity-50">Pelayanan</h5> 
              <b><strong>Rp. 10.000,00</strong></b></div> 
              <div class="col-2 d-none d-md-block"><h5 class="text-3c opacity-50">Jam</h5> 
                <b><strong>09.00 - 18.00</strong></b></div> 
                <div class="col-4 d-none d-md-block"><h5 class="text-3c opacity-50 mb10">Status</h5> 
                  <span class="project-status">Kadaluwarsa</span></div></div>
     
    </div>
    
    </a>
    </div>
  </div>
    </div>
      </div>
    {{-- </div> --}}

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  
  </body>
</html>