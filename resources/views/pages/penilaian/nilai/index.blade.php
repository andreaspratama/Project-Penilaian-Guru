@extends('layouts.admin')

@section('title')
    Penilaian | Nilai
@endsection

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Nilai</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('guru.store')}}">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">TA</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" name="ta">
                        <option selected>-- Pilih TA --</option>
                        @foreach ($tas as $ta)
                          <option value="{{$ta->id}}">{{$ta->nama}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" name="semester">
                        <option selected>-- Pilih Semester --</option>
                        <option value="Satu">Satu</option>
                        <option value="Dua">Dua</option>
                      </select>
                    </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Unit</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="unit" id="unit">
                      <option selected>-- Pilih Unit --</option>
                      @foreach ($units as $unit)
                        <option value="{{$unit->id}}">{{$unit->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Guru</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" name="guru" id="guru">
                        <option value="">Pilih Guru</option>
                      </select>
                    </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

</main><!-- End #main -->
@endsection

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
@endpush