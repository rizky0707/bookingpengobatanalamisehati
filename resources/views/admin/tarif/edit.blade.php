@extends('layouts.app')
@section('title', 'Edit Tarif')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Tarif Edit</h3>
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
                <h4 class="card-title">Edit Tarif</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('tarif.update', $edit->id)}}">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="number" value="{{$edit->nominal}}" name="nominal" class="form-control" id="nominal" placeholder="Nominal">
                    @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                    @endforeach
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
                        <option value="{{$cat->id}}" {{$cat->id == $edit->id_category ? 'selected' : ''}}>{{$cat->name}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Pelayanan</label>
                        <select class="form-control productname" name="id_service" id="sub_category">
                          <option value="0" disabled="true" selected="true">Pelayanan</option>
                          @foreach($service as $item)
                          <option value="{{$item->id}}" {{$item->id == $edit->id_service ? 'selected' : ''}}>{{$item->pelayanan}}</option>
                        @endforeach
                        </select>
                    </div>
                    </div>
                  </div> --}}
                  
                  {{-- <div class="form-group">
                    <label>Dokter</label>
                      <select class="form-control productname" name="id_doctor" id="id_doctor">
                        <option value="0" disabled="true" selected="true">Dokter</option>
                        @foreach ($doctor as $item)
                        <option value="{{$item->id}}" {{$item->id == $edit->id_doctor ? 'selected' : ''}}>{{$item->name}}</option>
                      @endforeach
                      </select>
                  </div> --}}
                  
                  <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
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
