@extends('welcome')
@section('title', 'Show Pembayaran')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Pembayaran Show </h3>
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
                <h4 class="card-title">Show Pembayaran</h4>
                <p class="card-description"> PAS </p>
                  <div class="row">
                    <div class="col">
                      <label for="name">Pelayanan</label>
                    </div>
                    <div class="col">
                      <p>{{$show_pembayaran->booking->pelayanan}}</p>
                    </div>
                  </div>
                
                  <div class="row">
                    <div class="col">
                      <label for="name">Nama Pengirim</label>
                    </div>
                  <div class="col">
                    <p>{{$show_pembayaran->nama_pengirim}}</p>
                </div>
                </div>

                <div class="row">
                  <div class="col">
                    <label for="nohp">Nomor Rekening Pengirim</label>
                  </div>
                  <div class="col">
                    <p>{{$show_pembayaran->nomor_rekening_pengirim}}</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <label for="jam">Bukti Pembayaran</label>
                  </div>
                  <div class="col">
                    <p><img src="../{{$show_pembayaran->bukti_pembayaran}}" width="50%"></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <label for="jam">Status</label>
                  </div>
                  <div class="col">
                    <p>@if($show_pembayaran->status == "checking") 
                      <span class="badge badge-gradient-danger">Checking
                      @else
                      <span class="badge badge-warning">Success
                        @endif
                      </p>
                  </div>
                </div>

                  
                  
                </div> 
                      <a href="{{route('indexUserKomfir')}}" class="btn btn-block  btn-primary">Kembali</a>
                    
              </div>
            </div>
          </div>
    
    </div>
  </div>
@endsection
@section('script')
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

@endsection
