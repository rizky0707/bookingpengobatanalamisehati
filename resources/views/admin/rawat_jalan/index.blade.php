@extends('layouts.app')
@section('title', 'Tables Rawat Jalan')   

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">  Rawat Jalan Tables </h3>
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
        <div class="row">
                <div class="col">
                <h6 class="m-0 font-weight-bold text-primary card-title">DataTables Rawat Jalan</h6>
                </div>
                </div>
                <br>
            </p>
            <table id="example" class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th> # </th>
                  <th> E-RM</th>
                  <th> Nama</th>
                  <th> Umur</th>
                  <th> Pelayanan </th>
                  <th> Jam </th>
                  <th> Tanggal </th>
                  <th> Keluhan </th>
                  <th> Status </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $no= 1; ?>
                @foreach ($rawatJalan as $item) 
                <tr>  
                <td> {{$no++}} </td>
                  <td> {{$item->user->no_rm}} </td>
                  <td> {{$item->nama}} </td>
                  <td> {{\Carbon\Carbon::parse($item->user->tanggal_lahir)->age}} tahun</td>
                  <td> {{$item->pelayanan}}</td>
                  <td> {{$item->jam}}</td>
                  <td>{{date('d-M-y', strtotime($item->tanggal))}}</td>
                  <td> {{$item->keluhan}}</td>
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
                        <form action="#" method="POST">
                          @if(is_null($item->cek_anamnesa)) 
            <!-- Jika anamnesa belum diisi -->
            <a href="{{ route('rawatJalan.edit', $item->id) }}" class="btn btn-success btn-sm">
              <i class="mdi mdi-pencil-box-outline"></i> Anamnesa
            </a>
        @else 
            <!-- Jika anamnesa sudah diisi -->
            <span class="badge bg-info text-white">Selesai Anamnesa</span>
        @endif
                          
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
        <h6 class="m-0 font-weight-bold text-primary card-title">DataTables Rawat Jalan(Anamnesa)</h6>
        </div>
        </div>
        <br>
    </p>
    <table id="rawatjalan" class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th> # </th>
          <th> E-RM</th>
          <th> Nama</th>
          <th> Tensi</th>
          <th> Gula Darah</th>
          <th> Asam Urat </th>
          <th> Kolesterol </th>
          <th> Action </th>
        </tr>
      </thead>
      <tbody>
        <?php $no= 1; ?>
        @foreach ($rawatJalan as $item)   
        <tr>
        <td> {{$no++}} </td>
        <td> {{$item->user->no_rm}} </td>
        <td> {{$item->user->name}} </td>

          <td> {{$item->tensi}} <b>mmHg</b></td>
          <td> {{$item->gula_darah}} <b>mg/dL</b></td>
          <td> {{$item->asam_urat}} <b>mg/dL</b></td>
          <td> {{$item->kolesterol}} <b>mg/dL</b></td>
          <td>
                <form action="#" method="POST">
                  @if(is_null($item->cek_anamnesa)) 
            <!-- Jika anamnesa belum diisi -->
            <a href="{{ route('rawatJalan.edit', $item->id) }}" class="btn btn-success btn-sm">
              <i class="mdi mdi-pencil-box-outline"></i> Anamnesa
            </a>
        @else 
            <!-- Jika anamnesa sudah diisi -->
            <span class="badge bg-info text-white">Selesai Anamnesa</span>
        @endif
                  
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

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            
          <div class="card-body">
            

<div class="row">
      <div class="col">
      <h6 class="m-0 font-weight-bold text-primary card-title">DataTables Rawat Jalan(Diagnosa)</h6>
      </div>
      </div>
      <br>
  </p>
  <table id="diagnosa" class="table table-bordered table-responsive">
    <thead>
      <tr>
        <th> # </th>
        <th> E-RM</th>
        <th> Nama</th>
        <th> Penyakit</th>
        <th> Obat</th>
        <th> Jumlah</th>
        <th> Action </th>
      </tr>
    </thead>
    <tbody>
      <?php $no= 1; ?>
      @foreach ($diagnosaHariIni as $item)   
      <tr>
      <td> {{$no++}} </td>
      <td> {{$item->user->no_rm}} </td>
      <td> {{$item->user->name}} </td>

        <td> {{$item->penyakit}} </td>

        <td> 
          @if ($item->obats->isNotEmpty())
          <ul>
          @foreach ($item->obats as $obat_rj)
              
                <li>{{ $obat_rj->nama_obat }}</li>
              
          @endforeach
          @else
                    Tidak ada obat
          </ul>
          @endif
      </td>
      <td> 
        @if ($item->obats->isNotEmpty())
        <ul>
          @foreach ($item->obats as $obat_rj)
                <li>{{ $obat_rj->pivot->jumlah }}</li>
          @endforeach
          @else
                    Tidak ada jumlah
          </ul>
          @endif

      </td>
        <td>
              <form action="#" method="POST">

                {{-- @if(is_null($item->penyakit))  --}}
                <a href="{{ route('editDiagnosa', $item->id) }}" class="btn btn-success btn-sm">
                  <i class="mdi mdi-pencil-box-outline"></i> Diagnosa
                </a>      
                {{-- @else  --}}
            <!-- Jika anamnesa sudah diisi -->
            {{-- <span class="badge bg-info text-white">Selesai Diagnosa</span> --}}
        {{-- @endif         --}}
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
  $('#rawatjalan').DataTable();
  $('#diagnosa').DataTable();

  } );
</script> 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
@endsection