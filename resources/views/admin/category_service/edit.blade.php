@extends('layouts.app')
@section('title', 'Edit Category')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Category Edit </h3>
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
                <h4 class="card-title">Edit Category</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('category_services.update', $edit->id)}}">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$edit->name}}" class="form-control" id="name" placeholder="Name">
                    @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                    @endforeach
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
