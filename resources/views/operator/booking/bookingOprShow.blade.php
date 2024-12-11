@extends('operatorApp')
@section('title', 'Edit Booking')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Booking Edit </h3>
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
                      <p>{{$show_booking_operator->nama}}</p>
                    </div>
                  </div>
                
                  <div class="row">
                    <div class="col">
                      <label for="name">No HP</label>
                    </div>
                  <div class="col">
                    <p>{{$show_booking_operator->nohp}}</p>
                </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="jam">Jam</label>
                  </div>
                  <div class="col">
                    <p>{{$show_booking_operator->jam}}</p>
                  </div>
                </div>
                  <div class="row">
                  <div class="col">
                    <label>Kategori</label>
                  </div>
                  <div class="col"> 
                    <p>{{$show_booking_operator->category->name}}</p>     
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                      <label>Pelayanan</label>
                  </div>
                  <div class="col">
                      <p>{{$show_booking_operator->service->pelayanan}}</p>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label>Dokter</label>
                    </div>
                    <div class="col">
                      <p>{{$show_booking_operator->doctor->name}}</p>
                    </div>
                  </div>
                <div class="row">
                  <div class="col">
                    <label for="name">Tanggal</label>
                
                  </div>
                  <div class="col">
                    <p>{{$show_booking_operator->tanggal}}</p>
                
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="nohp">Alamat</label>
                
                  </div>
                  <div class="col">
                    <p>{{$show_booking_operator->alamat}}</p>
                
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col">
                    <label for="nohp">Status</label>
                
                  </div>
                  <div class="col">
                    <p>
                      {{-- {{$show_booking_operator->alamat}} --}}
                      @if($show_booking_operator->status == "pending")
                      <?php
                        $date_now = date("Y-m-d");
                        $tgl_exp = $show_booking_operator->tanggal;
                        ?>
                        @if($date_now >= $tgl_exp)
                          <span class="badge badge-gradient-danger">Expired
                          @else 
                          <span class="badge badge-gradient-info">           
                          {{$show_booking_operator->status}}
                          @endif
                      
                    </span>
                    @elseif($show_booking_operator->status == "success")
                    <span class="badge badge-warning">
                      {{$show_booking_operator->status}}
                      </span>
                      @else
                      <span class="badge badge-danger">
                        {{$show_booking_operator->status}}
                        </span>
                        @endif
                    </p>
                
                  </div>
                  
                </div>
                      <a href="{{route('bookingOpr')}}" class="btn btn-block  btn-primary">Kembali</a>
                    
              </div>
            </div>
          </div>
    
    </div>
  </div>
@endsection
@section('script')
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

@endsection
