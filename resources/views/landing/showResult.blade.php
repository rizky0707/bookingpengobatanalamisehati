<link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/css/vendor.bundle.base.css')}}">

<link rel="stylesheet" href="{{asset('assets/admin/assets/css/style.css')}}">
<!-- End layout styles -->
<link rel="shortcut icon" href="{{asset('assets/admin/assets/images/logo-real.png')}}" />
<div class="jumbotron jumbotron-fluid d-flex flex-wrap align-items-center bg-light">
  <div class="container">
  <div class="row">
      <div class="col">
        <h3>Show Result</h3>
      </div>
      <div class="col">
        <h3 align="right"><a href="{{route('home')}}" class="btn btn-outline-primary">Dashboard</a></h3>
      </div>
      </div>
  </div>
  </div>

  <div class="container shadow p-4 mb-1 bg-white rounded col-md-8" style="background-image: url('http://localhost:8000/assets/admin/assets/images/logo-watermark.png');background-size: 100%;background-repeat: no-repeat;background-position: center;">

{{-- <div class="container shadow p-4 mb-1 bg-white rounded col-md-8"> --}}

  @if ($message = Session::get('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Berhasil !</strong> Terima Kasih Atas Pembayarannya.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

 @foreach ($booking as $item)
  <div class="row">
    <div class="col">
      <label for="name">Nama</label>
    </div>
    <div class="col">
      <p>{{$item->nama}}</p>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <label for="name">No HP</label>
    </div>
  <div class="col">
    <p>{{$item->nohp}}</p>
</div>
</div>

<div class="row">
  <div class="col">
    <label for="nohp">Alamat</label>
  </div>
  <div class="col">
    <p>{{$item->alamat}}</p>
  </div>
</div>


<div class="row">
  <div class="col">
    <label for="name">Tanggal Booking</label>

  </div>
  <div class="col">
    <p>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('D MMMM YYYY') }}</p>

  </div>
</div>

<div class="row">
  <div class="col">
    <label for="jam">Jam</label>
  </div>
  <div class="col">
    <p>{{$item->jam}}</p>
  </div>
</div>
  {{-- <div class="row">
  <div class="col">
    <label>Kategori</label>
  </div>
  <div class="col"> 
    <p>{{$item->category->name}}</p>     
  </div>
</div> --}}
<div class="row">
  <div class="col">
      <label>Pelayanan</label>
  </div>
  <div class="col">
      <p>{{$item->pelayanan}}</p>
  </div>
  </div>
  {{-- <div class="row">
    <div class="col">
      <label>Dokter</label>
    </div>
    <div class="col">
      <p>{{$item->doctor->name}}</p>
    </div>
  </div> --}}





<div class="row">
  <div class="col">
      <label>Keluhan</label>
  </div>
  <div class="col">
      <p><i>{{$item->keluhan}}</i></p>
  </div>
  </div>

{{-- setting --}}

<div class="row">
  <div class="col">
    <label for="nohp"><b>Biaya Pendaftaran</b></label>
  </div>
  <div class="col">
    <p><b>@currency($item->nominal)</b></p>
  </div>
</div>

@foreach($settings as $setting)
<div class="row">
  <div class="col">
    <label for="nama_bank"><b>Nama Bank</b></label>
  </div>
  <div class="col">
    <p><b>{{$setting->nama_bank}}</b>     
    </p>
  </div>
</div>

<div class="row">
  <div class="col">
    <label for="nohp"><b>Nama Rekening</b></label>
  </div>
  <div class="col">
    <p><b>{{$setting->nama_rek}}</b>     
    </p>
  </div>
</div>

<div class="row">
  <div class="col">
    <label for="norek"><b>Nomor Rekening</b></label>
  </div>
  <div class="col">
    <p id="accountNumber"><b>{{$setting->no_rek}}</b>     
      <button id="copyButton" class="btn btn-primary" style="
    padding-left: 1px;
    padding-right: 1px;
    padding-bottom: 1px;
    padding-top: 1px;
    margin-bottom: 10px;
">Copy</button>
    </p>
  </div>
</div>

<div class="row">
  <div class="col">
    <label for="batas"><b>Batas Pembayaran</b></label>
  </div>
  <div class="col">
    <p><b>Jam 24:00 | {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('D MMMM YYYY') }}</b>     
    </p>
  </div>
</div>

          <div class="form-group" id="komfirmasi">
      <a href="{{route('komfirmasiPembayaran.create')}}" class="btn btn-block  btn-primary">1. Konfirmasi Pembayaran</a>
      <small class="text-danger">*Lanjutkan dengan Konfirmasi Pembayaran sebagai bukti BOOKING </small> 
    </div>

    <div class="form-group" id="komfirmasi">
      <a href="https://wa.me/{{ preg_replace('/^0/', '62', $setting->wa)}}?text=*{{$setting->title}}*%0A*{{ Auth::user()->no_rm }}*%0ATanggal%20%3A%*{{$item->tanggal}}*%0ANama%20%3A%20{{$item->nama}}%0AJam%20%3A%20{{$item->jam}}%0APalayanan%20%3A%20{{$item->pelayanan}}%0AALamat%20%3A%20{{$item->alamat}}%0AKeluhan%20%3A%20_{{$item->keluhan}}_%0A--------------------------------------------------------%0A*TUNJUKAN BUKTI BOOKING WA SAAT DATANG*%0A{{$setting->link}}" class="btn btn-block  btn-primary">2. Lanjutkan Kirim WA Klinik</a>
      <small class="text-danger">*Lanjutkan kirim ke WA Klinik</small> 
    </div>
      @endforeach
     @endforeach
</form>
  </div>
</div>
<script>
  // Mengakses tombol dan elemen p
  const copyButton = document.getElementById('copyButton');
  const accountNumber = document.querySelector('#accountNumber b').innerText; // Get text inside <b> tag

  // Event listener untuk tombol Copy
  copyButton.addEventListener('click', function() {
    // Menggunakan API Clipboard untuk menyalin teks
    navigator.clipboard.writeText(accountNumber).then(function() {
      // Mengubah teks tombol setelah salinan berhasil
      copyButton.textContent = 'Copied!'; // Text on button changes to 'Copied!'

      // Optional: Reset the button text back to 'Copy' after a short delay
      setTimeout(function() {
        copyButton.textContent = 'Copy';
      }, 2000); // Reset after 2 seconds
    }).catch(function(error) {
      console.error('Gagal menyalin: ', error);
    });
  });
</script>


<script src="{{asset('assets/admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    



