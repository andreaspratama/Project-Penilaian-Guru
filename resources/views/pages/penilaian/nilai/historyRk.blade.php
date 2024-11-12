@extends('layouts.admin')

@section('title')
    Dashboard | Nilai
@endsection

@section('content')
  <main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
      <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
          <div class="flex-grow-1">
            <h1 class="h3 fw-bold mb-2">
              Nilai Guru
            </h1>
          </div>
          <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
              <li class="breadcrumb-item">
                <a class="link-fx" href="{{route('nilaiGuru')}}">Nilai Guru</a>
              </li>
              <li class="breadcrumb-item" aria-current="page">
                Responsive
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
      <!-- Full Table -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">
            Detail Nilai Guru {{$guru->nama}}
          </h3>
          <a href="{{route('nilaiGrDetail', $guru->id)}}" class="btn btn-secondary mx-2">Kembali</a>
          {{-- @if (auth()->user()->role == 'ADMIN')
            <a href="{{route('nilaiGrEdit', $guru->id)}}" class="btn btn-warning">Edit Nilai</a>
          @endif --}}
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter table-responsive table-hover" id="indikatornilai">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Perilaku</th>
                  <th>Tutur Kata</th>
                  <th>Kepedulian</th>
                  <th>Penampilan</th>
                  <th>Sikap Kerja</th>
                  <th>Kerjasama dengan Pendidik</th>
                  <th>Kerjasama dengan Tenaga Kependidikan</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $counter = 1; // Reset nomor untuk setiap guru baru
                @endphp
                @foreach ($rksem as $item)
                    @if ($item->guru_id === $guru->id)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->perilakuKepri}}</td>
                            <td>{{$item->tuturkataKepri}}</td>
                            <td>{{$item->kepedulianKepri}}</td>
                            <td>{{$item->penampilanKepri}}</td>
                            <td>{{$item->sikerKepri}}</td>
                            <td>{{$item->samapendSos}}</td>
                            <td>{{$item->samatenpendSos}}</td>
                            <td>{{$item->hasil}}</td>
                        </tr>
                    @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- END Full Table -->
    </div>
    <!-- END Page Content -->
  </main>
  @include('sweetalert::alert')
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
@endpush

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      new DataTable('#nilai');
    </script>
@endpush