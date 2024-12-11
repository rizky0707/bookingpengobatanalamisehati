@extends('layouts.app')
@section('title', 'Create Diagnosa')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Form Diagnosa Create</h3>
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
                <h4 class="card-title">Create Diagnosa</h4>
                <p class="card-description"> PAS </p>
                <form class="forms-sample" method="POST" action="{{ route('rawatJalan.store') }}">
                    @csrf
                    @foreach($booking_details as $booking)
                    <input type="hidden" name="booking_id" value="{{ $booking['booking_id'] }}">
                    <input type="hidden" name="user_id" value="{{ $booking['user_id'] }}">
                  @endforeach

                  <div class="form-group">
                    <label for="penyakit">Penyakit </label>
                    <textarea name="penyakit" id="penyakit" class="form-control" cols="30" rows="10">{{ old('penyakit') }}</textarea>
                    @if($errors->has('penyakit'))
                        <small id="emailHelp" class="form-text text-warning">{{ $errors->first('penyakit') }}</small>
                    @endif
                  </div>

                  <!-- Container for dynamic obat and jumlah input -->
                  <div id="obat-container">
                    <div class="row obat-row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="obat">Obat</label>
                          <select class="form-control obat-select" name="obat[]">
                            <option value="0" disabled selected>-- Pilih obat --</option>
                            @foreach($obatDiagnosa as $item)
                              <option value="{{ $item->nama_obat }}" data-id="{{ $item->id }}" data-stok="{{ $item->stok }}">{{ $item->nama_obat }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="jumlah">Jumlah</label>
                          <input type="number" class="form-control jumlah-input" name="jumlah[]" min="1" value="0" disabled>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="btn btn-gradient-primary form-control" id="tambah-obat">+ tambah</button>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="btn btn-gradient-danger form-control kurangi-obat">- kurangi</button>
                      </div>
                    </div>
                  </div>

                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" name="cek_diagnosa" value="approve_Diagnosa" class="form-check-input"> Setujui Diagnosa
                      </label>
                      @if($errors->has('cek_diagnosa'))
                        <small id="emailHelp" class="form-text text-warning">{{ $errors->first('cek_diagnosa') }}</small>
                      @endif
                    </div>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Menambah selectbox baru
    $('#tambah-obat').click(function() {
      var newRow = $('<div class="row mt-3">')
                    .append('<div class="col-md-4"><div class="form-group"><label for="obat">Obat</label><select class="form-control obat-select" name="obat[]"><option value="0" disabled selected>-- Pilih obat --</option>@foreach($obatDiagnosa as $item)<option value="{{ $item->id }}" data-stok="{{ $item->stok }}">{{ $item->nama_obat }}</option>@endforeach</select></div></div>')
                    .append('<div class="col-md-4"><div class="form-group"><label for="jumlah">Jumlah</label><input type="number" class="form-control jumlah-input" name="jumlah[]" min="1" value="0" disabled></div></div>')
                    .append('<div class="col-md-2"><button type="button" class="btn btn-gradient-danger form-control kurangi-obat">- kurangi</button></div>');

      $('#obat-container').append(newRow);
    });

    // Mengurangi selectbox
    $(document).on('click', '.kurangi-obat', function() {
      $(this).closest('.row').remove();
    });

    // Ketika memilih obat, tampilkan jumlah
    $(document).on('change', '.obat-select', function() {
      var stok = $(this).find('option:selected').data('stok');  // Mengambil data stok obat
      var jumlahInput = $(this).closest('.row').find('.jumlah-input');
      jumlahInput.val(0).prop('disabled', true);  // Reset dan nonaktifkan input jumlah saat memilih obat baru

      if (stok > 0) {
        jumlahInput.prop('disabled', false);  // Aktifkan input jumlah jika stok tersedia
        jumlahInput.attr('max', stok).val(1);  // Atur max stok dan default value
      } else {
        jumlahInput.prop('disabled', true);  // Nonaktifkan input jika stok kosong
      }
    });

    // Submit form dengan AJAX untuk mengurangi stok
    $('form').on('submit', function(event) {
      event.preventDefault(); // Mencegah form submit secara default

      var obatIds = [];
      var jumlahs = [];

      // Ambil data obat dan jumlah
      $('select[name="obat[]"]').each(function() {
        obatIds.push($(this).val()); // Ambil ID obat
      });

      $('input[name="jumlah[]"]').each(function() {
        jumlahs.push($(this).val()); // Ambil jumlah yang dipilih
      });

      // Kirim AJAX request untuk mengurangi stok
      $.ajax({
        url: "{{ route('rawatJalan.kurangiStok') }}",
        type: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          obat_ids: obatIds,
          jumlahs: jumlahs
        },
        success: function(response) {
          if (response.status === 'success') {
            alert('Stok berhasil dikurangi!');
            // Sekarang kirim form ke server untuk proses lebih lanjut
            $('form')[0].submit();
          }
        },
        error: function(error) {
          alert('Terjadi kesalahan saat mengurangi stok');
        }
      });
    });
  });
</script>
