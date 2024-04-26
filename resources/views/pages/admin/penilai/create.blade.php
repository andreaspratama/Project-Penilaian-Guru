@extends('layouts.admin')

@section('title')
    Dashboard | Penilai
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
              <h5 class="card-title">Form Penilai</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('penilai.store')}}">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Unit</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="unit_id">
                      <option selected>-- Pilih Unit --</option>
                      @foreach ($units as $unit)
                        <option value="{{$unit->id}}">{{$unit->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="email">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="role">
                      <option selected>-- Pilih Role --</option>
                      <option value="Admin">Admin</option>
                      <option value="Kepala Sekolah">Kepala Sekolah</option>
                      <option value="Waka">Waka</option>
                      <option value="Siswa/Ortu">Siswa/Ortu</option>
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