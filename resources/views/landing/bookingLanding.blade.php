<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/css/vendor.bundle.base.css')}}">
<!-- Layout styles -->
<link rel="stylesheet" href="{{asset('assets/admin/assets/css/style.css')}}">
<!-- End layout styles -->
{{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css"> --}}

{{-- <style>
  table {
      border-collapse: collapse;
      width: 100%;
  }

  table, th, td {
      border: 1px solid black;
  }

  th, td {
      padding: 8px;
      text-align: left;
  }
</style> --}}


<link rel="shortcut icon" href="{{asset('assets/admin/assets/images/real-logo.png')}}" />
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --}}
      </div>
      <div class="modal-body">
        <p>Harap Login Terlebih Dahulu ketika booking. Mohon log in untuk Melanjutkan.</p>
      </div>
      <div class="modal-footer">
        <a href="{{url('/login')}}" class="btn btn-primary">Login</a>
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
      </div>
    </div>
  </div>
</div>

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
        <table class="table table-bordered">
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

<div class="jumbotron jumbotron-fluid d-flex flex-wrap align-items-center bg-light">
  <div class="container">
    <div class="row">
    <div class="col">
      <h3 class="text-white">Booking Form</h3>
    </div>
    <div class="col">
      <h3 align="right"><a href="{{route('home')}}" class="btn btn-outline-light">Dashboard</a></h3>
    </div>
    </div>
  </div>
</div>
<!-- search box -->
<div class="container shadow p-4 mb-1 bg-white rounded col-md-8">

  @if(session('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Gagal !</strong> {{ session('error') }}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif

  <form class="forms-sample" method="POST" action="{{route('storeBookingLanding')}}/#WA">
    @csrf
   
      @if (Route::has('login'))
      @auth

        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" name="nama" value="{{ Auth::user()->name }}"  class="form-control" id="name" placeholder="Name" readonly>
            @if($errors->has('nama'))
                <small id="emailHelp" class="form-text text-warning">{{ $errors->first('nama') }}</small>
            @endif
          </div>
          @else
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="nama" class="form-control" id="name" placeholder="Name" readonly>
            </div>
        @endauth
        @endif


  <div class="row">
    <div class="col">
      @if (Route::has('login'))
      @auth 
  <div class="form-group">
    <label for="name">No HP</label>
    <input type="number" value="{{ Auth::user()->no_hp }}" name="nohp" class="form-control" id="name" placeholder="No HP" readonly>
    @if($errors->has('nohp'))
    <small id="emailHelp" class="form-text text-warning">{{ $errors->first('nohp') }}</small>
    @endif
  </div>
  @else
  <div class="form-group">
    <label for="name">No HP</label>
    <input type="number" name="nohp" class="form-control" id="name" placeholder="No HP" readonly>
  </div>
  @endauth
  @endif

</div>

<div class="col">
  @if (Route::has('login'))
  @auth 
<div class="form-group">
  <label for="alamat">Alamat</label>
  <textarea name="alamat"  class="form-control" cols="30" rows="1" readonly>{{Auth::user()->alamat}}</textarea>
  @if($errors->has('alamat'))
    <small id="emailHelp" class="form-text text-warning">{{ $errors->first('alamat') }}</small>
@endif
</div>
@else
<div class="form-group">
  <label for="alamat">Alamat</label>
  <textarea name="alamat"  class="form-control" cols="30" rows="1" readonly></textarea>
    <small id="emailHelp" class="form-text text-warning"></small>
</div>
@endauth
@endif
</div>
  </div>

  <div class="row">
    <div class="col">
    <div class="form-group">
      <label for="name">Tanggal</label>
      {{-- <input type="date" name="tanggal" value="{{old('tanggal')}}" class="form-control" placeholder="tanggal"> --}}
      <input type="date" name="tanggal" value="{{old('tanggal')}}" class="form-control" placeholder="tanggal" 
           min="{{ \Carbon\Carbon::today()->toDateString() }}" 
           @guest readonly @endguest>
      @if($errors->has('tanggal'))
      <small id="emailHelp" class="form-text text-warning">{{ $errors->first('tanggal') }}</small>
  @endif
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
        <input 
          type="time" 
          id = "jam"
          name="jam" 
          value="{{ old('jam') }}" 
          class="form-control" 
          placeholder="jam" 
          step="3600" 
          @guest readonly @endguest> 
          <small id="jam" class="form-text text-dark">Contoh : 09:00 (Cek Jam Tersedia)</small>
          
        @if($errors->has('jam'))
          <small id="jam" class="form-text text-warning">{{ $errors->first('jam') }}</small>
        @endif
      </div>
    </div>
    
  </div>
  
  <div class="row">
  <div class="col">
    <div class="form-group">
      <label for="pelayanan">Pelayanan</label>
        <select class="form-control"  name="pelayanan" id="pelayanan" @guest readonly @endguest>
          <option value="0" disabled="true" selected="true">-- Pilih Pelayanan --</option>
          @foreach($service as $item)
          <option value="{{$item->pelayanan}}">{{$item->pelayanan}}</option>
          @endforeach
        </select>
        @if($errors->has('pelayanan'))
        <small id="emailHelp" class="form-text text-warning">{{ $errors->first('pelayanan') }}</small>
    @endif
    </div>
    </div>

    <div class="col">
      @if (Route::has('login'))
      @auth 
      <div class="form-group">
        <label>Biaya Pendaftaran</label>
        @foreach($tarif as $item)
        <input type="text" name="nominal" value="@currency($item->nominal)"  class="form-control" id="nominal" placeholder="nominal" readonly>
        @endforeach

          @if($errors->has('nominal'))
          <small id="emailHelp" class="form-text text-warning">{{ $errors->first('nominal') }}</small>
      @endif
      </div>
    @else
    <div class="form-group">
      <label>Biaya Pendaftaran</label>
      <input type="text" name="nominal" value=""  class="form-control" id="nominal" placeholder="nominal" readonly>
        @if($errors->has('nominal'))
        <small id="emailHelp" class="form-text text-warning">{{ $errors->first('nominal') }}</small>
    @endif
    </div>
    @endauth
  @endif
    </div>
  </div>

<div class="form-group">
  <label for="keluhan">Keluhan</label>
  <textarea name="keluhan"  class="form-control" cols="30" rows="10" @guest readonly @endguest></textarea>
  @if($errors->has('keluhan'))
    <small id="emailHelp" class="form-text text-warning">{{ $errors->first('keluhan') }}</small>
@endif
</div>
      @guest
      @if (Route::has('login'))
      <div class="form-group" id="login">
      <a href="{{url('/login')}}" class="btn btn-block  btn-primary">Login</a>
      <small class="text-danger">*Login Terlebih dahulu untuk Booking (Terima Kasih)</small> 
    </div>
      @endif
      @else
      <button type="submit" class="btn btn-primary btn-block">Submit </button>
      @endguest
</form>
  </div>
</div>

<!-- penjelasan kartu -->

<link
  href="https://use.fontawesome.com/releases/v5.0.6/css/all.css"
  rel="stylesheet"
/>
<section class="pt-5 pb-5">
  <div class="container">
    <h5 class="text-center"></h5>
    <hr class="midline" />

    
           
          </div>
        </div>
    
</section>
    


<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
 $( function() {
    $( "#datepicker" ).datepicker({ minDate: 0 });
  } );
</script>
<script>

$(document).ready(function() {
    @guest
      // Delay the modal popup by 3 seconds
      setTimeout(function() {
        $('#loginModal').modal('show');
      }, 2000); // 1000 milliseconds = 1 seconds

      $('#loginModal').modal({
      backdrop: 'static', // Modal tidak bisa ditutup dengan klik di luar
      keyboard: false      // Menonaktifkan ESC key
    });
    @endguest

    
  });

  // Menonaktifkan ESC key untuk modal

 
$(document).ready(function() {
    $('input[name="tanggal"]').on('change', function() {
        var selectedDate = $(this).val();

        // Send an AJAX request to check the number of bookings for the selected date
        $.ajax({
            type: 'GET',
            url: '/check-booking-limit', // Set the URL to a route that checks the date's booking count
            data: { tanggal: selectedDate },
            success: function(response) {
                if (response.error) {
                    alert(response.message); // Display the error message from the backend
                    $('input[type="submit"]').prop('disabled', true); // Disable submit button
                } else {
                    $('input[type="submit"]').prop('disabled', false); // Enable submit button
                }
            }
        });
    });
});

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
      alert("The selected time is outside business hours. Please choose a time between 09:00 and 21:00.");
      $(this).val(''); // Optionally clear the input if it's invalid
    }
  });
});







// $(document).ready(function() {
//     // Menangani perubahan tanggal
//     $('input[name="tanggal"]').on('change', function() {
//         var selectedDate = $(this).val();

//         // Kirim request AJAX untuk mendapatkan waktu yang tersedia untuk tanggal tersebut
//         $.ajax({
//             type: 'GET',
//             url: '/get-booking-schedule', // Endpoint untuk mengambil jadwal
//             success: function(response) {
//                 var availableTimes = [];
//                 // Cari jadwal berdasarkan tanggal yang dipilih
//                 response.forEach(function(schedule) {
//                     if (schedule.date === selectedDate && schedule.status === 'Tersedia') {
//                         availableTimes = schedule.available_times;
//                     }
//                 });

//                 // Update dropdown/jam berdasarkan waktu yang tersedia
//                 var timeSelect = $('input[name="jam"]');
//                 timeSelect.empty(); // Kosongkan dropdown/jam

//                 if (availableTimes.length > 0) {
//                     availableTimes.forEach(function(time) {
//                         timeSelect.append('<option value="' + time + '">' + time + '</option>');
//                     });
//                 } else {
//                     timeSelect.append('<option value="" disabled>Pilih Jam</option>');
//                 }
//             }
//         });
//     });
// });




</script>




