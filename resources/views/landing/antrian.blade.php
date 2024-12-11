@extends('welcome')
@section('title', 'Show Booking')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Komfirmasi </h3>
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
                @if ($message = Session::get('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Berhasil !</strong> {{ $message }}.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                <h4 class="card-title">Komfirmasi Booking</h4>
                <p class="card-description"> PAS </p>
                {{-- <div class="col-md-4"></div>
                <div class="col-md-4">
                    <center><a href="{{route('bookingLanding')}}" class="btn btn-primary btn-sm">Booking Dulu YUU!</a></center>
                </div>
                <div class="col-md-4"></div> --}}
                  <div class="row">
                    @if($count_komfirmasi < 1)
                      <div class="col-md-4"></div>
                      <div class="col-md-4">
                          <center><a href="{{route('bookingLanding')}}" class="btn btn-primary btn-sm">Booking Dulu YUU!</a></center>
                      </div>
                      <div class="col-md-4"></div>
                    @else
                   
                    @foreach ($show_komfirmasi as $item)
                    <div class="col">
                        <label for="name">Apakah Anda Datang ?</label>
                      </div>
                      <div class="col">
                        {{-- <p>{{$item->komfirmasi}}</p> --}}
                        <div class="form-group">
                          
                          <div class="form-group form-check-inline">
                            <input class="form-check-input" type="radio" name="komfirmasi" id="exampleRadios1" value="ya" {{ $item->komfirmasi == 'ya' ? 'checked' : ''}} disabled >
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                          </div>
                          <div class="form-group form-check-inline">
                            <input class="form-check-input" type="radio" name="komfirmasi" id="exampleRadios1" value="tidak" {{ $item->komfirmasi == 'tidak' ? 'checked' : ''}} disabled>
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                          </div>
                      </div>
                      </div>       
                    </div>
                </div>
                      <a href="{{route('editKomfirmasi', $item->id)}}" class="btn btn-block  btn-primary">Update</a>
                      @endforeach
                    @endif   
              </div>
            </div>
          </div>
    </div>
@endsection
@section('script')
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
@endsection
