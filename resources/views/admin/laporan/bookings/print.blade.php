<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Print Laporan Reservasi</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <style>
      body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
      }
      .container {
          width: 100%;
          max-width: 800px;
          margin: 0 auto;
            /* border: 1px solid #ddd;
            padding: 20px; */
          position: relative;
      }
      .header {
          display: flex;
          justify-content: space-between;
          align-items: center;
      }
      .title {
          font-size: 18px;
          font-weight: bold;
      }
      .address {
          font-size: 14px;
          color: #555;
      }
      .logo {
          width: 100px;
          height: auto;
      }
      .footer {
          text-align: center;
          margin-top: 40px;
          font-size: 14px;
          color: #555;
      }
      .footer a {
          color: #007BFF;
          text-decoration: none;
      }
      .footer a:hover {
          text-decoration: underline;
      }
      .divider {
          margin: 20px 0;
          border-top: 1px solid #ddd;
      }
  </style>
</head>
<body class="bg-grey" onload="window.print();">

  <div class="container">
    <div class="header">
        <div>
            <div class="title">PENGOBATAN ALAMI SEHATI</div>
            <div class="address">Ruko Notredame, Jl. Deltamas Boulevard No 20</div>
        </div>
        <img src="{{asset('assets/admin/assets/images/logo-print.png')}}" alt="Logo Pengobatan Alami Sehati" class="logo">
    </div>
    <h5 align="center"><b><u>LAPORAN DATA BOOKING</u></b></h5>
              <center><p>Tanggal : {{date('d M Y', strtotime($start_date))}} - {{date('d M Y', strtotime($end_date))}}</p></center>
              <br><br>
              <table id="example" class="table table-bordered table-responsive">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> Nama</th>
                    <th> No HP</th>
                    <th> Pelayanan </th>
                    <th> Jam </th>
                    <th> Tanggal </th>
                    <th> Status </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no= 1; ?>
                  @foreach ($bookings as $item)   
                  <td> {{$no++}} </td>
                    <td> {{$item->nama}} </td>
                    <td> {{$item->nohp}}</td>
                    <td> {{$item->pelayanan}}</td>
                    <td> {{$item->jam}}</td>
                    <td>{{date('d-M-y', strtotime($item->tanggal))}}</td>
  
                    <td> @if($item->status == "pending")
                      <?php
                        $date_now = date("Y-m-d");
                        $tgl_exp = $item->tanggal;
                        $date_now_plus = date("Y-m-d", strtotime('+1 days', strtotime($tgl_exp)));
  
                        ?>
                        @if($date_now >= $date_now_plus)
                        <span class="badge badge-gradient-danger">Expired
                          @else 
                          <span class="badge badge-gradient-info">           
                          {{$item->status}}
                        </span>
  
                          @endif
                      
                    @elseif($item->status == "success")
                    <span class="badge badge-warning">
                      {{$item->status}}
                      </span>
                      @else
                      <span class="badge badge-danger">
                        {{$item->status}}
                        </span>
                        @endif
                    </td>
                    
                  </tr>
                  @endforeach
  
                </tbody>
              </table>
    
    <div class="divider">
    </div>

    <div class="footer">
      <img src="http://localhost:8000/assets/admin/assets/images/garis-bawah.png" width="300px" alt="Logo Pengobatan Alami Sehati" class="logo" style="
    width: 200px;
">
      <br>
        +62 857-1592-9099 <br>
       pengobatanalamisehati@gmail.com<br>
        www.pengobatanalamisehati.com
    </div>
</div>
  </body>
</html>
