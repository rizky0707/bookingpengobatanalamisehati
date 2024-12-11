@extends('layouts.app')
@section('title', 'Create Anamnesa')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Anamnesa Create </h3>
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
                <h4 class="card-title">Create Anamnesa</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('rawatJalan.store')}}">
                    @csrf
                    @foreach($booking_details as $booking)
                    <input type="hidden" name="booking_id" value="{{ $booking['booking_id'] }}">
                    <input type="hidden" name="user_id" value="{{ $booking['user_id'] }}">
                  @endforeach
                  
                  <div class="form-group">
                    <label for="tensi">Tensi </label>
                    <input type="text" name="tensi" value="{{old('tensi')}}" class="form-control" id="tensi" placeholder="Cek Tensi">
                    @if($errors->has('tensi'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('tensi') }}</small>
                  @endif            
                  </div>
                  <div class="form-group">
                    <label for="gula_darah">Gula Darah </label>
                    <input type="text" name="gula_darah" value="{{old('gula_darah')}}" class="form-control" id="gula_darah" placeholder="Cek Gula Darah">
                    @if($errors->has('gula_darah'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('gula_darah') }}</small>
                  @endif            
                  </div>  
                  <div class="form-group">
                    <label for="asam_urat">Asam Urat </label>
                    <input type="text" name="asam_urat" value="{{old('asam_urat')}}" class="form-control" id="asam_urat" placeholder="Cek Asam Urat">
                    @if($errors->has('asam_urat'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('asam_urat') }}</small>
                  @endif            
                  </div>  
                  <div class="form-group">
                    <label for="kolesterol">Kolesterol </label>
                    <input type="text" name="kolesterol" value="{{old('kolesterol')}}" class="form-control" id="kolesterol" placeholder="Cek Kolesterol">
                    @if($errors->has('kolesterol'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('kolesterol') }}</small>
                  @endif            
                  </div>     
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" name="cek_anamnesa" value="approve_anamnesa" class="form-check-input"> Setujui Anamnesa </label>
                        @if($errors->has('cek_anamnesa'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('cek_anamnesa') }}</small>
                  @endif   
                    </div>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                </form>
              </div>
            </div>
          </div>
    </div>
  </div>
@endsection
