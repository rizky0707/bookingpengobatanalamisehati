@extends('layouts.app')
@section('title', 'Tables Konfirmasi Pembayaran')   

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
                <br>
                {{-- <form action="{{route('booking.index')}}" method="GET">
                  <div class="row justify-content-center">
                      <label for="">Mulai</label>
                    <div class="col-md-2">
                      <input type="date" class="form-control" name="start_date">
                    </div>
                    <label for="">Akhir</label>
                    <div class="col-md-2">
                      <input type="date" class="form-control" name="end_date">
                    </div>
                    <label for="">Status</label>
                    <div class="col-md-2">
                      <select class="form-control" name="end_date">
                        <option value="">Pending</option>
                        <option value="">Sucess</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                      <a href="{{route('booking.index')}}" class="btn btn-danger btn-sm">Reset</a>
                  </div>
                  </div>
                </form> --}}
            </p>
            <table id="example" class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th> # </th>
                  <th> BookingID</th>
                  <th> ERM</th>
                  <th> Nama</th>
                  <th> No HP</th>
                  <th> Pelayanan </th>
                  <th> Jam </th>
                  <th> Tanggal </th>
                  <th> Status </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $no= 1; ?>
                @foreach ($bookings as $item)   
                <td> {{$no++}} </td>
                  <td> {{$item->id}} </td>
                  <td> {{$item->user->no_rm}} </td>
                  <td> {{$item->nama}} </td>
                  <td> {{$item->nohp}}</td>
                  <td> {{$item->pelayanan}}</td>
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
                      <a href="{{ route('booking.show', $item->id) }}" class="btn btn-success btn-xs"><i class="mdi mdi-bullseye"></i> Show</a> 

                        @elseif($item->status == "pending") 
                        <form action="#" method="POST">
                          <a href="{{ route('booking.edit', $item->id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-pencil-box-outline"></i>Edit</a> 
                          @csrf
                          @method('DELETE')
                        {{-- <button type="submit" class="btn btn-danger btn-sm" 
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="mdi mdi-delete"></i> Delete</button> --}}
                      </form>
                      @else 
                      <a href="{{ route('booking.show', $item->id) }}" class="btn btn-success btn-xs"><i class="mdi mdi-bullseye"></i> Show</a> 

                        @endif  
                        @endif
                  </td>  
                  
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
  } );
</script> 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
@endsection