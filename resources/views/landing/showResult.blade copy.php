<link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/css/vendor.bundle.base.css')}}">
<!-- endinject -->
<!-- Plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="{{asset('assets/admin/assets/css/style.css')}}">
<!-- End layout styles -->
<link rel="shortcut icon" href="{{asset('assets/admin/assets/images/logo-real.png')}}" />
<div class="jumbotron jumbotron-fluid d-flex flex-wrap align-items-center bg-light">
  <div class="container">
  <h3>Show Result</h3>
  </div>
  </div>
<div class="container shadow p-4 mb-1 bg-white rounded col-md-8">
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
    <label for="jam">Jam</label>
  </div>
  <div class="col">
    <p>{{$item->jam}}</p>
  </div>
</div>
  <div class="row">
    <div class="col">
      <label>Lokasi</label>

    </div>
    <div class="col">
      <p>{{$item->lokasi}}</p>
    </div>
  </div>
  <div class="row">
  <div class="col">
    <label>Kategori</label>
  </div>
  <div class="col"> 
    <p>{{$item->category->name}}</p>     
  </div>
</div>
<div class="row">
  <div class="col">
      <label>Pelayanan</label>
  </div>
  <div class="col">
      <p>{{$item->service->pelayanan}}</p>
  </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Dokter</label>
    </div>
    <div class="col">
      <p>{{$item->doctor->name}}</p>
    </div>
  </div>
<div class="row">
  <div class="col">
    <label for="name">Tanggal</label>

  </div>
  <div class="col">
    <p>{{$item->tanggal}}</p>

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
    <label for="nohp">Tarif</label>
  </div>
  <div class="col">
    <p><b>@currency($item->tarif->nominal)</b></p>
  </div>
</div>

<div class="row">
  <div class="col">
    <label for="nohp">Transfer Ke No. Rek BCC</label>
  </div>
  <div class="col">
    <p id="accountNumber"><b>17391391</b>     
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

<script>
  // Mengakses tombol dan elemen p
  const copyButton = document.getElementById('copyButton');
  const accountNumber = document.getElementById('accountNumber').innerText;

  // Event listener untuk tombol Copy
  copyButton.addEventListener('click', function() {
    // Menggunakan API Clipboard untuk menyalin teks
    navigator.clipboard.writeText(accountNumber).then(function() {
      alert('Nomor Rekening telah disalin ke clipboard!');
    }).catch(function(error) {
      console.error('Gagal menyalin: ', error);
    });
  });
</script>


          <div class="form-group" id="WA">
            @foreach($settings as $setting)
      {{-- <a href="https://wa.me/{{$setting->wa}}?text=*{{$setting->title}}*%0ATanggal%20%3A%{{$item->tanggal}}%0ANama%20%3A{{$item->nama}}%0AJam%20%3A{{$item->jam}}%0APalayanan%20%3A{{$item->service->pelayanan}}%0ADokter%20%3A{{$item->doctor->name}}%0AAlamat%20%3A{{$item->alamat}}%0A" class="btn btn-block  btn-primary">Lanjutkan Kirim WA</a> --}}
      <a href="https://wa.me/{{$setting->wa}}?text=*{{$setting->title}}*%0ATanggal%20%3A%{{$item->tanggal}}%0ANama%20%3A%20{{$item->nama}}%0AJam%20%3A%20{{$item->jam}}%0APalayanan%20%3A%20Dokter%20{{$item->service->pelayanan}}%0ADokter%20%3A%20{{$item->doctor->name}}%0AAlamat%20%3A%20{{$item->alamat}}%0A--------------------------------------------------------%0A*TOLONG KOMFIRMASI DATANG*%0A{{$setting->link}}" class="btn btn-block  btn-primary">Lanjutkan Kirim WA</a>
      {{-- <a href="https://wa.me/+6287782995102?text=http%3A%2F%2Flocalhost%3A8000%2F">Lanjutkan Kirim WA</a> --}}
      <small class="text-danger">*Lanjutkan kirim ke WA untuk booking</small> 
      @endforeach
    </div>
     @endforeach
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

    <div class="card col-md-12 mt-2">
      <div
        id="carouselExampleControls"
        class="carousel slide"
        data-ride="carousel"
        data-interval="100000"
      >
        <div class="w-100 carousel-inner mb-5" role="listbox">
          <div class="carousel-item active">
            <div class="bg"></div>
            <div class="row">
              <div class="col-md-6">
                <div class="carousel-caption">
                  <div class="row">
                    <div class="col-sm-3 col-4 align-items-start">
                      <img
                        src="https://uploads.codesandbox.io/uploads/user/8e41599d-1575-4a05-b4b9-4673af3feb4f/HfnH-rama.png"
                        alt=""
                        class="rounded-circle img-fluid"
                      />
                    </div>
                    <div class="col-sm-9 col-8">
                      <h5>Micheal Smith - <span>Web Developer</span></h5>
                      <small
                        >Well incremented. Comes with recommended workout.
                        I'm using it to help with bladder leakage issues
                        that I've been experiencing since a recent
                        vasectomy.</small
                      >
                      <small class="smallest mute">- willi</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="carousel-caption">
                  <div class="row">
                    <div class="col-sm-3 col-4 align-items-start">
                      <img
                        src="https://uploads.codesandbox.io/uploads/user/8e41599d-1575-4a05-b4b9-4673af3feb4f/HfnH-rama.png"
                        alt=""
                        class="rounded-circle img-fluid"
                      />
                    </div>
                    <div class="col-sm-9 col-8">
                      <h5>Helena Doe - <span>Architect</span></h5>
                      <small
                        >Well incremented. Comes with recommended workout.
                        I'm using it to help with bladder leakage issues
                        that I've been experiencing since a recent
                        vasectomy.</small
                      >
                      <small class="smallest mute">- willi</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="bg"></div>
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="carousel-caption">
                  <div class="row">
                    <div class="col-sm-3 col-4 align-items-start">
                      <img
                        src="img/rama.png"
                        alt=""
                        class="rounded-circle img-fluid"
                      />
                    </div>
                    <div class="col-sm-9 col-8">
                      <h5>John Doe - <span>Ceo Mobile company</span></h5>
                      <small
                        >Well incremented. Comes with recommended workout.
                        I'm using it to help with bladder leakage issues
                        that I've been experiencing since a recent
                        vasectomy.</small
                      >
                      <small class="smallest mute">- willi</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="carousel-caption">
                  <div class="row">
                    <div class="col-sm-3 col-4 align-items-start">
                      <img
                        src="img/rama.png"
                        alt=""
                        class="rounded-circle img-fluid"
                      />
                    </div>
                    <div class="col-sm-9 col-8">
                      <h5>Helena Doe - <span>Architect</span></h5>
                      <small
                        >Well incremented. Comes with recommended workout.
                        I'm using it to help with bladder leakage issues
                        that I've been experiencing since a recent
                        vasectomy.</small
                      >
                      <small class="smallest mute">- willi</small>
                    </div>
                  </div>
                </div>
              </div>
           
          </div>
        </div>
    
</section>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    



