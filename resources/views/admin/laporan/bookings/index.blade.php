@extends('layouts.app')
@section('title', 'Laporan Booking')   

@section('content')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> --}}
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Laporan Booking </h3>
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
                <h4 class="card-title">Laporan Booking</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="GET" action="{{route('print_booking')}}" target="_blank">
                <div class="form-group">
                  <label for="start_date">Mulai</label>
                    <input type="date" name="start_date" class="form-control" id="start_date" required>
                </div>
                <div class="form-group">
                  <label for="end_date">Akhir</label>
                    <input type="date" name="end_date" class="form-control" id="end_date" required>
                  </div>
                <div class="form-group">
              <label for="#"></label>
                <button type="submit" class="btn btn-primary">Print</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
              </form>
    </div>
  </div>
</div>
    </div>

@endsection
