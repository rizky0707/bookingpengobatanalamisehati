@extends('welcome')
@section('title', 'Show Booking')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Booking Show </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Show Booking</h4>
                <p class="card-description"> PAS </p>
                  <div class="row">
                    <div class="col">
                      <label for="name">Nama</label>
                    </div>
                    <div class="col">
                      <p>{{$show_booking->nama}}</p>
                    </div>
                  </div>
                
                  <div class="row">
                    <div class="col">
                      <label for="name">No HP</label>
                    </div>
                  <div class="col">
                    <p>{{$show_booking->nohp}}</p>
                </div>
                </div>

                <div class="row">
                  <div class="col">
                    <label for="nohp">Alamat</label>
                  </div>
                  <div class="col">
                    <p>{{$show_booking->alamat}}</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <label for="jam">Tanggal</label>
                  </div>
                  <div class="col">
                    <p>{{ \Carbon\Carbon::parse($show_booking->tanggal)->locale('id')->isoFormat('D MMMM YYYY') }}</p>

                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <label for="jam">Jam</label>
                  </div>
                  <div class="col">
                    <p>{{$show_booking->jam}}</p>
                  </div>
                </div>
                
                  <div class="row">
                  <div class="col">
                    <label>Pelayanan</label>
                  </div>
                  <div class="col"> 
                    <p>{{$show_booking->pelayanan}}</p>     
                  </div>
                </div>
                

                <div class="row">
                  <div class="col">
                    <label for="nohp"><b>Biaya Pendaftaran</b></label>
                  </div>
                  <div class="col">
                    <p><b>@currency($show_booking->nominal)</b></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <label for="nohp">Status</label>
                
                  </div>
                  <div class="col">
                    <p>
                      {{-- {{$show_booking->alamat}} --}}
                      @if($show_booking->status == "pending")
                      <?php
                        $date_now = date("Y-m-d");
                        $tgl_exp = $show_booking->tanggal;
                        ?>
                        @if($date_now >= $tgl_exp)
                          <span class="badge badge-gradient-danger">Expired
                          @else 
                          <span class="badge badge-gradient-info">           
                          {{$show_booking->status}}
                          @endif
                      
                    </span>
                    @elseif($show_booking->status == "success")
                    <span class="badge badge-warning">
                      {{$show_booking->status}}
                      </span>
                      @else
                      <span class="badge badge-danger">
                        {{$show_booking->status}}
                        </span>
                        @endif
                    </p>
                
                  </div>
                  
                </div>
                      <a href="{{route('userLanding')}}" class="btn btn-block  btn-primary">Kembali</a>
                    
              </div>
            </div>
          </div>
    
    </div>
  </div>
@endsection
@section('script')
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

@endsection
