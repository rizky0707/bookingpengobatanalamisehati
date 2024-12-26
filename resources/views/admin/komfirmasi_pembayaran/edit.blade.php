@extends('layouts.app')
@section('title', 'Edit Komfirmasi Pembayaran')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Komfirmasi Pembayaran Edit </h3>
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
                <h4 class="card-title">Edit Komfirmasi Pembayaran</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('komfirmasiPembayaran.update', $edit->id)}}">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label for="nama_pengirim">Nama Pengirim</label>
                    <input type="text" name="nama_pengirim" value="{{$edit->nama_pengirim}}" class="form-control" id="nama_pengirim" placeholder="Nama Pengirim" readonly>
                  </div>
                  <div class="form-group">
                    <label for="nomor_rekening_pengirim">Nomor Rekening Pengirim</label>
                    <input type="text" name="nomor_rekening_pengirim" value="{{$edit->nomor_rekening_pengirim}}" class="form-control" id="nomor_rekening_pengirim" placeholder="Nama Pengirim" readonly>
                  </div>
                  <div class="form-group">
                    <label for="nomor_rekening_pengirim">Bukti Pembayaran</label>
                    <br>
                    <img src="../../../../{{$edit->bukti_pembayaran}}" width="20%">
                  </div>
                  
                  <div class="form-group">
                    <label for="name">Status</label>
                    <br>
                    <div class="form-group form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="checking" {{ $edit->status == 'checking' ? 'checked' : ''}}>
                      <label class="form-check-label" for="inlineRadio1">Checking</label>
                    </div>
                    <div class="form-group form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="success" {{ $edit->status == 'success' ? 'checked' : ''}}>
                      <label class="form-check-label" for="inlineRadio2">Success</label>
                    </div>
                    <div class="form-group form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="tester" {{ $edit->status == 'tester' ? 'checked' : ''}}>
                      <label class="form-check-label" for="inlineRadio2">
                    <span class="badge badge-info">Tester</span>
                      </label>
                    </div>
                </div>
                  <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                  {{-- <button class="btn btn-light">Cancel</button> --}}
                </form>
              </div>
            </div>
          </div>
    
    </div>
  </div>
@endsection
@section('script')
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>


@endsection
