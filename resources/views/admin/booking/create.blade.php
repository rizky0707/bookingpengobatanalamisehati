@extends('layouts.app')
@section('title', 'Create Booking')   

@section('content')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> --}}
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Booking Create </h3>
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
                <h4 class="card-title">Create Booking</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('booking.store')}}">
                    @csrf

                  <div class="form-group">
                    <label for="nama">Nama</label>
                      <select name="nama" class="form-control theSelect" required>
                        <option value="0" class="form-control">--Pilih Nama--</option>
                        @foreach ($user as $item) 
                        <option value="{{$item->name}}" class="form-control">{{$item->name}}</option>
                        @endforeach
                        @if($errors->has('nama'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('nama') }}</small>
                    @endif
                    </select>
                  </div>
                  <div class="row">
                    <div class="col">
                  <div class="form-group">
                    <label for="name">No HP</label>
                    <input type="number" name="nohp" class="form-control" id="name" placeholder="No HP">
                    @if($errors->has('nohp'))
                    <small id="emailHelp" class="form-text text-warning">{{ $errors->first('nohp') }}</small>
                @endif
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="jam">Jam</label>
                    <input type="time" name="jam" class="form-control" id="jam" placeholder="jam">
                    @if($errors->has('jam'))
                    <small id="emailHelp" class="form-text text-warning">{{ $errors->first('jam') }}</small>
                @endif
                  </div>
                </div>
                  </div>
                  
                  <div class="row">
                  <div class="col">
                  <div class="form-group">
                    <label>Kategori</label>
                      <select class="form-control productcategory" name="id_category" id="sub_category_name">
                        <option value="0" disabled selected>Select
                          Main Category*</option>
                        @foreach($category_service as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                      </select>
                      @if($errors->has('id_category'))
                      <small id="emailHelp" class="form-text text-warning">{{ $errors->first('id_category') }}</small>
                  @endif
                  </div>
                </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Pelayanan</label>
                        <select class="form-control productname" name="id_service" id="sub_category">
                          <option value="0" disabled="true" selected="true">Pelayanan</option>
                        </select>
                        @if($errors->has('id_service'))
                        <small id="emailHelp" class="form-text text-warning">{{ $errors->first('id_service') }}</small>
                    @endif
                    </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Dokter</label>
                      <select class="form-control productname" name="id_doctor" id="id_doctor">
                        <option value="0" disabled="true" selected="true">Dokter</option>
                      </select>
                      @if($errors->has('id_doctor'))
                      <small id="emailHelp" class="form-text text-warning">{{ $errors->first('id_doctor') }}</small>
                  @endif
                  </div>

                  <div class="form-group">
                    <label for="name">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="name" placeholder="Name">
                    @if($errors->has('tanggal'))
        <small id="emailHelp" class="form-text text-warning">{{ $errors->first('id_service') }}</small>
    @endif
                  </div>
                  
                      <div class="form-group">
                        <label for="nohp">Alamat</label>
                        <textarea name="alamat" id="" class="form-control" cols="30" rows="10"></textarea>
                        @if($errors->has('alamat'))
                        <small id="emailHelp" class="form-text text-warning">{{ $errors->first('alamat') }}</small>
                    @endif
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
  $(document).ready(function () {

  $('#sub_category_name').on('change', function () {
  let id = $(this).val();
  $('#sub_category').empty();
  $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
  $.ajax({
  type: 'GET',
  url: '../../GetService/' + id,
  success: function (response) {
  var response = JSON.parse(response);
  console.log(response);   
  $('#sub_category').empty();
  $('#sub_category').append(`<option value="0" disabled selected>Select Sub Category*</option>`);
  response.forEach(element => {
      $('#sub_category').append(`<option value="${element['id']}">${element['pelayanan']}</option>`);
      });
  }
 });
});
 $('#sub_category').on('change', function () {
  let id = $(this).val();
 $('#id_doctor').empty();
  $('#id_doctor').append(`<option value="0" disabled selected>Processing...</option>`);
  $.ajax({
  type: 'GET',
  url: '../../GetDoctor/' + id,
  success: function (response) {
  var response = JSON.parse(response);
  console.log(response);   
  $('#id_doctor').empty();
  $('#id_doctor').append(`<option value="0" disabled selected>Select Name Doctor*</option>`);
  response.forEach(element => {
      $('#id_doctor').append(`<option value="${element['id']}">${element['name']}</option>`);
      });
  }
 });
 });
 });


</script>

<script>
  $(".theSelect").select2();
</script>

@endsection
