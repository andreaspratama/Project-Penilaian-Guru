@extends('layouts.admin')

@section('title')
    Dashboard | Penilai
@endsection

@section('content')
  <main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
      <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
          <div class="flex-grow-1">
            <h1 class="h3 fw-bold mb-2">
              Penilai
            </h1>
          </div>
          <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
              <li class="breadcrumb-item">
                <a class="link-fx" href="{{route('penilai.index')}}">Penilai</a>
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
            <a href="{{route('penilai.create')}}" class="btn btn-primary">Tambah Penilai</a>
          </h3>
          <div class="block-options">
            <button type="button" class="btn-block-option">
              <i class="si si-settings"></i>
            </button>
          </div>
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter" id="penilai">
              <thead>
                <tr>
                  <th class="text-center" style="width: 100px;">
                    <i class="far fa-number"></i>
                  </th>
                  <th>Nama</th>
                  <th>Unit</th>
                  <th>Email</th>
                  <th style="width: 30%;">Aksi</th>
                </tr>
              </thead>
              <tbody></tbody>
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
      $(document).ready(function() {
        $('#penilai').on('click', '.delete', function() {
            var penilaiid = $(this).attr('data-id');
            swal({
            title: "Delete",
            text: "Apakah kamu yakin?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
              if (willDelete) {
                window.location = "deletePenilai/"+penilaiid+"";
              } else {
                swal("Data tidak terhapus");
              }
            });
        });
      });
    </script>
    <script>
        var datatable = $('#penilai').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                {data: 'number', name: 'number'},
                {data: 'nama', name: 'nama'},
                {data: 'unit.nama', name: 'unit.nama'},
                {data: 'email', name: 'email'},
                {
                  data: 'aksi',
                  name: 'aksi',
                  orderable: false,
                  searcable: false,
                  width: '20%'
                },
            ]
        })
    </script>
    <script>
      new DataTable('#penilai');
    </script>
@endpush