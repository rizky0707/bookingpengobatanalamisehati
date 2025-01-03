@extends('layouts.app')
@section('title', 'Tables Kartu Rekam Medis')   

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">
<style>
  .container {
          width: 100%;
          max-width: 800px;
          margin: 0 auto;
          /* border: 1px solid #ddd; */
          /* padding: 20px; */
          position: relative;
      }
      .header {
          display: flex;
          justify-content: space-between;
          align-items: center;
      }
      .title {
          font-size: 18px;
          font-weight: bold;
      }
      .address {
          font-size: 14px;
          color: #555;
      }
      .logo {
          width: 100px;
          height: auto;
      }
      .footer {
          text-align: center;
          margin-top: 40px;
          font-size: 14px;
          color: #555;
      }
      .footer a {
          color: #007BFF;
          text-decoration: none;
      }
      .footer a:hover {
          text-decoration: underline;
      }
      .divider {
          margin: 20px 0;
          border-top: 1px solid #ddd;
      }
      .content {
            text-align: center;
            padding: 40px;
        }
</style>
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
  <div class="container">
    <div class="header">
        <div>
            <div class="title">PENGOBATAN ALAMI SEHATI</div>
            <div class="address">Ruko Notredame, Jl. Deltamas Boulevard No 20</div>
        </div>
        <img src="{{asset('assets/admin/assets/images/logo-print.png')}}" alt="Logo Pengobatan Alami Sehati" class="logo">
    </div>
    <div class="content">
      <h1>REKAM MEDIS</h1>
      <h2>KARTU PASIEN RAWAT JALAN</h2>
  </div>
  <div class="container">
<div class="row">
  <div class="col">
    <h3>No Rekam</h3>
  </div>
  <div class="col text-right">
    <h3 id="rekamMedisID"></h3>
  </div>
  </div>
  <div class="row">
    <div class="col">
      <strong>No NIK:</strong> <span id="nik"></span><br>
      <strong>Nama Pasien:</strong> <span id="namaPasien">  </span><br>
      <strong>Umur:</strong> <span id="umur"></span></span>
    </div>
    <div class="col text-right">
      <strong>Alamat:</strong> <span id="alamat"></span><br>
      <strong>Jenis Kelamin:</strong> <span id="jenis_kelamin"></span><br>
      <strong>No HP:</strong> <span id="noHP"></span><br>
    </div>
  </div>
    <p class="pt-4"></p>

    <table class="table table-bordered table-responsive" style="border: 1px solid black;">
        <thead>
            <tr>
                <th>Hari / Tanggal</th>
                <th>Anamnetis</th>
                <th>Diagnosa</th>
                <th>Keterangan / Saran Produk</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="modalTableBody"  style="border: 1px solid black;">
        </tbody>
    </table>
</div>
    
    <div class="footer">
      <img src="http://localhost:8000/assets/admin/assets/images/garis-bawah.png" width="300px" alt="Logo Pengobatan Alami Sehati" class="logo" style="
    width: 200px;
">
      <br>
        +62 857-1592-9099 <br>
       pengobatanalamisehati@gmail.com<br>
        www.pengobatanalamisehati.com
    </div>
   </div>
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
                          data-nik="{{$item->user->nik}}"
                          data-alamat="{{$item->alamat}}"
                          data-jenis_kelamin="{{$item->user->jenis_kelamin}}"
                          data-nohp="{{$item->nohp}}"
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
    
@endsection
@section('script')
<script>
  $(document).ready(function () {
    // Initialize DataTables
    $('#example').DataTable();

    // Ketika tombol Show Modal diklik
    $('.btnShowModal').on('click', function () {
      // Ambil data dari tombol
      let erm = $(this).data('erm');
      let nik = $(this).data('nik');
      let alamat = $(this).data('alamat');
      let jenis_kelamin = $(this).data('jenis_kelamin');
      let nohp = $(this).data('nohp');
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

      // Masukkan data ke elemen modal
      $('#showModal .modal-title').text(`Detail Rekam Medis: ${nama}`);
      $('#showModal #rekamMedisID').text(erm);
      $('#showModal #nik').text(nik);
      $('#showModal #namaPasien').text(nama);
      $('#showModal #umur').text(usia);
      $('#showModal #alamat').text(alamat);
      $('#showModal #jenis_kelamin').text(jenis_kelamin);
      $('#showModal #noHP').text(nohp);

      // Isi data tabel modal
      let anamnesis = `
        <ul>
          <li>Tensi: ${tensi}</li>
          <li>Gula Darah: ${gula}</li>
          <li>Kolesterol: ${kolesterol}</li>
          <li>Asam Urat: ${asam}</li>
        </ul>`;
      let row = `
        <tr  style="border: 1px solid black;">
          <td>${tanggal}</td>
          <td>${anamnesis}</td>
          <td>${penyakit}</td>
          <td>${obat}</td>
          <td>${status}</td>
        </tr>`;

      // Tambahkan baris ke tabel di modal
      $('#modalTableBody').empty().append(row);
    });
  });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
@endsection