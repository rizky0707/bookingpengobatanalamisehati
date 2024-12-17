@extends('layouts.app')
@section('title', 'Dashboard')
@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" type="text/css">
@endsection
@section('content')

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulir atau detail akan dimuat di sini -->
        <form id="bookingForm">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" readonly>
          </div>
          <div class="form-group">
            <label for="nohp">No HP</label>
            <input type="text" class="form-control" id="nohp" name="nohp" readonly>
          </div>
          <div class="form-group">
            <label for="pelayanan">Pelayanan</label>
            <input type="text" class="form-control" id="pelayanan" name="pelayanan" readonly>
          </div>
          <div class="form-group">
            <label for="jam">Jam</label>
            <input type="text" class="form-control" id="jam" name="jam" readonly>
          </div>
          <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="text" class="form-control" id="tanggal" name="tanggal" readonly>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" readonly>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
    </div>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('assets/admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Total Pasien <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$bookings_count}}</h2>
            <h6 class="card-text">Data Per {{date('d-M-y')}}</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('assets/admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Pelayanan<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>

            @foreach ($pelayanan_count as $pelayanan)
    <p>{{ $pelayanan->pelayanan }} : {{ $pelayanan->count }}</p>
@endforeach

            <h6 class="card-text">PAS</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('assets/admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Total Biaya Pendaftaran <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">Rp {{ number_format($total_nominal, 0, ',', '.') }}</h2>
            <h6 class="card-text">PAS</h6>
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
                <h6 class="m-0 font-weight-bold text-primary card-title">Data Booking Hari ini ({{count($bookings)}})</h6>
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
                  <td> {{$item->pelayanan}}</td>
                  {{-- <td> {{$item->doctor->name}}</td> --}}
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
                        <a href="{{ route('booking.edit', $item->id) }}" class="btn btn-success btn-sm">Edit</a> 
                        @else 
                        <a href="#" class="btn btn-success btn-xs show-details" data-toggle="modal" data-target="#detailModal" 
                        data-id="{{ $item->id }}"
                        data-nama="{{$item->nama}}"
                        data-nohp="{{$item->nohp}}"
                        data-pelayanan="{{$item->pelayanan}}"
                        data-jam="{{$item->jam}}"
                        data-tanggal="{{$item->tanggal}}"
                        data-status="{{$item->status}}"
                        >
                          <i class="mdi mdi-bullseye"></i> Show
                        </a>
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
<script>
  $('.show-details').click(function() {
  var bookingId = $(this).data('id'); // Ambil ID dari data-id
  var nama = $(this).data('nama'); // Ambil ID dari data-id
  var nohp = $(this).data('nohp'); // Ambil ID dari data-id
  var pelayanan = $(this).data('pelayanan'); // Ambil ID dari data-id
  var jam = $(this).data('jam'); // Ambil ID dari data-id
  var tanggal = $(this).data('tanggal'); // Ambil ID dari data-id
  var status = $(this).data('status'); // Ambil ID dari data-id

  // Melakukan permintaan AJAX untuk mendapatkan detail booking

      // Isi modal dengan data booking
      $('#nama').val(nama);
      $('#nohp').val(nohp);
      $('#pelayanan').val(pelayanan);
      $('#jam').val(jam);
      $('#tanggal').val(tanggal);
      $('#status').val(status);
   
  });

</script>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
@endsection
