@extends('layouts.admin')

@section('title')
    Dashboard | Nilai
@endsection

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Nilai</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Nilai</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                Tambah Nilai {{$gurus->nama}}
                {{-- {{$aspek->aspek}}
                {{$gurus->nama}} --}}
              </h5>

              <!-- Default Table -->
              <table class="table" id="nilaikepribadian">
                <thead>
                  <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Komponen</th>
                    <th scope="col">Definisi</th>
                    <th scope="col">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($gurus->indikatornilais as $gindi)
                    <form action="/dp3guru/guru/{{$gurus->id}}/editNilai" method="POST">
                      @csrf
                      <input type="text" name="indikatornilai_id" value="{{$aspek->id}}" hidden>
                      <tr>
                        <td>Perilaku</td>
                        <td>Kesesuaian dengan Iman dan etika Kristen</td>
                        <td>
                          <input type="text" class="form-control" name="prilaku" value="{{$gindi->pivot->prilaku}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Tutur Kata</td>
                        <td>Kesesuaian dengan Iman dan etika Kristen</td>
                        <td>
                          <input type="text" class="form-control" name="tuturkata" value="{{$gindi->pivot->prilaku}}">
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
                  @endforeach
                </tbody>
              </table>
              <!-- End small tables -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
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