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
                {{$ta[0]->nama}}
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
            Nilai Guru {{$gurus->nama}}
          </h3>
          <a href="{{route('nilaiGr', $aspek->id)}}" class="btn btn-secondary">Batal</a>
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter" id="indikatornilai">
              <thead>
                <tr>
                  <th>Komponen</th>
                  <th>Definisi</th>
                  <th style="width: 40%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <form action="/dp3guru/guru/{{$gurus->id}}/tambahNilai" method="POST">
                  @csrf
                  <input type="text" name="indikatornilai_id" value="{{$aspek->id}}" hidden>
                  <tr>
                    <td>Perilaku</td>
                    <td>Kesesuaian dengan Iman dan etika Kristen</td>
                    <td>
                      <input type="text" class="form-control" name="prilaku">
                    </td>
                  </tr>
                  <tr>
                    <td>Tutur Kata</td>
                    <td>Kesesuaian dengan Iman dan etika Kristen</td>
                    <td>
                      <input type="text" class="form-control" name="tuturkata">
                    </td>
                  </tr>
                  <tr>
                    <td>Keuangan</td>
                    <td>Jujur dan bertanggung jawab</td>
                    <td>
                      <input type="text" class="form-control" name="keuangan">
                    </td>
                  </tr>
                  <tr>
                    <td>Kepedulian</td>
                    <td>Terhadap sesama dan lingkungan sekolah</td>
                    <td>
                      <input type="text" class="form-control" name="kepedulian">
                    </td>
                  </tr>
                  <tr>
                    <td>Persekutuan Doa/ Ibadah</td>
                    <td>Keaktifan (hadir dan terlibat)</td>
                    <td>
                      <input type="text" class="form-control" name="persekutuan">
                    </td>
                  </tr>
                  <tr>
                    <td>Penampilan</td>
                    <td>Bersih, rapi dan sopan</td>
                    <td>
                      <input type="text" class="form-control" name="penampilan">
                    </td>
                  </tr>
                  <tr>
                    <td>Sikap Kerja</td>
                    <td>Aktif dan positif</td>
                    <td>
                      <input type="text" class="form-control" name="sikapkerja">
                    </td>
                  </tr>
                  <tr>
                    <td>Masuk Kerja</td>
                    <td>Hadir penuh, ijin "jelas", tidak terlambat</td>
                    <td>
                      <input type="text" class="form-control" name="masukkerja">
                    </td>
                  </tr>
                  <tr>
                    <td>Kesetiaan pada YSKI</td>
                    <td>Kepatuhan  terhadap peraturan kepegawaian, Pelaksanaan tugas/ kesepakatan</td>
                    <td>
                      <input type="text" class="form-control" name="kesetiaanyski">
                    </td>
                  </tr>
                  <tr>
                    <td>Kesetiaan pada Pimpinan</td>
                    <td>Kepatuhan terhadap perintah pimpinan dan keputusan bersama</td>
                    <td>
                      <input type="text" class="form-control" name="kesetiaanpimpinan">
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <button class="btn btn-primary" type="submit">Simpan</button>
                    </td>
                  </tr>
                </form>
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
      new DataTable('#nilai');
    </script>
@endpush