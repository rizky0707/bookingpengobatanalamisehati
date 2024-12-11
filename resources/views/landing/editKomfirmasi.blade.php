@extends('welcome')
@section('title', 'Show Booking')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Update Komfirmasi </h3>
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
                <h4 class="card-title">Update Komfirmasi</h4>
                <p class="card-description"> PAS </p>
                  <div class="row">
                    <div class="col">
                      <label for="name">Apakah Anda Datang ?</label>
                    </div>
                    <div class="col">
                        <form method="POST" action="{{route('updateKomfirmasi', $edit->id)}}" >
                            @csrf
                            @method('PUT')
                        <div class="form-group">
                        <div class="form-group form-check-inline">
                          <input class="form-check-input" type="radio" name="komfirmasi" id="exampleRadios1" value="ya" {{ $edit->komfirmasi == 'ya' ? 'checked' : ''}}>
                          <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-group form-check-inline">
                          <input class="form-check-input" type="radio" name="komfirmasi" id="exampleRadios1" value="tidak" {{ $edit->komfirmasi == 'tidak' ? 'checked' : ''}}>
                          <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                    </div>
                    </div>             
                  </div>
                </div>
                      <button type="submit" class="btn btn-block  btn-primary">Submit</button>
                    </form>

              </div>
            </div>
          </div>
    
    </div>
  
@endsection
@section('script')
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

@endsection
