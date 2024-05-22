@extends('layouts.admin')

@section('title')
    Dashboard | Kepribadian
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
              <h5 class="card-title">Form Kepribadian</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('kepribadian.update', $item->id)}}">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Komponen</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="komponen" value="{{$item->komponen}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Definisi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="definisi" value="{{$item->definisi}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="role" value="{{$item->role}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('kepribadian.index')}}" class="btn btn-secondary">Batal</a>
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