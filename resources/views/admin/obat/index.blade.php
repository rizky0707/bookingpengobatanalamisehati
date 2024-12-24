@extends('layouts.app')
@section('title', 'Tables Obat')   

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">  Obat Tables </h3>
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
                <h6 class="m-0 font-weight-bold text-primary card-title">DataTables Obat</h6>
                </div>
                <div class="col text-right">
                    <a href="{{route('obat.create')}}" class="btn btn-primary btn-sm">Create Obat</a>
                </div>
                </div>
            </p>
            <table id="example" class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Obat</th>
                  <th>Deskripsi</th>
                  <th>Stok</th>
                  <th>Harga</th>
                  <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($obat as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_obat }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ number_format($item->harga, 2) }}</td>
                    <td>
                        <a href="{{ route('obat.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('obat.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
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