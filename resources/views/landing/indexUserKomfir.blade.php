@extends('welcome')
@section('title', 'Komfirmasi Pembayaran')   
@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-cash"></i>
        </span> Histori Komfirmasi Pembayaran
      </h3>
      
    </div>
    

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            
          <div class="card-body">
            {{-- @if ($message = Session::get('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Berhasil !</strong> {{ $message }}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif --}}
            <div class="row">
                <div class="col">
                <h6 class="m-0 font-weight-bold text-primary card-title">Komfirmasi Pembayaran</h6>
                </div>
                <div class="col text-right">
                    {{-- <a href="{{route('bookingLanding')}}" class="btn btn-primary btn-sm">Create Booking</a> --}}
                </div>
                </div>
            </p>
            <table id="example" class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th> # </th>
                  {{-- <th> Pelayanan</th> --}}
                  <th> Nama Rekening</th>
                  <th> Nomor Rekening</th>
                  <th> Bukti Pembayaran</th>
                  <th> Status</th>
                  <th> Timestamps</th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $no= 1; ?>
                @foreach ($komfirmasiPembayaran as $item)   
                <tr>
                  <td> {{$no++}} </td>
                  {{-- <td> {{ $item->booking->pelayanan }} </td> --}}
                  <td> {{$item->nama_pengirim}} </td>
                  <td> {{$item->nomor_rekening_pengirim}} </td>
                  <td> <img src="{{$item->bukti_pembayaran}}" alt="" srcset=""></td>
                  <td> 
                    @if($item->status == "checking") 
                    <span class="badge badge-gradient-danger">Checking
                    @else
                    <span class="badge badge-warning">Success
                      @endif
                  </td>
                  <td> {{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                  <td>
                    <form>
                        <a href="{{ route('showPembayaran', $item->id) }}" class="btn btn-success btn-xs"><i class="mdi mdi-bullseye"></i> Show</a>  
                    </form>
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
