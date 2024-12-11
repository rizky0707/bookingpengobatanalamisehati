@extends('layouts.app')
@section('title', 'Create Obat')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Obat Create </h3>
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
                <h4 class="card-title">Create Obat</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('obat.store')}}">
                    @csrf
                  <div class="form-group">
                    <label for="nama_obat">Nama Obat</label>
                    <input type="text" name="nama_obat" value="{{old('nama_obat')}}" class="form-control" id="nama_obat" placeholder="Nama Obat">
                    @if($errors->has('nama_obat'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('nama_obat') }}</small>
                  @endif            
                  </div>    
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="jumlah" value="{{old('jumlah')}}" class="form-control" id="jumlah" placeholder="Jumlah">
                    @if($errors->has('jumlah'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('jumlah') }}</small>
                  @endif            
                  </div>   
                  <div class="form-group">
                    <label for="expired">Expired</label>
                    <input type="date" name="expired" value="{{old('expired')}}" min="{{ \Carbon\Carbon::today()->toDateString() }}" @guest readonly @endguest class="form-control" id="expired" placeholder="Tanggal Expired">
                    @if($errors->has('expired'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('expired') }}</small>
                  @endif            
                  </div>              
                  <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                </form>
              </div>
            </div>
          </div>
    </div>
  </div>
@endsection
