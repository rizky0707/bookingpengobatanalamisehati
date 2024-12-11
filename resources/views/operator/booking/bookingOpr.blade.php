@extends('operatorApp')
@section('title', 'Tables Booking')   

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">  Booking Tables </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
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
            <div class="row">
                <div class="col">
                <h6 class="m-0 font-weight-bold text-primary card-title">DataTables Booking</h6>
                </div>
                {{-- <div class="col text-right">
                    <a href="{{route('booking.create')}}" class="btn btn-primary btn-sm">Create Booking</a>
                </div> --}}
                </div>
            </p>
            <table id="example" class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Nama</th>
                  <th> No HP</th>
                  <th> Pelayanan </th>
                  <th> Doctor </th>
                  <th> Jam </th>
                  <th> Tanggal </th>
                  <th> Status </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $no= 1; ?>
                @foreach ($bookings as $item)   
                <tr>
                  <td> {{$no++}} </td>
                  <td> {{$item->nama}} </td>
                  <td> {{$item->nohp}}</td>
                  <td> {{$item->service->pelayanan}}</td>
                  <td> {{$item->doctor->name}}</td>
                  <td> {{$item->jam}}</td>
                  <td>{{date('d-M-y', strtotime($item->tanggal))}}</td>
                  <td> @if($item->status == "pending")
                    <?php
                      $date_now = date("Y-m-d");
                      $tgl_exp = $item->tanggal;
                      $date_now_plus = date("Y-m-d", strtotime('+1 days', strtotime($tgl_exp)));

                      ?>
                      @if($date_now >= $date_now_plus)
                      <span class="badge badge-gradient-danger">Expired
                        @else 
                        <span class="badge badge-gradient-info">           
                        {{$item->status}}
                      </span>

                        @endif
                    
                  @elseif($item->status == "success")
                  <span class="badge badge-warning">
                    {{$item->status}}
                    </span>
                    @else
                    <span class="badge badge-danger">
                      {{$item->status}}
                      </span>
                      @endif
                  </td>
                  <td>
                    @if($item->status == "pending" || $item->status == "success" )
                      <?php
                      $date_now = date("Y-m-d");
                      $tgl_exp = $item->tanggal;
                      $date_now_plus = date("Y-m-d", strtotime('+1 days', strtotime($tgl_exp)));

                      ?>
                      @if($date_now >= $date_now_plus)
                      <a href="{{ route('showOpr', $item->id) }}" class="btn btn-success btn-xs"><i class="mdi mdi-bullseye"></i> Show</a> 

                        @elseif($item->status == "pending") 
                        <a href="{{ route('bookingOprEdit', $item->id) }}" class="btn btn-success btn-xs"><i class="mdi mdi-pencil-box-outline"></i> Edit</a> 
                        @else
                        <a href="{{ route('showOpr', $item->id) }}" class="btn btn-success btn-xs"><i class="mdi mdi-bullseye"></i> Show</a> 
                        @endif  
                        @endif
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection
@section('script')
<script>
  $(document).ready(function() {
  $('#example').DataTable();
  responsive: true;
  } );
</script> 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
@endsection