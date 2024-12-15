@extends('layouts.app')
@section('title', 'Tables Kartu Rekam Medis')   

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">  Kartu Rekam Medis Tables </h3>
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

            <!-- Modal -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Detail Rekam Medis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi Modal -->
        <ul>
          <li><strong>E-RM:</strong> <span id="modalE-RM"></span></li>
          <li><strong>Nama:</strong> <span id="modalNama"></span></li>
          <li><strong>Usia:</strong> <span id="modalUsia"></span></li>
          <li><strong>Anamnesa:</strong> 
            <ul>
              <li>Tensi: <span id="modalTensi"></span></li>
              <li>Gula Darah: <span id="modalGula"></span></li>
              <li>Asam Urat: <span id="modalAsam"></span></li>
              <li>Kolesterol: <span id="modalKolesterol"></span></li>
            </ul>
          </li>
          <li><strong>Penyakit:</strong> <span id="modalPenyakit"></span></li>
          <li><strong>Obat:</strong> <span id="modalObat"></span></li>
          <li><strong>Jumlah:</strong> <span id="modalJumlah"></span></li>
          <li><strong>Tanggal:</strong> <span id="modalTanggal"></span></li>
          <li><strong>Status:</strong> <span id="modalStatus"></span></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


        <div class="row">
                <div class="col">
                <h6 class="m-0 font-weight-bold text-primary card-title">DataTables Kartu Rekam Medis</h6>
                </div>
                </div>
                <br>
            </p>
            <table id="example" class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>E-RM</th>
                  <th>Nama</th>
                  <th>Usia</th>
                  <th>Anamnesa</th>
                  <th>Penyakit</th>
                  <th>Obat</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Action</th>
                  
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
                  <td> 
                  <ul>
                    <li>Tensi : {{$item->gula_darah}}</li>
                    <li>Gula Darah : {{$item->gula_darah}}</li>
                    <li>Asam Urat : {{$item->asam_urat}}</li>
                    <li>Kolesterol : {{$item->kolesterol}}</li>
                  </ul>
                  </td>

                  <td>
                    @if ($item->diagnosa->isNotEmpty())
                    @foreach ($item->diagnosa as $diagnosa)
                    {{ implode(' ', array_slice(explode(' ', $diagnosa->penyakit), 0, 2)) }}
                    @break {{-- Hanya tampilkan satu data --}}
                @endforeach
                    @else
                        <span class="text-muted">Tidak ada data</span>
                    @endif
                </td>
                

                  <td>
                  
                    @foreach ($item->diagnosa as $diagnosa)
                        @foreach ($diagnosa->obat as $obat)
                        
                          <ul>
                            <li>{{ $obat->obat->nama_obat }}</li>
                          </ul>
                        @endforeach
                    @endforeach
                  </td>

                <td>
                  
                    @foreach ($item->diagnosa as $diagnosa)
                    @foreach ($diagnosa->obat as $obat)
                    
                        <ul>
                          <li>{{ $obat->jumlah }}</li>
                        </ul>
                    @endforeach
                @endforeach
                </td>

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
                        <form action="#" method="POST">
                         
                          <button type="button" 
                          class="btn btn-success btn-sm btnShowModal" 
                          data-erm="{{$item->user->no_rm}}"
                          data-nama="{{$item->nama}}"
                          data-usia="{{\Carbon\Carbon::parse($item->user->tanggal_lahir)->age}} tahun"
                          data-tensi="{{$item->tensi}}"
                          data-gula="{{$item->gula_darah}}"
                          data-asam="{{$item->asam_urat}}"
                          data-kolesterol="{{$item->kolesterol}}"
                          data-penyakit="{{ $item->diagnosa->pluck('penyakit')->implode(', ') }}"
                          data-obat="{{ $item->diagnosa->flatMap->obat->pluck('obat.nama_obat')->implode(', ') }}"
                          data-jumlah="{{ $item->diagnosa->flatMap->obat->pluck('jumlah')->implode(', ') }}"
                          data-tanggal="{{date('d-M-y', strtotime($item->tanggal))}}"
                          data-status="{{$item->status}}"
                          data-toggle="modal" data-target="#showModal">
                      <i class="mdi mdi-pencil-box-outline"></i> Show
                  </button>
        
                          
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
<script>
  $(document).ready(function () {
    $('.btnShowModal').on('click', function () {
      // Ambil data dari atribut tombol
      let erm = $(this).data('erm');
      let nama = $(this).data('nama');
      let usia = $(this).data('usia');
      let tensi = $(this).data('tensi');
      let gula = $(this).data('gula');
      let asam = $(this).data('asam');
      let kolesterol = $(this).data('kolesterol');
      let penyakit = $(this).data('penyakit');
      let obat = $(this).data('obat');
      let jumlah = $(this).data('jumlah');
      let tanggal = $(this).data('tanggal');
      let status = $(this).data('status');

      // Isi data ke modal
      $('#modalE-RM').text(erm);
      $('#modalNama').text(nama);
      $('#modalUsia').text(usia);
      $('#modalTensi').text(tensi);
      $('#modalGula').text(gula);
      $('#modalAsam').text(asam);
      $('#modalKolesterol').text(kolesterol);
      $('#modalPenyakit').text(penyakit);
      $('#modalObat').text(obat);
      $('#modalJumlah').text(jumlah);
      $('#modalTanggal').text(tanggal);
      $('#modalStatus').text(status);
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
@endsection