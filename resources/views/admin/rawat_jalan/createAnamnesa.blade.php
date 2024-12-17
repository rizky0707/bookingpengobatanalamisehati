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
                <div class="row">
                  <div class="col">
                  <h4 class="card-title">Create Anamnesa</h4>
                </div>
                <div class="col">
                    <h4 class="card-title" align="right">                
                      <span class="badge badge-pill badge-dark">
                      <b>{{$rawatJalan_edit->user->no_rm}}</b>
                    </span>
                    </h4>
                  
                </div>
                </div>

                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('rawatJalan.update', $rawatJalan_edit->id)}}">
                    @csrf
                    @method('PUT')
                    <b>{{$rawatJalan_edit->user->name}}</b> :
                    {{-- <span>{{\Carbon\Carbon::parse($rawatJalanDiagnosa->user->tanggal_lahir)->age}} tahun<span> --}}
                   <span class="badge badge-info">
                    Umur
                    (
                      {{\Carbon\Carbon::parse($rawatJalan_edit->user->tanggal_lahir)->age}} tahun
                    )
                  </span>
                  <p class="pt-2"></p>
                  <div class="form-group">
                    <label for="tensi">Tensi </label>
                    <input type="text" name="tensi" value="{{ $rawatJalan_edit->tensi }}" class="form-control" id="tensi" placeholder="Cek Tensi">
                    @if($errors->has('tensi'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('tensi') }}</small>
                  @endif            
                  </div>
                  <div class="form-group">
                    <label for="gula_darah">Gula Darah </label>
                    <input type="text" name="gula_darah" value="{{ $rawatJalan_edit->gula_darah }}" class="form-control" id="gula_darah" placeholder="Cek Gula Darah">
                    @if($errors->has('gula_darah'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('gula_darah') }}</small>
                  @endif            
                  </div>  
                  <div class="form-group">
                    <label for="asam_urat">Asam Urat </label>
                    <input type="text" name="asam_urat" value="{{ $rawatJalan_edit->asam_urat }}" class="form-control" id="asam_urat" placeholder="Cek Asam Urat">
                    @if($errors->has('asam_urat'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('asam_urat') }}</small>
                  @endif            
                  </div>  
                  <div class="form-group">
                    <label for="kolesterol">Kolesterol </label>
                    <input type="text" name="kolesterol" value="{{ $rawatJalan_edit->kolesterol }}" class="form-control" id="kolesterol" placeholder="Cek Kolesterol">
                    @if($errors->has('kolesterol'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('kolesterol') }}</small>
                  @endif            
                  </div>     
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" name="cek_anamnesa" value="approve_anamnesa" {{ $rawatJalan_edit->cek_anamnesa == 'approve_anamnesa' ? 'checked' : '' }}  class="form-check-input"> Setujui Anamnesa </label>
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
