{{-- @include('partials.header') --}}
@extends('welcome')
@section('content')
<div class="jumbotron jumbotron-fluid d-flex flex-wrap align-items-center bg-light">
  <div class="container">
  <h3>Dashboard User</h3>
    </div>
  </div>
  <div class="row mb-5">
  <div class="col-md-4">
      <div class="shadow-sm p-3 mb-5 bg-white rounded">
  <div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><a href="{{url('/dashboard-user')}}"> History</a></li>
      <li class="list-group-item"><a href=""> Notifikasi</a></li>
      <li class="list-group-item"><a href="{{url('/member')}}">Kartu Member</a></li>
    </ul>
  </div>
</div>
</div>

@yield('content-user')
@endsection


