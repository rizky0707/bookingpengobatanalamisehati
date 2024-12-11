@extends('layouts.app')
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
                <h4 class="card-title">Edit Booking</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('booking.update', $edit->id)}}">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="nama" value="{{$edit->nama}}" class="form-control" id="name" placeholder="Name" readonly>
                    {{-- @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                    @endforeach
                    @endif --}}
                  </div>
                  <div class="row">
                    <div class="col">
                  <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="number" value="{{$edit->nohp}}" name="nohp" class="form-control" id="nohp" placeholder="No HP" readonly>
                    {{-- @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                    @endforeach
                    @endif --}}
                  </div>
                </div>
                <div class="col">
                <div class="form-group">
                  <label for="nohp">Alamat</label>
                  <textarea name="alamat" id="" class="form-control" cols="30" rows="1" readonly>{{$edit->alamat}}</textarea>
                  {{-- @if(count($errors) > 0)
                  @foreach ($errors->all() as $error)
                  <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                  @endforeach
                  @endif --}}
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" value="{{$edit->tanggal}}" name="tanggal" class="form-control" id="tanggal" placeholder="Name" readonly>
              {{-- @if(count($errors) > 0)
              @foreach ($errors->all() as $error)
              <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
              @endforeach
              @endif --}}
            </div>
          </div>
                <div class="col">
                  <div class="form-group">
                    <label for="jam">Jam</label>
                    <input type="time" value="{{$edit->jam}}" name="jam" class="form-control" id="jam" placeholder="jam" readonly>
                    {{-- @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                    @endforeach
                    @endif --}}
                  </div>
                </div>
                  </div>

                  <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Pelayanan</label>
                      <input type="text" value="{{$edit->pelayanan}}" name="pelayanan" class="form-control" id="jam" placeholder="jam" readonly>

                    </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Biaya Administrasi</label>
                        <input type="text" name="nominal" value="@currency($edit->nominal)" class="form-control" id="nominal" placeholder="nominal" readonly>
                        {{-- @if(count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                        @endforeach --}}
                      </div>
                      </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="name">Status</label>
                    <br>
                    <div class="form-group form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="pending" {{ $edit->status == 'pending' ? 'checked' : ''}}>
                      <label class="form-check-label" for="inlineRadio1">Pending</label>
                    </div>
                    <div class="form-group form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="success" {{ $edit->status == 'success' ? 'checked' : ''}}>
                      <label class="form-check-label" for="inlineRadio2">Success</label>
                    </div>
                    
                </div>

                <div class="form-group">
                  <label for="nohp">Keluhan</label>
                  <textarea name="alamat" id="" class="form-control" cols="30" rows="10" readonly>{{$edit->keluhan}}</textarea>
                  {{-- @if(count($errors) > 0)
                  @foreach ($errors->all() as $error)
                  <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                  @endforeach
                  @endif --}}
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
