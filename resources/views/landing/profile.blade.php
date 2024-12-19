@extends('welcome')
@section('title', 'Edit Profile')   
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account"></i>
          </span> Profile
        </h3>
      </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-description"> PAS </p>
                
              <form class="forms-sample">
                  
                <div class="form-group">
                  <label for="no_rm">No RM</label>
                  <input type="text" value="{{ Auth::user()->no_rm }}" class="form-control"  disabled>
                </div>
                  <div class="form-group">
                      <label for="nik">NIK</label>
                      <input type="text" name="nik" value="{{ Auth::user()->nik }}" class="form-control" id="nik" readonly>
                    </div>
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" id="name" readonly>
                  </div>
                <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" id="email" readonly>
                  </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="status">Status</label>
                      @if( Auth::user()->is_admin == 3 )
                      <input type="text" name="member" value="Member" class="form-control" id="status" readonly>
                      @endif
                    </div>
                  </div>
                </div>

                  <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" name="no_hp" value="{{ Auth::user()->no_hp }}" class="form-control" id="no_hp" readonly>
                  </div>
                  <div class="form-group">
                    <label for="name">Jenis Kelamin</label>
                    <br>
                    <div class="form-group form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="laki-laki" {{ Auth::user()->jenis_kelamin == 'laki-laki' ? 'checked' : ''}}  disabled="disabled">
                      <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                    </div>
                    <div class="form-group form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="perempuan" {{ Auth::user()->jenis_kelamin == 'perempuan' ? 'checked' : ''}} disabled="disabled">
                      <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>          
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="name">Tempat Lahir</label>
                      <input type="text" name="tempat" value="{{ Auth::user()->tempat }}" class="form-control" id="name" readonly>
                    </div>
                  </div>
                  <div class="col">
                      <div class="form-group">
                        <label for="name">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ Auth::user()->tanggal_lahir }}" class="form-control" id="name" readonly>
                      </div>
                    </div>
                </div>

                    <div class="form-group">
                      <label for="nohp">Alamat</label>
                      <textarea name="alamat" id="" class="form-control" cols="30" rows="10" readonly>{{ Auth::user()->alamat }}</textarea>
                    </div>
                    @foreach ($indexUser as $item)
                    <a href="{{route('editProfile', $item->id)}}" class="btn btn-gradient-primary mr-2">Edit</a>
                    @endforeach

                </form>
              </div>
            </div>
          </div>
          </div>
    
  </div>
@endsection
