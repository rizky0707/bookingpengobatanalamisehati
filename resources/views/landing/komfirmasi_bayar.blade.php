<link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/css/vendor.bundle.base.css')}}">

<!-- Layout styles -->
<link rel="stylesheet" href="{{asset('assets/admin/assets/css/style.css')}}">
<!-- End layout styles -->
<link rel="shortcut icon" href="{{asset('assets/admin/assets/images/real-logo.png')}}" />

<div class="jumbotron jumbotron-fluid d-flex flex-wrap align-items-center bg-light">
  <div class="container">
    <h3>Konfirmasi Pembayaran Form</h3>
  </div>
</div>

<!-- search box -->
<div class="container shadow p-4 mb-1 bg-white rounded col-md-8">
  <form class="forms-sample" method="POST" action="{{route('komfirmasiPembayaran.store')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="booking_id" value="{{ $booking_id }}">

    <div class="form-group">
      <label for="nama_pengirim">Nama Pengirim</label>
      <input type="text" name="nama_pengirim" class="form-control" id="nama_pengirim" placeholder="Nama Pengirim">
      @if($errors->has('nama_pengirim'))
        <small id="emailHelp" class="form-text text-warning">{{ $errors->first('nama_pengirim') }}</small>
      @endif
    </div>

    <div class="form-group">
      <label for="nomor_rekening_pengirim">Nomor Rekening Pengirim</label>
      <input type="number" name="nomor_rekening_pengirim" class="form-control" id="nomor_rekening_pengirim" placeholder="Nomor Rekening Pengirim">
      @if($errors->has('nomor_rekening_pengirim'))
        <small id="emailHelp" class="form-text text-warning">{{ $errors->first('nomor_rekening_pengirim') }}</small>
      @endif
    </div>

    <div class="form-group">
      <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
      <input type="file" name="bukti_pembayaran" class="form-control" accept="image/*" id="bukti_pembayaran" placeholder="Upload Bukti Pembayaran">
      @if($errors->has('bukti_pembayaran'))
        <small id="bukti_pembayaran" class="form-text text-warning">{{ $errors->first('bukti_pembayaran') }}</small>
      @endif
    </div>

    <!-- Image Preview Section -->
    <div class="form-group">
      <label for="imagePreview">Image Preview</label>
      <br>
      <img id="imagePreview" src="" alt="Image Preview" style="display:none; max-width: 100%; max-height: 300px;"/>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Submit</button>
  </form>
</div>

<!-- External JS Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
  // Script to handle the image preview
  document.getElementById("bukti_pembayaran").addEventListener("change", function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      
      reader.onload = function(e) {
        const imgElement = document.getElementById("imagePreview");
        imgElement.src = e.target.result;
        imgElement.style.display = "block";  // Show the image
      };

      reader.readAsDataURL(file); // Read the image as a data URL
    }
  });
</script>
