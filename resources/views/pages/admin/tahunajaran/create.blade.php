@extends('layouts.admin')

@section('title')
    Dashboard | Tahun Ajaran
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
              <a class="link-fx" href="{{route('tahunajaran.index')}}">Tahun Ajaran</a>
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
        <h3 class="block-title">Tambah Tahun Ajaran</h3>
      </div>
      <div class="block-content block-content-full">
        <form action="{{route('tahunajaran.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row push">
            <div class="col-lg-12 col-xl-12">
              <div class="mb-4">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
              <div class="mb-4">
                <label class="form-label" for="status">Status</label>
                <select class="form-select" id="status" name="status">
                  <option selected="">-- Pilih --</option>
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
              <div>
                <button class="btn btn-primary" type="submit">Tambah Data</button>
                <a href="{{route('tahunajaran.index')}}" class="btn btn-secondary">Batal</a>
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