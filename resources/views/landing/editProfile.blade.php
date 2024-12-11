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
                @if ($message = Session::get('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Berhasil !</strong> {{ $message }}.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                <p class="card-description"> PAS1</p>
                
              <form class="forms-sample" method="POST" action="{{route('updateProfile', $user_edit->id)}}">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="no_rm">No RM</label>
                    <input type="text" value="{{ Auth::user()->no_rm }}" class="form-control"  disabled>
                  </div>
                  <div class="form-group">
                      <label for="nik">NIK</label>
                      <input type="number" name="nik" value="{{$user_edit->nik}}" class="form-control" id="nik" required>
                    </div>
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" value="{{$user_edit->name}}" class="form-control" id="name" required>
                  </div>
                <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{$user_edit->email}}" class="form-control" id="email" readonly>
                  </div>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="status">Status</label>
                      @if( Auth::user()->is_admin == 0 )
                      <input type="text" name="member" value="Member" class="form-control" id="status" readonly>
                      @endif
                    </div>
                  </div>
                </div>

                  <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="number" name="no_hp" value="{{$user_edit->no_hp}}" class="form-control" id="no_hp" placeholder="6281574706XXX" required>
                    <small id="emailHelp" class="form-text text-black">Contoh 6281574706XXX angka 0 didepan ganti dengan 62</small>
                  </div>
                  <div class="form-group">
                    <label for="name">Jenis Kelamin</label>
                    <br>
                    <div class="form-group form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="laki-laki" {{ $user_edit->jenis_kelamin == 'laki-laki' ? 'checked' : ''}}>
                      <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                    </div>
                    <div class="form-group form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="perempuan" {{ $user_edit->jenis_kelamin == 'perempuan' ? 'checked' : ''}}>
                      <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>          
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="name">Tempat Lahir</label>
                      <input type="text" name="tempat" value="{{$user_edit->tempat}}" class="form-control" id="name" required>
                    </div>
                  </div>
                  <div class="col">
                      <div class="form-group">
                        <label for="name">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{$user_edit->tanggal_lahir}}" class="form-control" id="name" required>
                      </div>
                    </div>
                </div>

                    <div class="form-group">
                      <label for="nohp">Alamat</label>
                      <textarea name="alamat" id="" class="form-control" cols="30" rows="10" required>{{$user_edit->alamat}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                    <a href="{{route('indexUser')}}" class="btn btn-gradient-secondary mr-2">Back</a>

                </form>
              </div>
            </div>
          </div>
          </div>
    
  </div>
@endsection
