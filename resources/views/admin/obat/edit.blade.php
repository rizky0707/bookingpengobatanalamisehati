@extends('layouts.app')
@section('title', 'Edit Obat')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Obat Edit </h3>
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
                <form class="forms-sample" method="POST" action="{{route('obat.update', $obat->id)}}">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label for="nama_obat">Nama Obat</label>
                    <input type="text" name="nama_obat" value="{{ $obat->nama_obat }}" class="form-control" id="nama_obat" placeholder="Nama Obat">
                    @if($errors->has('nama_obat'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('nama_obat') }}</small>
                  @endif            
                  </div>  
                  <div class="form-group">
  
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $obat->deskripsi }}</textarea>
                    @if($errors->has('nama_obat'))
                    <small id="emailHelp" class="form-text text-warning">{{ $errors->first('deskripsi') }}</small>
                    @endif 
                    </div>     
                  <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" value="{{ $obat->stok }}" class="form-control" id="stok" placeholder="stok">
                    @if($errors->has('stok'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('stok') }}</small>
                  @endif            
                  </div> 
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" value="{{ $obat->harga }}" class="form-control" id="harga" placeholder="harga">
                    @if($errors->has('harga'))
                  <small id="emailHelp" class="form-text text-warning">{{ $errors->first('harga') }}</small>
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
