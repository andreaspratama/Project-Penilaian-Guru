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
            Nilai Guru
            @if (auth()->user()->role == 'RK')
              @php
                  // Ubah string dinilai yang dipisahkan koma menjadi array
                  $dinilaiIds = explode(',', auth()->user()->penilai->dinilai);
              @endphp                
            @endif
            @if (auth()->user()->role == 'OS')
              @php
                  // Ubah string dinilai yang dipisahkan koma menjadi array
                  $dinilaiIds = explode(',', auth()->user()->penilai->dinilai);
              @endphp                
            @endif
            @if (auth()->user()->role == 'GURU')
              @php
                  // Ubah string dinilai yang dipisahkan koma menjadi array
                  $dinilaiIds = explode(',', auth()->user()->guru->dinilai);
              @endphp                
            @endif
          </h3>
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter" id="indikatornilai">
              <thead>
                <tr>
                  <th class="text-center" style="width: 10%;">
                    No
                  </th>
                  <th>Guru</th>
                  <th style="width: 30%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
                @foreach ($gurus as $gr)
                  @if (auth()->user()->role == 'GURU')
                      @if ($gr->user_id == auth()->user()->id)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{$gr->nama}}</td>
                          <td>
                              <a href="{{route('nilaiGr', $gr->id)}}" class="btn btn-primary">Nilai</a>
                              <a href="{{route('nilaiGrDetail', $gr->id)}}" class="btn btn-warning">Detail Nilai</a>
                          </td>
                        </tr>
                      @endif
                  @elseif(auth()->user()->role == 'GURU')
                        @if (in_array($gr->id, $dinilaiIds))
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $gr->nama }}</td>
                            <td>
                                <a href="{{ route('nilaiGr', $gr->id) }}" class="btn btn-primary">Nilai</a>
                            </td>
                          </tr>
                        @endif
                  @elseif(auth()->user()->role == 'ADMIN')
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{$gr->nama}}</td>
                      <td>
                          {{-- <a href="{{route('nilaiGr', $gr->id)}}" class="btn btn-primary">Nilai</a> --}}
                          <a href="{{route('nilaiGrDetail', $gr->id)}}" class="btn btn-warning">Detail Nilai</a>
                      </td>
                    </tr>
                  @elseif(auth()->user()->role == 'RK')
                    @if (in_array($gr->id, $dinilaiIds)) <!-- Cek apakah ID guru ada di array -->
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $gr->nama }}</td>
                            <td>
                                <a href="{{ route('nilaiGr', $gr->id) }}" class="btn btn-primary">Nilai</a>
                            </td>
                        </tr>
                    @endif
                    {{-- @if ($gr->id == auth()->user()->penilai->dinilai)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$gr->nama}}</td>
                        <td>
                            <a href="{{route('nilaiGr', $gr->id)}}" class="btn btn-primary">Nilai</a>
                        </td>
                      </tr>
                    @endif --}}
                  @elseif(auth()->user()->role == 'OS')
                    @if (in_array($gr->id, $dinilaiIds)) <!-- Cek apakah ID guru ada di array -->
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $gr->nama }}</td>
                            <td>
                                <a href="{{ route('nilaiGr', $gr->id) }}" class="btn btn-primary">Nilai</a>
                            </td>
                        </tr>
                    @endif
                  @else
                    @if ($gr->unit == auth()->user()->penilai->unit)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$gr->nama}}</td>
                        <td>
                            <a href="{{route('nilaiGr', $gr->id)}}" class="btn btn-primary">Nilai</a>
                            {{-- <a href="{{route('nilaiGrDetail', $gr->id)}}" class="btn btn-warning">Detail Nilai</a> --}}
                        </td>
                      </tr>
                    @endif
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
    {{-- <script>
      $(document).ready(function() {
        $('#nilaikepribadian').on('click', '.delete', function() {
            var nilaiid = $(this).attr('data-id');
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
                window.location = "deleteNilai/"+nilaiid+"";
              } else {
                swal("Data tidak terhapus");
              }
            });
        });
      });
    </script>
    <script>
        var datatable = $('#nilai').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                {data: 'number', name: 'number'},
                {data: 'komponen', name: 'komponen'},
                {data: 'definisi', name: 'definisi'},
                {data: 'role', name: 'role'},
                {
                  data: 'aksi',
                  name: 'aksi',
                  orderable: false,
                  searcable: false,
                  width: '20%'
                },
            ]
        })
    </script> --}}
    <script>
      new DataTable('#indikatornilai');
    </script>
@endpush