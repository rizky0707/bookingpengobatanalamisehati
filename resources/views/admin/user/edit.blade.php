@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Edit User </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Edit User</h4>
                    <form method="POST" action="{{ route('updateUser', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" id="name" placeholder="Nama Lengkap">
                            @if ($errors->has('name'))
                                <small class="form-text text-warning">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" id="email" placeholder="Email">
                            @if ($errors->has('email'))
                                <small class="form-text text-warning">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="is_admin">Pilih Level</label>
                            <select class="form-control" name="is_admin">
                                <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin</option>
                                <option value="2" {{ $user->is_admin == 2 ? 'selected' : '' }}>Petugas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_active">Status</label>
                            <select class="form-control" name="is_active">
                                <option value="1" {{ $user->is_active ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Non-Aktif</option>
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
                            <span class="input-group-text" onclick="togglePasswordVisibility()" style="cursor: pointer;">
                                👁️
                            </span>
                        </div> --}}

                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <div class="input-group">
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                                <span class="input-group-text" onclick="togglePasswordVisibility()" style="cursor: pointer;">
                                    👁️
                                </span>
                            </div>
                            @if ($errors->has('password'))
                                <small id="passwordHelp" class="form-text text-warning">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('manageusers') }}" class="btn btn-light">Cancel</a>
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
