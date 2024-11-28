@extends('layouts.admin')

@section('title')
    Dashboard | Penilai
@endsection

@section('content')
  <!-- Main Container -->
<main id="main-container">
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-2">
            Edit Data
          </h1>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="{{route('penilai.index')}}">Penilai</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              Elements
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="content">
    <!-- Basic -->
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">Edit Penilai</h3>
      </div>
      @php
          $selectedDinilai = explode(',', $item->dinilai); // Mengubah string menjadi array
      @endphp
      <div class="block-content block-content-full">
        <form action="{{route('penilai.update', $item->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row push">
            <div class="col-lg-12 col-xl-12">
              <div class="mb-4">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{$item->nama}}">
              </div>
              <div class="mb-4">
                <label class="form-label" for="unit_id">Unit</label>
                <select class="form-select" id="unit" name="unit_id" data-unit-id="{{ $item->unit_id }}">
                  <option value="{{$item->unit_id}}">-- Ubah Jika Diperlukan --</option>
                  @foreach ($units as $un)
                    <option value="{{$un->id}}">{{$un->nama}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$item->email}}">
              </div>
              <div class="mb-4">
                <label class="form-label" for="dinilai">Yang Dinilai</label>
                <select class="form-select js-example-basic-multiple" aria-label="Default select example" name="dinilai[]" id="guru" multiple>
                  <option value="">Pilih Guru</option>
                  @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}" {{ in_array($guru->id, $selectedDinilai) ? 'selected' : '' }}>
                      {{ $guru->nama }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="mb-4">
                <label class="form-label" for="role">Role</label>
                <select class="form-select" id="role" name="role">
                  <option>-- Pilih --</option>
                  <option value="KS" @if($item->role == 'KS') selected @endif>Kepala Sekolah</option>
                  <option value="WAKAKUR" @if($item->role == 'WAKAKUR') selected @endif>Waka Kurikulum</option>
                  <option value="OS" @if($item->role == 'OS') selected @endif>Orang Tua / Siswa</option>
                  <option value="RK" @if($item->role == 'RK') selected @endif>Rekan Kerja</option>
                </select>
              </div>
              <div>
                <button class="btn btn-primary" type="submit">Tambah Data</button>
                <a href="{{route('penilai.index')}}" class="btn btn-secondary">Batal</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- END Basic -->
  </div>
  <!-- END Page Content -->
</main>
<!-- END Main Container -->
@endsection

@push('prepend-style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script type="text/javascript">
        $(document).ready(function () {
            $('#unit').on('change', function () {
                var unitId = this.value;
                $('#guru').html('');
                $.ajax({
                    url: '{{ route('ambilGuru') }}?unit_id='+unitId,
                    type: 'get',
                    success: function (res) {
                        $('#guru').html('<option value="">Pilih Guru</option>');
                        $.each(res, function (key, value) {
                            $('#guru').append('<option value="' + value
                                .id + '">' + value.nama + '</option>');
                        });
                    }
                });
            });
        });
    </script> --}}

    <script type="text/javascript">
      $(document).ready(function () {
          // Fungsi untuk memuat guru sesuai unit
          function loadGuru(unitId, selected = []) {
              $('#guru').html(''); // Kosongkan dulu dropdown
              $.ajax({
                  url: '{{ route('ambilGuru') }}?unit_id=' + unitId,
                  type: 'get',
                  success: function (res) {
                      $('#guru').html('<option value="">Pilih Guru</option>'); // Tambahkan opsi default
                      $.each(res, function (key, value) {
                          let isSelected = selected.includes(value.nama) ? 'selected' : ''; // Menggunakan nama guru untuk seleksi
                          $('#guru').append('<option value="' + value.id + '" ' + isSelected + '>' + value.nama + '</option>');
                      });
                  }
              });
          }
    
          // Saat unit diubah
          $('#unit').on('change', function () {
              var unitId = $(this).val(); // Ambil nilai unit yang dipilih
              loadGuru(unitId); // Panggil fungsi untuk memuat guru sesuai unit yang dipilih
          });
    
          // Jika halaman dalam mode edit, kita muat guru yang sesuai dengan unit terpilih
          var unitId = $('#unit').data('unit-id');
          if (unitId) {
              var selectedDinilai = {!! json_encode($selectedDinilai) !!}; // Ambil array nama guru yang sudah dipilih
              loadGuru(unitId, selectedDinilai); // Panggil fungsi untuk memuat guru yang sesuai dengan unit saat halaman dimuat
          }
      });
    </script>
    
    {{-- <script type="text/javascript">
      $(document).ready(function () {
          // Fungsi untuk memuat guru sesuai unit
          function loadGuru(unitId, selected = []) {
              $('#guru').html(''); // Kosongkan dulu dropdown
              $.ajax({
                  url: '{{ route('ambilGuru') }}?unit_id=' + unitId,
                  type: 'get',
                  success: function (res) {
                      $('#guru').html('<option value="">Pilih Guru</option>'); // Tambahkan opsi default
                      $.each(res, function (key, value) {
                          let isSelected = selected.includes(value.id.toString()) ? 'selected' : '';
                          $('#guru').append('<option value="' + value.id + '" ' + isSelected + '>' + value.nama + '</option>');
                      });
                  }
              });
          }
  
          // Saat unit diubah
          $('#unit').on('change', function () {
              var unitId = $(this).val(); // Ambil nilai unit yang dipilih
              loadGuru(unitId); // Panggil fungsi untuk memuat guru sesuai unit yang dipilih
          });
  
          // Jika halaman dalam mode edit, kita muat guru yang sesuai dengan unit terpilih
          var unitId = $('#unit').data('unit-id');
          if (unitId) {
              var selectedDinilai = {!! json_encode($selectedDinilai) !!}; // Ambil array ID guru yang sudah dipilih
              loadGuru(unitId, selectedDinilai); // Muat guru yang sesuai dengan unit saat halaman dimuat
          }
      });
    </script> --}}
    <script>
      $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
      });
    </script>
@endpush