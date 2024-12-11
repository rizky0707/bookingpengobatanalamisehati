<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <title>Dashboard User</title>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Laporan User</h1>
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
      <div class="col-4">
        <h3>Laporan</h3>
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <div class="dashboard-statistics">
            <div class="row">
              <div class="col-8 col-md-5"><img width="100%" src="https://nucare.id/_nuxt/img/donatur.f32c1cb.png" class="lazyLoad isLoaded"></div> 
              <div class="col-8 col-md-7"><h2 class="text-primary">0</h2> <h5 class="text-72">Reservasi</h5>
            </div>
            </div>
          </div>
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
      </div>
      <div class="col-8">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    </div>
      
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  
  </body>
</html>