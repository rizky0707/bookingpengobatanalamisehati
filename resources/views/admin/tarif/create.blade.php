@extends('layouts.app')
@section('title', 'Create Tarif')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Biaya Pendaftaran Create </h3>
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
                <h4 class="card-title">Create Biaya Pendaftaran</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('tarif.store')}}">
                    @csrf
                  <div class="form-group">
                    <label for="name">Nominal</label>
                    <input type="number" name="nominal" value="{{old('nominal')}}" class="form-control" id="nominal" placeholder="Nominal">
                    @if($errors->has('nominal'))
                    <small id="emailHelp" class="form-text text-warning">{{ $errors->first('nominal') }}</small>
                    @endif
                  </div>
                  {{-- <div class="row">
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
                  </div> --}}
                
                    
                    {{-- <div class="form-group">
                      <label>Terapis</label>
                        <select class="form-control productname" name="id_doctor" id="id_doctor">
                          <option value="0" disabled="true" selected="true">Terapis</option>
                        </select>
                        @if($errors->has('id_doctor'))
                        <small id="emailHelp" class="form-text text-warning">{{ $errors->first('id_doctor') }}</small>
                    @endif
                    </div> --}}
                  
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
{{-- <script>
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


</script> --}}

@endsection
