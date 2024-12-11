@extends('layouts.app')
@section('title', 'Create Doctor')   

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">  Doctors Tables </h3>
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
                <h6 class="m-0 font-weight-bold text-primary card-title">DataTables Doctors</h6>
                </div>
                <div class="col text-right">
                    <a href="{{route('doctor.create')}}" class="btn btn-primary btn-sm">Create Doctor</a>
                </div>
                </div>
            </p>
            <table id="example" class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Nama</th>
                  <th> Kategori</th>
                  <th> Pelayanan </th>
                  <th> Jam </th>
                  <th> No HP </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $no= 1; ?>
                @foreach ($doctors as $item)   
                <tr>
                  <td> {{$no++}} </td>
                  <td> {{$item->name}} </td>
                  <td> {{$item->categoryservice->name}}</td>
                  <td> {{$item->service->pelayanan}}</td>
                  <td> {{$item->jam}} - {{$item->jam_akhir}}</td>
                  <td> {{$item->nohp}}</td>
                  <td>
                    <form action="{{ route('doctor.destroy', $item->id) }}" method="POST">
                        <a href="{{ route('doctor.edit', $item->id) }}" class="btn btn-success btn-sm">Edit</a> 
                        @csrf
                        @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" 
                      onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
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