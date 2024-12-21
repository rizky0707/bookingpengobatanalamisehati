@extends('layouts.app')
@section('title', 'Update Setting')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Update Settings </h3>
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
                <form class="forms-sample" method="POST" action="{{route('setting.update', $edit->id)}}">
                    @csrf
                    @method('PUT')
                    
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" value="{{$edit->title}}" name="title" class="form-control" id="title" required>
                    @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <small id="emailHelp" class="form-text text-warning">title harus lebih 2 huruf</small>
                    @endforeach
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="tagline">Tagline</label>
                    <input type="text" value="{{$edit->tagline}}" name="tagline" class="form-control" id="title" required>
                    @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <small id="emailHelp" class="form-text text-warning">tagline harus lebih 2 huruf</small>
                    @endforeach
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" value="{{$edit->link}}" name="link" class="form-control" id="link" required>
                    @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <small id="emailHelp" class="form-text text-warning">link harus lebih 2 huruf</small>
                    @endforeach
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="wa">No Wa</label>
                    <input type="number" value="{{$edit->wa}}" name="wa" class="form-control" id="title" required>
                    <small id="emailHelp" class="form-text text-warning">Contoh 081574706XXX</small>
                  </div>

                  <div class="form-group">
                    <label for="nama_bank">Nama Bank</label>
                    <input type="text" value="{{$edit->nama_bank}}" name="nama_bank" class="form-control" id="title" required>
                    <small id="emailHelp" class="form-text text-warning">Contoh BCA</small>
                  </div>

                  <div class="form-group">
                    <label for="nama_rek">Nama Rekening</label>
                    <input type="text" value="{{$edit->nama_rek}}" name="nama_rek" class="form-control" id="title" required>
                    <small id="emailHelp" class="form-text text-warning">Contoh PT xxx </small>
                  </div>

                  <div class="form-group">
                    <label for="no_rek">Nomor Rekening</label>
                    <input type="number" value="{{$edit->no_rek}}" name="no_rek" class="form-control" id="title" required>
                    <small id="emailHelp" class="form-text text-warning">Contoh PT xxx </small>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                </form>
              </div>
            </div>
          </div>
    
    </div>
  </div>
@endsection
