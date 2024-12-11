@extends('layouts.app')
@section('title', 'Create Users')   
   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Users Create </h3>
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
                <h4 class="card-title">Create Users</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('storeUser')}}">
                    @csrf
                  <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="name">
                    @if($errors->has('name'))
                <small id="emailHelp" class="form-text text-warning">{{ $errors->first('name') }}</small>
                  @endif
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="email">
                    @if($errors->has('email'))
                <small id="emailHelp" class="form-text text-warning">{{ $errors->first('email') }}</small>
                  @endif
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" placeholder="Password">
                        <span class="input-group-text" onclick="togglePasswordVisibility()" style="cursor: pointer;">
                            👁️
                        </span>
                    </div>
                    @if ($errors->has('password'))
                        <small id="passwordHelp" class="form-text text-warning">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                
                

                  <div class="form-group">
                    <label for="is_admin">Pilih Level</label>
                    <select class="form-control"  name="is_admin" id="pelayanan" @guest readonly @endguest>
                      <option value="0" disabled="true" selected="true">-- Pilih Level --</option>
                      
                      <option value="2">Petugas</option>
                      <option value="1">Admin</option>
                      
                    </select>
                    @if($errors->has('is_admin'))
                    <small id="emailHelp" class="form-text text-warning">{{ $errors->first('is_admin') }}</small>
                @endif            
                  </div>

                  <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                </form>
              </div>
            </div>
          </div>
    
    </div>
  </div>

  <script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    }
</script>


@endsection
