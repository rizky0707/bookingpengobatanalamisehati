@extends('layouts.app')
@section('title', 'Create Service')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Service Create </h3>
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
                <h4 class="card-title">Create Service</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('service.store')}}">
                    @csrf
                  <div class="form-group">
                    <label for="Pelayanan">Pelayanan</label>
                    <input type="text" name="pelayanan" value="{{old('pelayanan')}}" class="form-control" id="Pelayanan" placeholder="Pelayanan">
                    @if($errors->has('pelayanan'))
                <small id="emailHelp" class="form-text text-warning">{{ $errors->first('pelayanan') }}</small>
                  @endif
                  
                  </div>
                  {{-- <div class="form-group">
                    <label>Kategori</label>
                      <select class="form-control productcategory" name="id_category" id="sub_category_name">
                        <option value="0" disabled selected>Select
                          Main Category*</option>
                        @foreach($category_services as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                      </select>
                      @if($errors->has('id_category'))
                <small id="emailHelp" class="form-text text-warning">{{ $errors->first('id_category') }}</small>
                  @endif
                  </div> --}}
                  <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                  {{-- <button class="btn btn-light">Cancel</button> --}}
                </form>
              </div>
            </div>
          </div>
    
    </div>
  </div>
@endsection
