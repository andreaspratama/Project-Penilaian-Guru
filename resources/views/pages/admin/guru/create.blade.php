@extends('layouts.admin')

@section('title')
    Dashboard | Guru
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
            Tambah Data
          </h1>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="{{route('guru.index')}}">Guru</a>
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
        <h3 class="block-title">Tambah Guru</h3>
      </div>
      <div class="block-content block-content-full">
        <form action="{{route('guru.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row push">
            <div class="col-lg-12 col-xl-12">
              <div class="mb-4">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
              <div class="mb-4">
                <label class="form-label" for="unit_id">Unit</label>
                <select class="form-select" id="unit" name="unit_id">
                  <option selected="">-- Pilih --</option>
                  @foreach ($units as $un)
                    <option value="{{$un->id}}">{{$un->nama}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email">
              </div>
              <div class="mb-4">
                <label class="form-label" for="dinilai">Yang Dinilai</label>
                <select class="form-select js-example-basic-multiple" aria-label="Default select example" name="dinilai[]" id="guru" multiple>
                  <option value="">Pilih Guru</option>
                </select>
              </div>
              <div>
                <button class="btn btn-primary" type="submit">Tambah Data</button>
                <a href="{{route('guru.index')}}" class="btn btn-secondary">Batal</a>
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
    <script type="text/javascript">
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
    </script>
    <script>
      $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
      });
    </script>
@endpush