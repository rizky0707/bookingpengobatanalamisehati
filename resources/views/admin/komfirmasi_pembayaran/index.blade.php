@extends('layouts.app')
@section('title', 'Tables Komfirmasi Pembayaran')   

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">  Komfirmasi Pembayaran Tables </h3>
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
                <h6 class="m-0 font-weight-bold text-primary card-title">DataTables Komfirmasi Pembayaran</h6>
                </div>
                <div class="col text-right">
                    {{-- <a href="{{route('service.create')}}" class="btn btn-primary btn-sm">Create Service</a> --}}
                </div>
                </div>
            </p>
            <table id="example" class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Username</th>
                  <th> Nama Rekening</th>
                  <th> Nomor Rekening</th>
                  <th> Bukti Pembayaran</th>
                  <th> Status</th>
                  <th>Created at</th>
                  <th>Update at</th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $no= 1; ?>
                @foreach ($komfirmasiPembayaran as $item)   
                <tr>
                  <td> {{$no++}} </td>
                  <td> {{ $item->user->name }} </td>
                  <td> {{$item->nama_pengirim}} </td>
                  <td> {{$item->nomor_rekening_pengirim}} </td>
                  <td> <img src="../{{$item->bukti_pembayaran}}" alt="" srcset=""></td>
                  <td> 
                    @if($item->status == "checking") 
                    <span class="badge badge-gradient-danger">Checking
                    @else
                    <span class="badge badge-warning">Success
                      @endif


                  </td>
                  <td> {{ $item->created_at->diffForHumans() }}</td>
                  <td> {{ $item->updated_at->diffForHumans() }}</td>
                  <td>
                    @if($item->status == "checking") 
                    <form action="#" method="POST">
                      <a href="{{ route('komfirmasiPembayaran.edit', $item->id) }}" class="btn btn-success btn-xs">Edit</a> 
                      @csrf
                      @method('DELETE')
                  </form>
                    @else
                    {{-- https://wa.me/{{ preg_replace('/^0/', '62', $setting->wa)}} --}}
                    {{-- optional($user->last_booking)->id ?? null --}}
                    @if(empty($item->user->no_hp) || 
                    empty($item->booking->id) ||
                    empty($item->user->name) || 
                    empty($item->booking->pelayanan) ||
                    empty($item->nama_pengirim) ||
                    empty($item->nomor_rekening_pengirim)
                    )
                      Data tidak Lengkap
                    @else
                    <a href="https://wa.me/{{ preg_replace('/^0/', '62', $item->user->no_hp ?? 'tidak ada' )}}?text=Terima%20Kasih%20*SUCCESS*%F0%9F%98%8A%0ANo.Pembayaran%20_{{$item->booking->id ?? 'tidak ada'}}{{$item->user->name}}_%0A*Telah%20Disetujui*%20%E2%9C%94%0A*Pembayaran%20-%20Biaya%20Pedaftaran*%0APelayanan%20%3A%20{{$item->booking->pelayanan ?? 'tidak ada'}}%0ANama%20Rekening%20%3A%20%20{{$item->nama_pengirim ?? 'tidak ada'}}%0ANomor%20Rekening%20%3A%20%20{{$item->nomor_rekening_pengirim ?? 'tidak ada'}}%0A----------------------------------------------%0AHallo%20Sobat%20Sehat%20%F0%9F%99%8C%0ATherapist%20and%20Herbalis%0A%40pengobatanalamisehati%0Ahttps://booking.pengobatanalamisehati.com/pembayaranHistory" target="_blank" class="btn btn-warning btn-xs">Kirim Feed Back</a> 

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
    } );
  </script> 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
@endsection