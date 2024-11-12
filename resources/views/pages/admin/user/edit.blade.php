@extends('layouts.admin')

@section('title')
    Dashboard | User
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
              <a class="link-fx" href="{{route('user.index')}}">User</a>
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
        <h3 class="block-title">Edit User</h3>
      </div>
      <div class="block-content block-content-full">
        <form action="{{route('user.update', $item->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row push">
            <div class="col-lg-12 col-xl-12">
              <div class="mb-4">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}">
              </div>
              <div class="mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$item->email}}">
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
              <div class="mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="{{$item->password}}">
                <span class="text-danger">*ubah password jika ingin mengubah saja, jika tidak biarkan saja</span>
              </div>
              <div>
                <button class="btn btn-primary" type="submit">Edit Data</button>
                <a href="{{route('user.index')}}" class="btn btn-secondary">Batal</a>
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