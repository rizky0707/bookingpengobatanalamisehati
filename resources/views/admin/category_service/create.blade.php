@extends('layouts.app')
@section('title', 'Create Category')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Category Create </h3>
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
                <h4 class="card-title">Create Category</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('category_services.store')}}">
                    @csrf
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name" placeholder="Name">
                    @if($errors->has('name'))
                <small id="emailHelp" class="form-text text-warning">{{ $errors->first('name') }}</small>
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
