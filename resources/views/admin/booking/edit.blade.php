@extends('layouts.app')
@section('title', 'Edit Booking')   
   
@section('content')
<!-- Modal Jadwal Booking -->
<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">  <!-- Menambahkan modal-lg untuk modal besar -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scheduleModalLabel">Jadwal Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Berikut adalah jadwal yang tersedia selama 1 bulan ke depan:</p>
        
        <!-- Tabel Jadwal -->
        <table class="table table-bordered table-responsive">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Jam yang Tersedia</th>
            </tr>
          </thead>
          <tbody id="bookingSchedule">
            <!-- Jadwal booking akan ditampilkan di sini menggunakan jQuery -->
          </tbody>
        </table>

        <!-- Paginasi -->
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center" id="pagination"></ul>
        </nav>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form Booking Edit </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
        </ol>
      </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Edit Booking</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{route('booking.update', $edit->id)}}">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="nama" value="{{$edit->nama}}" class="form-control" id="name" placeholder="Name" readonly>
                    {{-- @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                    @endforeach
                    @endif --}}
                  </div>
                  <div class="row">
                    <div class="col">
                  <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="number" value="{{$edit->nohp}}" name="nohp" class="form-control" id="nohp" placeholder="No HP" readonly>
                    {{-- @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                    @endforeach
                    @endif --}}
                  </div>
                </div>
                <div class="col">
                <div class="form-group">
                  <label for="nohp">Alamat</label>
                  <textarea name="alamat" id="" class="form-control" cols="30" rows="1" readonly>{{$edit->alamat}}</textarea>
                  {{-- @if(count($errors) > 0)
                  @foreach ($errors->all() as $error)
                  <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                  @endforeach
                  @endif --}}
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" value="{{$edit->tanggal}}" name="tanggal" class="form-control" id="tanggal" placeholder="tanggal">
              <small id="emailHelp" class="form-text text-warning">
                <a href="#" data-toggle="modal" data-target="#scheduleModal">
                  
                  <h6><span class="badge badge-info">Cek Jadwal Booking !!!</span></h6>
                </a>
              </small>
            </div>
          </div>

                <div class="col">
                  <div class="form-group">
                    <label for="jam">Jam</label>
                    <input type="time"
                    id = "jam"
                    value="{{$edit->jam}}" name="jam" class="form-control" id="jam" placeholder="jam" step="3600" @guest readonly @endguest>
                    <small id="jam" class="form-text text-dark">Contoh : 09:00 (Cek Jam Tersedia)</small>
                    {{-- @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                    <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                    @endforeach
                    @endif --}}
                  </div>
                </div>
                
                  </div>

                  <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Pelayanan</label>
                      <input type="text" value="{{$edit->pelayanan}}" name="pelayanan" class="form-control" id="jam" placeholder="jam" readonly>

                    </div>
                    </div>
                    
                    <div class="col">
                      <div class="form-group">
                        <label>Biaya Administrasi</label>
                        <input type="text" name="nominal" value="@currency($edit->nominal)" class="form-control" id="nominal" placeholder="nominal" readonly>
                        {{-- @if(count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                        @endforeach --}}
                      </div>
                      </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="name">Status</label>
                    <br>
                    <div class="form-group form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="pending" {{ $edit->status == 'pending' ? 'checked' : ''}}>
                      <label class="form-check-label" for="inlineRadio1">Pending</label>
                    </div>
                    <div class="form-group form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="success" {{ $edit->status == 'success' ? 'checked' : ''}}>
                      <label class="form-check-label" for="inlineRadio2">Success</label>
                    </div>
                    
                </div>

                <div class="form-group">
                  <label for="nohp">Keluhan</label>
                  <textarea name="alamat" id="" class="form-control" cols="30" rows="10" readonly>{{$edit->keluhan}}</textarea>
                  {{-- @if(count($errors) > 0)
                  @foreach ($errors->all() as $error)
                  <small id="emailHelp" class="form-text text-warning">Category sudah ada / Category harus lebih dari 2 huruf</small>
                  @endforeach
                  @endif --}}
                </div>
                      
                  
                  <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                  {{-- <button class="btn btn-light">Cancel</button> --}}
                </form>
              </div>
            </div>
          </div>
    
    </div>
  </div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  
  <script>
    
    $(document).ready(function() {
    // Event listener saat link "Cek Jadwal Booking" diklik
    $('a[data-toggle="modal"]').on('click', function(e) {
        e.preventDefault();  // Mencegah link membuka halaman baru

        // Kirim request AJAX untuk mendapatkan jadwal dari server
        $.ajax({
            type: 'GET',
            url: '/get-booking-schedule', // Endpoint untuk mengambil jadwal
            success: function(response) {
                var scheduleTable = '';
                if (response && response.length > 0) {
                    response.forEach(function(schedule) {
                        var statusClass = (schedule.status === 'Penuh') ? 'text-danger' : 'text-success';
                        
                        scheduleTable += '<tr>';
                        scheduleTable += '<td>' + schedule.date + '</td>';
                        scheduleTable += '<td class="' + statusClass + '">' + schedule.status + '</td>';
                        
                        // Menambahkan daftar jam yang tersedia
                        if (schedule.status === 'Tersedia' && schedule.available_times.length > 0) {
                            var availableTimes = schedule.available_times.join(', ');
                            scheduleTable += '<td>' + availableTimes + '</td>';
                        } else {
                            scheduleTable += '<td>Tidak ada waktu kosong</td>';
                        }

                        scheduleTable += '</tr>';
                    });

                    // Menampilkan data jadwal ke dalam tbody
                    $('#bookingSchedule').html(scheduleTable);
                } else {
                    // Jika tidak ada data
                    $('#bookingSchedule').html('<tr><td colspan="3">Maaf, tidak ada jadwal yang tersedia.</td></tr>');
                }
            },
            error: function() {
                // Jika gagal mengambil data
                $('#bookingSchedule').html('<tr><td colspan="3">Gagal mengambil data jadwal.</td></tr>');
            }
        });
    });
});


// Check if the selected time is already booked
$('input[name="jam"]').on('change', function() {
        var selectedDate = $('input[name="tanggal"]').val();
        var selectedTime = $(this).val();

        // Send an AJAX request to check if the time is available
        $.ajax({
            type: 'GET',
            url: '/check-time-availability', // The route for checking time availability
            data: {
                tanggal: selectedDate,
                jam: selectedTime
            },
            success: function(response) {
                if (response.error) {
                    alert(response.message); // Show alert if time is already booked
                    $('input[name="jam"]').val(''); // Reset the time input
                }
            }
        });
    });

    $(document).ready(function() {
  $('#jam').on('change', function() {
    var selectedTime = $(this).val(); // Get the selected time

    // Define business hours: 09:00 AM to 21:00 PM
    var startTime = '09:00';
    var endTime = '21:00';

    // Check if the selected time is outside business hours
    if (selectedTime < startTime || selectedTime >= endTime) {
      // Show alert if time is outside working hours
      alert("Pilihan di luar jam Operasional. Pilih Jam antara 09:00 and 21:00. (Cek Jadwal Booking!!)");
      $(this).val(''); // Optionally clear the input if it's invalid
    }
  });
});
    </script>
@endsection

