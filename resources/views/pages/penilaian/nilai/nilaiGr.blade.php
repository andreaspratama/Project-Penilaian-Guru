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
              {{-- {{$tahasil->nama}} --}}
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
            Nilai Guru {{$guru->nama}}
            <br>
            <span class="text-danger blinking-text">*nilai yang diinputkan minimal 6, maksimal 10</span>
          </h3>
        </div>
        <div class="block-content">
          {{-- <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter" id="indikatornilai">
              <thead>
                <tr>
                  <th class="text-center" style="width: 100px;">
                    
                  </th>
                  <th>Nama</th>
                  <th style="width: 40%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
                @foreach ($gurus as $gr)
                    @if (auth()->user()->role === 'ADMIN')
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$gr->nama}}</td>
                        <td>
                            <a href="/dp3guru/prosNilaiGr/{{$gr->id}}/{{$aspek->id}}" class="btn btn-primary">Masukan Nilai</a>
                            @if (auth()->user()->role == 'ADMIN')
                              <a href="/dp3guru/prosEditNilaiGr/{{$gr->id}}/{{$aspek->id}}" class="btn btn-warning">Edit Nilai</a>
                            @endif
                            <a href="" class="btn btn-secondary">Detail Nilai</a>
                        </td>
                      </tr>
                    @else
                      @if ($gr->unit_id === auth()->user()->penilai->unit_id)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$gr->nama}}</td>
                        <td>
                            <a href="/dp3guru/prosNilaiGr/{{$gr->id}}/{{$aspek->id}}" class="btn btn-primary">Masukan Nilai</a>
                            @if (auth()->user()->role == 'ADMIN')
                              <a href="/dp3guru/prosEditNilaiGr/{{$gr->id}}/{{$aspek->id}}" class="btn btn-warning">Edit Nilai</a>
                            @endif
                            <a href="" class="btn btn-secondary">Detail Nilai</a>
                        </td>
                      </tr>
                      @endif
                    @endif
                @endforeach
              </tbody>
            </table>
          </div> --}}
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter" id="indikatornilai">
              <thead>
                <tr>
                  <th>Komponen</th>
                  <th>Definisi</th>
                  <th style="width: 40%;">Nilai</th>
                </tr>
              </thead>
              <tbody>
                @if (auth()->user()->role == 'KS')
                  <form action="/dp3guru/guru/{{$guru->id}}/tambahNilai" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $nilai->id ?? '' }}">
                    <input type="hidden" name="guru_id" value="{{$guru->id}}">
                    <tr>
                      <th>Aspek Kepribadian</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Perilaku</td>
                      <td>Kesesuaian dengan Iman dan etika Kristen</td>
                      <td>
                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="prilakuKepri" value="{{$nilai->prilakuKepri}}" disabled>
                            @else
                              <input type="text" class="form-control" name="prilakuKepri" value="{{old('prilakuKepri'), $nilai->prilakuKepri ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control @error('prilakuKepri') is-invalid @enderror" name="prilakuKepri" value="{{old('prilakuKepri'), $nilai->prilakuKepri ?? ''}}">
                        @endif
                        @error('prilakuKepri')
                          <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                        @enderror --}}
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="prilakuKepri" value="{{ $nilai->prilakuKepri }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="prilakuKepri" value="{{ old('prilakuKepri') ?? ($nilai->prilakuKepri ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('prilakuKepri') is-invalid @enderror" name="prilakuKepri" value="{{ old('prilakuKepri') ?? ($nilai->prilakuKepri ?? '') }}">
                        @endif
                        @error('prilakuKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Tutur Kata</td>
                      <td>Kesesuaian dengan Iman dan etika Kristen</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="tuturkataKepri" value="{{ $nilai->tuturkataKepri }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="tuturkataKepri" value="{{ old('tuturkataKepri') ?? ($nilai->tuturkataKepri ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('tuturkataKepri') is-invalid @enderror" name="tuturkataKepri" value="{{ old('tuturkataKepri') ?? ($nilai->tuturkataKepri ?? '') }}">
                        @endif
                        @error('tuturkataKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="tuturkataKepri" value="{{$nilai->tuturkataKepri}}" disabled>
                            @else
                              <input type="text" class="form-control" name="tuturkataKepri" value="{{old('tuturkataKepri'), $nilai->tuturkataKepri ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control @error('tuturkataKepri') @enderror" name="tuturkataKepri" value="{{old('tuturkataKepri'), $nilai->tuturkataKepri ?? ''}}">                        
                        @endif
                        @error('tuturkataKepri')
                          <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                        @enderror --}}
                      </td>
                    </tr>
                    <tr>
                      <td>Keuangan</td>
                      <td>Jujur dan bertanggung jawab</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="keuanganKepri" value="{{ $nilai->keuanganKepri }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="keuanganKepri" value="{{ old('keuanganKepri') ?? ($nilai->keuanganKepri ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('keuanganKepri') is-invalid @enderror" name="keuanganKepri" value="{{ old('keuanganKepri') ?? ($nilai->keuanganKepri ?? '') }}">
                        @endif
                        @error('keuanganKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="keuanganKepri" value="{{$nilai->keuanganKepri}}" disabled>
                            @else
                              <input type="text" class="form-control" name="keuanganKepri" value="{{old('keuanganKepri'), $nilai->keuanganKepri ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control @error('keuanganKepri') @enderror" name="keuanganKepri" value="{{old('keuanganKepri'), $nilai->keuanganKepri ?? ''}}">                       
                        @endif
                        @error('keuanganKepri')
                          <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                          </div>
                        @enderror --}}
                      </td>
                    </tr>
                    <tr>
                      <td>Kepedulian</td>
                      <td>Terhadap sesama dan lingkungan sekolah</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="kepedulianKepri" value="{{ $nilai->kepedulianKepri }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="kepedulianKepri" value="{{ old('kepedulianKepri') ?? ($nilai->kepedulianKepri ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('kepedulianKepri') is-invalid @enderror" name="kepedulianKepri" value="{{ old('kepedulianKepri') ?? ($nilai->kepedulianKepri ?? '') }}">
                        @endif
                        @error('kepedulianKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="kepedulianKepri" value="{{$nilai->kepedulianKepri}}" disabled>
                            @else
                              <input type="text" class="form-control" name="kepedulianKepri" value="{{old('kepedulianKepri'), $nilai->kepedulianKepri ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="kepedulianKepri" value="{{old('kepedulianKepri'), $nilai->kepedulianKepri ?? ''}}">                       
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <td>Persekutuan Doa/ Ibadah</td>
                      <td>Keaktifan (hadir dan terlibat)</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="persekutuanKepri" value="{{ $nilai->persekutuanKepri }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="persekutuanKepri" value="{{ old('persekutuanKepri') ?? ($nilai->persekutuanKepri ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('persekutuanKepri') is-invalid @enderror" name="persekutuanKepri" value="{{ old('persekutuanKepri') ?? ($nilai->persekutuanKepri ?? '') }}">
                        @endif
                        @error('persekutuanKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="persekutuanKepri" value="{{$nilai->persekutuanKepri}}" disabled>
                            @else
                              <input type="text" class="form-control" name="persekutuanKepri" value="{{old('persekutuanKepri'), $nilai->persekutuanKepri ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="persekutuanKepri" value="{{old('persekutuanKepri'), $nilai->persekutuanKepri ?? ''}}">                      
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <td>Penampilan</td>
                      <td>Bersih, rapi dan sopan</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="penampilanKepri" value="{{ $nilai->penampilanKepri }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="penampilanKepri" value="{{ old('penampilanKepri') ?? ($nilai->penampilanKepri ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('penampilanKepri') is-invalid @enderror" name="penampilanKepri" value="{{ old('penampilanKepri') ?? ($nilai->penampilanKepri ?? '') }}">
                        @endif
                        @error('penampilanKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="penampilanKepri" value="{{$nilai->penampilanKepri}}" disabled>
                            @else
                              <input type="text" class="form-control" name="penampilanKepri" value="{{old('penampilanKepri'), $nilai->penampilanKepri ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="penampilanKepri" value="{{old('penampilanKepri'), $nilai->penampilanKepri ?? ''}}">                      
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <td>Sikap Kerja</td>
                      <td>Aktif dan positif</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="sikapkerjaKepri" value="{{ $nilai->sikapkerjaKepri }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="sikapkerjaKepri" value="{{ old('sikapkerjaKepri') ?? ($nilai->sikapkerjaKepri ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('sikapkerjaKepri') is-invalid @enderror" name="sikapkerjaKepri" value="{{ old('sikapkerjaKepri') ?? ($nilai->sikapkerjaKepri ?? '') }}">
                        @endif
                        @error('sikapkerjaKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="sikapkerjaKepri" value="{{$nilai->sikapkerjaKepri}}" disabled>
                            @else
                              <input type="text" class="form-control" name="sikapkerjaKepri" value="{{old('sikapkerjaKepri'), $nilai->sikapkerjaKepri ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="sikapkerjaKepri" value="{{old('sikapkerjaKepri'), $nilai->sikapkerjaKepri ?? ''}}">                      
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <td>Masuk Kerja</td>
                      <td>Hadir penuh, ijin "jelas", tidak terlambat</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="masukkerjaKepri" value="{{ $nilai->masukkerjaKepri }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="masukkerjaKepri" value="{{ old('masukkerjaKepri') ?? ($nilai->masukkerjaKepri ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('masukkerjaKepri') is-invalid @enderror" name="masukkerjaKepri" value="{{ old('masukkerjaKepri') ?? ($nilai->masukkerjaKepri ?? '') }}">
                        @endif
                        @error('masukkerjaKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="masukkerjaKepri" value="{{$nilai->masukkerjaKepri}}" disabled>
                            @else
                              <input type="text" class="form-control" name="masukkerjaKepri" value="{{old('masukkerjaKepri'), $nilai->masukkerjaKepri ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="masukkerjaKepri" value="{{old('masukkerjaKepri'), $nilai->masukkerjaKepri ?? ''}}">                      
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <td>Kesetiaan pada YSKI</td>
                      <td>Kepatuhan  terhadap peraturan kepegawaian, Pelaksanaan tugas/ kesepakatan</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="kesetianyskiKepri" value="{{ $nilai->kesetianyskiKepri }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="kesetianyskiKepri" value="{{ old('kesetianyskiKepri') ?? ($nilai->kesetianyskiKepri ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('kesetianyskiKepri') is-invalid @enderror" name="kesetianyskiKepri" value="{{ old('kesetianyskiKepri') ?? ($nilai->kesetianyskiKepri ?? '') }}">
                        @endif
                        @error('kesetianyskiKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="kesetianyskiKepri" value="{{$nilai->kesetianyskiKepri}}" disabled>
                            @else
                              <input type="text" class="form-control" name="kesetianyskiKepri" value="{{old('kesetianyskiKepri'), $nilai->kesetianyskiKepri ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="kesetianyskiKepri" value="{{old('kesetianyskiKepri'), $nilai->kesetianyskiKepri ?? ''}}">                      
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <td>Kesetiaan pada Pimpinan</td>
                      <td>Kepatuhan terhadap perintah pimpinan dan keputusan bersama</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="kesetianpimKepri" value="{{ $nilai->kesetianpimKepri }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="kesetianpimKepri" value="{{ old('kesetianpimKepri') ?? ($nilai->kesetianpimKepri ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('kesetianpimKepri') is-invalid @enderror" name="kesetianpimKepri" value="{{ old('kesetianpimKepri') ?? ($nilai->kesetianpimKepri ?? '') }}">
                        @endif
                        @error('kesetianpimKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="kesetianpimKepri" value="{{$nilai->kesetianpimKepri}}" disabled>
                            @else
                              <input type="text" class="form-control" name="kesetianpimKepri" value="{{old('kesetianpimKepri'), $nilai->kesetianpimKepri ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="kesetianpimKepri" value="{{old('kesetianpimKepri'), $nilai->kesetianpimKepri ?? ''}}">                    
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <th>Aspek Pedagogi</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Manajemen Kelas</td>
                      <td>Pembelajaran yang kondusif, efektif dan efisien</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="manajkelasPeda" value="{{ $nilai->manajkelasPeda }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="manajkelasPeda" value="{{ old('manajkelasPeda') ?? ($nilai->manajkelasPeda ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('manajkelasPeda') is-invalid @enderror" name="manajkelasPeda" value="{{ old('manajkelasPeda') ?? ($nilai->manajkelasPeda ?? '') }}">
                        @endif
                        @error('manajkelasPeda')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="manajkelasPeda" value="{{$nilai->manajkelasPeda}}" disabled>
                            @else
                              <input type="text" class="form-control" name="manajkelasPeda" value="{{old('manajkelasPeda'), $nilai->manajkelasPeda ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="manajkelasPeda" value="{{old('manajkelasPeda'), $nilai->manajkelasPeda ?? ''}}">                    
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <td>Kualitas Pembelajaran</td>
                      <td>Rancangan, pelaksanaan, penilaian</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="kualitaspemPeda" value="{{ $nilai->kualitaspemPeda }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="kualitaspemPeda" value="{{ old('kualitaspemPeda') ?? ($nilai->kualitaspemPeda ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('kualitaspemPeda') is-invalid @enderror" name="kualitaspemPeda" value="{{ old('kualitaspemPeda') ?? ($nilai->kualitaspemPeda ?? '') }}">
                        @endif
                        @error('kualitaspemPeda')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="kualitaspemPeda" value="{{$nilai->kualitaspemPeda}}" disabled>
                            @else
                              <input type="text" class="form-control" name="kualitaspemPeda" value="{{old('kualitaspemPeda'), $nilai->kualitaspemPeda ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="kualitaspemPeda" value="{{old('kualitaspemPeda'), $nilai->kualitaspemPeda ?? ''}}">                    
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <th>Aspek Sosial</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Kerjasama dengan Siswa/ Orang Tua</td>
                      <td>Komunikasi dan relasi yang baik</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="samaortuSos" value="{{ $nilai->samaortuSos }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="samaortuSos" value="{{ old('samaortuSos') ?? ($nilai->samaortuSos ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('samaortuSos') is-invalid @enderror" name="samaortuSos" value="{{ old('samaortuSos') ?? ($nilai->samaortuSos ?? '') }}">
                        @endif
                        @error('samaortuSos')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="samaortuSos" value="{{$nilai->samaortuSos}}" disabled>
                            @else
                              <input type="text" class="form-control" name="samaortuSos" value="{{old('samaortuSos'), $nilai->samaortuSos ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="samaortuSos" value="{{old('samaortuSos'),$nilai->samaortuSos ?? ''}}">                    
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <td>Kerjasama dengan Pendidik</td>
                      <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama, Berbagi pengetahuan dan pemahaman keilmuan</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="samapendSos" value="{{ $nilai->samapendSos }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="samapendSos" value="{{ old('samapendSos') ?? ($nilai->samapendSos ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('samapendSos') is-invalid @enderror" name="samapendSos" value="{{ old('samapendSos') ?? ($nilai->samapendSos ?? '') }}">
                        @endif
                        @error('samapendSos')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="samapendSos" value="{{$nilai->samapendSos}}" disabled>
                            @else
                              <input type="text" class="form-control" name="samapendSos" value="{{old('samapendSos'), $nilai->samapendSos ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="samapendSos" value="{{old('samapendSos'), $nilai->samapendSos ?? ''}}">                    
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <td>Kerjasama dengan Tenaga Kependidikan</td>
                      <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="samatenpendSos" value="{{ $nilai->samatenpendSos }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="samatenpendSos" value="{{ old('samatenpendSos') ?? ($nilai->samatenpendSos ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('samatenpendSos') is-invalid @enderror" name="samatenpendSos" value="{{ old('samatenpendSos') ?? ($nilai->samatenpendSos ?? '') }}">
                        @endif
                        @error('samatenpendSos')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="samatenpendSos" value="{{$nilai->samatenpendSos}}" disabled>
                            @else
                              <input type="text" class="form-control" name="samatenpendSos" value="{{old('samatenpendSos'), $nilai->samatenpendSos ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="samatenpendSos" value="{{old('samatenpendSos'), $nilai->samatenpendSos ?? ''}}">                    
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <td>Organisasi/ Kegiatan Sekolah</td>
                      <td>Pemikiran untuk pengembangan/ perbaikan/ pemecahan masalah</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="organisasiSos" value="{{ $nilai->organisasiSos }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="organisasiSos" value="{{ old('organisasiSos') ?? ($nilai->organisasiSos ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('organisasiSos') is-invalid @enderror" name="organisasiSos" value="{{ old('organisasiSos') ?? ($nilai->organisasiSos ?? '') }}">
                        @endif
                        @error('organisasiSos')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="organisasiSos" value="{{$nilai->organisasiSos}}" disabled>
                            @else
                              <input type="text" class="form-control" name="organisasiSos" value="{{old('organisasiSos'), $nilai->organisasiSos ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="organisasiSos" value="{{old('organisasiSos'), $nilai->organisasiSos ?? ''}}">                    
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <th>Aspek Profesional</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Kompetensi Keilmuan</td>
                      <td>Pengembangan keilmuan, prestasi</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{ $nilai->kompkeilmuProfesional }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{ old('kompkeilmuProfesional') ?? ($nilai->kompkeilmuProfesional ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('kompkeilmuProfesional') is-invalid @enderror" name="kompkeilmuProfesional" value="{{ old('kompkeilmuProfesional') ?? ($nilai->kompkeilmuProfesional ?? '') }}">
                        @endif
                        @error('kompkeilmuProfesional')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            @if ($cekta)
                              <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{$nilai->kompkeilmuProfesional}}" disabled>
                            @else
                              <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{old('kompkeilmuProfesional'), $nilai->kompkeilmuProfesional ?? ''}}">
                            @endif
                          @endif
                        @else
                          <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{old('kompkeilmuProfesional'), $nilai->kompkeilmuProfesional ?? ''}}">                    
                        @endif --}}
                      </td>
                    </tr>
                    <tr> 
                      <td>Seminar / Literasi</td>
                      <td>Keaktifan mengikuti seminar / pelatihan, keaktifan membaca buku</td>
                      <td>
                        @if ($nilai)
                            @if (auth()->user()->role == 'KS')
                                @if ($cekta)
                                    <input type="text" class="form-control" name="seminarProfesional" value="{{ $nilai->seminarProfesional }}" disabled>
                                @else
                                    <input type="text" class="form-control" name="seminarProfesional" value="{{ old('seminarProfesional') ?? ($nilai->seminarProfesional ?? '') }}">
                                @endif
                            @endif
                        @else
                            <input type="text" class="form-control @error('seminarProfesional') is-invalid @enderror" name="seminarProfesional" value="{{ old('seminarProfesional') ?? ($nilai->seminarProfesional ?? '') }}">
                        @endif
                        @error('seminarProfesional')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="seminarProfesional" value="{{$nilai->seminarProfesional}}" disabled> --}}
                            {{-- @if ($cekta)
                              <input type="text" class="form-control" name="seminarProfesional" value="{{$nilai->seminarProfesional}}" disabled>
                            @else
                              <input type="text" class="form-control" name="seminarProfesional" value="{{old('seminarProfesional'), $nilai->seminarProfesional ?? ''}}">
                            @endif --}}
                          {{-- @endif
                        @else
                          <input type="text" class="form-control" name="seminarProfesional" value="{{old('seminarProfesional'), $nilai->seminarProfesional ?? ''}}">                  
                        @endif --}}
                      </td>
                    </tr>
                    <tr>
                      <td><b>Hasil</b></td>
                      <td></td>
                      <td>
                        @if ($nilai)
                          {{$nilai->hasil}}
                        @else
                          <b>Nilai belum diinputkan</b>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        @if ($nilai)
                          <b>Terimakasih sudah mengisi nilai</b>
                        @else
                          <button class="btn btn-primary" type="submit">Simpan</button>
                        @endif
                      </td>
                    </tr>
                  </form>
                @elseif(auth()->user()->role == 'WAKAKUR')
                  <form action="/dp3guru/guru/{{$guru->id}}/tambahNilaiWaka" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $nilaiwaka->id ?? '' }}">
                    <input type="hidden" name="guru_id" value="{{$guru->id}}">
                    <tr>
                      <th>Aspek Kepribadian</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Penampilan</td>
                      <td>Bersih, rapi dan sopan</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="penamKepri" value="{{$nilaiwaka->penamKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('penamKepri') is-invalid @enderror" name="penamKepri" value="{{old('penamKepri'), $nilaiwaka->penamKepri ?? ''}}">
                        @endif
                        @error('penamKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Sikap Kerja</td>
                      <td>Aktif dan positif</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="sikerKepri" value="{{$nilaiwaka->sikerKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('sikerKepri') is-invalid @enderror" name="sikerKepri" value="{{old('sikerKepri'), $nilaiwaka->sikerKepri ?? ''}}">                        
                        @endif
                        @error('sikerKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Masuk Kerja</td>
                      <td>Hadir penuh, ijin "jelas", tidak terlambat</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="maskerKepri" value="{{$nilaiwaka->maskerKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('maskerKepri') is-invalid @enderror" name="maskerKepri" value="{{old('maskerKepri'), $nilaiwaka->maskerKepri ?? ''}}">                       
                        @endif
                        @error('maskerKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Kesetiaan pada Pimpinan</td>
                      <td>Kepatuhan terhadap perintah pimpinan dan keputusan bersama</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="kesetiaanpimKepri" value="{{$nilaiwaka->kesetiaanpimKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('kesetiaanpimKepri') is-invalid @enderror" name="kesetiaanpimKepri" value="{{old('kesetiaanpimKepri'), $nilaiwaka->kesetiaanpimKepri ?? ''}}">                       
                        @endif
                        @error('kesetiaanpimKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <th>Aspek Pedagogi</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Value SPECIAL</td>
                      <td>Terintegrasi  dalam pembelajaran</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="valuePeda" value="{{$nilaiwaka->valuePeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('valuePeda') is-invalid @enderror" name="valuePeda" value="{{old('valuePeda'), $nilaiwaka->valuePeda ?? ''}}">                    
                        @endif
                        @error('valuePeda')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Manajemen Kelas</td>
                      <td>Pembelajaran yang kondusif, efektif dan efisien</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="manajkelasPeda" value="{{$nilaiwaka->manajkelasPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('manajkelasPeda') is-invalid @enderror" name="manajkelasPeda" value="{{old('manajkelasPeda'), $nilaiwaka->manajkelasPeda ?? ''}}">                    
                        @endif
                        @error('manajkelasPeda')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Penggunaan LMS</td>
                      <td>Aktif memanfaatkan dalam PBM</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="lmsPeda" value="{{$nilaiwaka->lmsPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('lmsPeda') is-invalid @enderror" name="lmsPeda" value="{{old('lmsPeda'), $nilaiwaka->lmsPeda ?? ''}}">                    
                        @endif
                        @error('lmsPeda')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Model pembelajaran</td>
                      <td>Flipped classroom, 4C dan menyenangkan</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="modelpemPeda" value="{{$nilaiwaka->modelpemPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('modelpemPeda') is-invalid @enderror" name="modelpemPeda" value="{{old('modelpemPeda'), $nilaiwaka->modelpemPeda ?? ''}}">                    
                        @endif
                        @error('modelpemPeda')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Media Pembelajaran</td>
                      <td>Pembuatan PPT / Slide / Canva / Video yang menarik</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="mediaPeda" value="{{$nilaiwaka->mediaPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('mediaPeda') is-invalid @enderror" name="mediaPeda" value="{{old('mediaPeda'), $nilaiwaka->mediaPeda ?? ''}}">                    
                        @endif
                        @error('mediaPeda')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Kualitas Pembelajaran</td>
                      <td>Rancangan, pelaksanaan, penilaian </td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="kualitaspemPeda" value="{{$nilaiwaka->kualitaspemPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('kualitaspemPeda') is-invalid @enderror" name="kualitaspemPeda" value="{{old('kualitaspemPeda'), $nilaiwaka->kualitaspemPeda ?? ''}}">                    
                        @endif
                        @error('kualitaspemPeda')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <th>Aspek Sosial</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Kerjasama dengan Pendidik</td>
                      <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama, Berbagi pengetahuan dan pemahaman keilmuan</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="samapendSos" value="{{$nilaiwaka->samapendSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('samapendSos') is-invalid @enderror" name="samapendSos" value="{{old('samapendSos'), $nilaiwaka->samapendSos ?? ''}}">                    
                        @endif
                        @error('samapendSos')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Organisasi / Kegiatan Sekolah</td>
                      <td>Pemikiran untuk pengembangan / perbaikan / pemecahan masalah</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="organisasiSos" value="{{$nilaiwaka->organisasiSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('organisasiSos') is-invalid @enderror" name="organisasiSos" value="{{old('organisasiSos'), $nilaiwaka->organisasiSos ?? ''}}">                    
                        @endif
                        @error('organisasiSos')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <th>Aspek Profesional</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Kompetensi Keilmuan</td>
                      <td>Pengembangan keilmuan, prestasi</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{$nilaiwaka->kompkeilmuProfesional}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('kompkeilmuProfesional') is-invalid @enderror" name="kompkeilmuProfesional" value="{{old('kompkeilmuProfesional'), $nilaiwaka->kompkeilmuProfesional ?? ''}}">                    
                        @endif
                        @error('kompkeilmuProfesional')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Kompetensi Digital</td>
                      <td>Penguasaan teknologi</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="kompdigProfesional" value="{{$nilaiwaka->kompdigProfesional}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('kompdigProfesional') is-invalid @enderror" name="kompdigProfesional" value="{{old('kompdigProfesional'), $nilaiwaka->kompdigProfesional ?? ''}}">                    
                        @endif
                        @error('kompdigProfesional')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Seminar / Literasi</td>
                      <td>Keaktifan mengikuti seminar / pelatihan, keaktifan membaca buku</td>
                      <td>
                        @if ($nilaiwaka)
                          @if (auth()->user()->role == 'WAKAKUR')
                            <input type="text" class="form-control" name="seminarProfesional" value="{{$nilaiwaka->seminarProfesional}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('seminarProfesional') is-invalid @enderror" name="seminarProfesional" value="{{old('seminarProfesional'), $nilaiwaka->seminarProfesional ?? ''}}">                  
                        @endif
                        @error('seminarProfesional')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td><b>Hasil</b></td>
                      <td></td>
                      <td>
                        @if ($nilaiwaka)
                          {{$nilaiwaka->hasil}}
                        @else
                          <b>Nilai belum diinputkan</b>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        @if ($nilaiwaka)
                            <b>Terimakasih sudah mengisi nilai</b>
                        @else
                          <button class="btn btn-primary" type="submit">Simpan</button>
                        @endif
                      </td>
                    </tr>
                  </form>
                @elseif(auth()->user()->role == 'OS')
                  <form action="/dp3guru/guru/{{$guru->id}}/tambahNilaiOs" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $so->id ?? '' }}">
                    <input type="hidden" name="guru_id" value="{{$guru->id}}">
                    <tr>
                      <th>Aspek Pedagogi</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Value SPECIAL</td>
                      <td>Terintegrasi  dalam pembelajaran</td>
                      <td>
                        @if ($sosem)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="valuePeda" value="{{$sosem->valuePeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('valuePeda') is-invalid @enderror" name="valuePeda" value="{{old('valuePeda'), $sosem->valuePeda ?? ''}}">
                        @endif
                        @error('valuePeda')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Manajemen Kelas</td>
                      <td>Pembelajaran yang kondusif, efektif dan efisien</td>
                      <td>
                        @if ($sosem)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="manajPeda" value="{{$sosem->manajPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="manajPeda" value="{{old('manajPeda'), $sosem->manajPeda ?? ''}}">                        
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Penggunaan LMS</td>
                      <td>Aktif memanfaatkan dalam PBM</td>
                      <td>
                        @if ($sosem)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="lmsPeda" value="{{$sosem->lmsPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="lmsPeda" value="{{old('lmsPeda'), $sosem->lmsPeda ?? ''}}">                       
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Model pembelajaran</td>
                      <td>Flipped classroom, 4C dan menyenangkan</td>
                      <td>
                        @if ($sosem)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="modelPeda" value="{{$sosem->modelPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="modelPeda" value="{{old('modelPeda'), $sosem->modelPeda ?? ''}}">                       
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Media Pembelajaran</td>
                      <td>Pembuatan PPT / Slide / Canva / Video yang menarik</td>
                      <td>
                        @if ($sosem)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="mediaPeda" value="{{$sosem->mediaPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="mediaPeda" value="{{old('mediaPeda'), $sosem->mediaPeda ?? ''}}">                    
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <th>Aspek Sosial</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Kerjasama dengan Siswa/ Orang Tua</td>
                      <td>Komunikasi dan relasi yang baik </td>
                      <td>
                        @if ($sosem)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="kerjasoSos" value="{{$sosem->kerjasoSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="kerjasoSos" value="{{old('kerjasoSos'), $sosem->kerjasoSos ?? ''}}">                    
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <th>Aspek Profesional</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Kompetensi Digital</td>
                      <td>Penguasaan teknologi</td>
                      <td>
                        @if ($sosem)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="kompdigProfesional" value="{{$sosem->kompdigProfesional}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="kompdigProfesional" value="{{old('kompdigProfesional'), $sosem->kompdigProfesional ?? ''}}">                    
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td><b>Hasil</b></td>
                      <td></td>
                      <td>
                        @if ($sosem)
                          {{$sosem->hasil}}
                        @else
                          <b>Nilai belum diinputkan</b>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        @if ($sosem)
                            <b>Terimakasih sudah mengisi nilai</b>
                        @else
                          <button class="btn btn-primary" type="submit">Simpan</button>
                        @endif
                      </td>
                    </tr>
                  </form>
                @elseif(auth()->user()->role == 'RK')
                  <form action="/dp3guru/guru/{{$guru->id}}/tambahNilaiRk" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $rk->id ?? '' }}">
                    <input type="hidden" name="guru_id" value="{{$guru->id}}">
                    <tr>
                      <th>Aspek Kepribadian</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Perilaku</td>
                      <td>Kesesuaian dengan Iman dan etika Kristen</td>
                      <td>
                        @if ($rksem)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="perilakuKepri" value="{{$rksem->perilakuKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('perilakuKepri') is-invalid @enderror" name="perilakuKepri" value="{{old('perilakuKepri'), $rksem->perilakuKepri ?? ''}}">
                        @endif
                        @error('perilakuKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Tutur Kata</td>
                      <td>Kesesuaian dengan Iman dan etika Kristen</td>
                      <td>
                        @if ($rksem)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="tuturkataKepri" value="{{$rksem->tuturkataKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('tuturkataKepri') is-invalid @enderror" name="tuturkataKepri" value="{{old('tuturkataKepri'), $rksem->tuturkataKepri ?? ''}}">
                        @endif
                        @error('tuturkataKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Kepedulian</td>
                      <td>Terhadap sesama dan lingkungan sekolah</td>
                      <td>
                        @if ($rksem)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="kepedulianKepri" value="{{$rksem->kepedulianKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('kepedulianKepri') is-invalid @enderror" name="kepedulianKepri" value="{{old('kepedulianKepri'), $rksem->kepedulianKepri ?? ''}}">
                        @endif
                        @error('kepedulianKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Penampilan</td>
                      <td>Bersih, rapi dan sopan</td>
                      <td>
                        @if ($rksem)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="penampilanKepri" value="{{$rksem->penampilanKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('penampilanKepri') is-invalid @enderror" name="penampilanKepri" value="{{old('penampilanKepri'), $rksem->penampilanKepri ?? ''}}">
                        @endif
                        @error('penampilanKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Sikap Kerja</td>
                      <td>Aktif dan positif</td>
                      <td>
                        @if ($rksem)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="sikerKepri" value="{{$rksem->sikerKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('sikerKepri') is-invalid @enderror" name="sikerKepri" value="{{old('sikerKepri'), $rksem->sikerKepri ?? ''}}">
                        @endif
                        @error('sikerKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <th>Aspek Sosial</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Kerjasama dengan Pendidik</td>
                      <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama, Berbagi pengetahuan dan pemahaman keilmuan</td>
                      <td>
                        @if ($rksem)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="samapendSos" value="{{$rksem->samapendSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('samapendSos') is-invalid @enderror" name="samapendSos" value="{{old('samapendSos'), $rksem->samapendSos ?? ''}}">
                        @endif
                        @error('samapendSos')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Kerjasama dengan Tenaga Kependidikan</td>
                      <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama</td>
                      <td>
                        @if ($rksem)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="samatenpendSos" value="{{$rksem->samatenpendSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('samatenpendSos') is-invalid @enderror" name="samatenpendSos" value="{{old('samatenpendSos'), $rksem->samatenpendSos ?? ''}}">
                        @endif
                        @error('samatenpendSos')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td><b>Hasil</b></td>
                      <td></td>
                      <td>
                        @if ($rksem)
                          {{$rksem->hasil}}
                        @else
                          <b>Nilai belum diinputkan</b>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        @if ($rksem)
                            <b>Terimakasih sudah mengisi nilai</b>
                        @else
                          <button class="btn btn-primary" type="submit">Simpan</button>
                        @endif
                      </td>
                    </tr>
                  </form>
                @elseif(auth()->user()->role == 'GURU')
                  <form action="/dp3guru/guru/{{$guru->id}}/tambahNilaiDs" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $ds->id ?? '' }}">
                    <input type="hidden" name="guru_id" value="{{$guru->id}}">
                    <tr>
                      <th>Aspek Kepribadian</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Kepedulian</td>
                      <td>Terhadap sesama dan lingkungan sekolah</td>
                      <td>
                        @if ($ds)
                          @if (auth()->user()->role == 'GURU')
                            <input type="text" class="form-control" name="kepedulianKepri" value="{{$ds->kepedulianKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('kepedulianKepri') is-invalid @enderror" name="kepedulianKepri" value="{{old('kepedulianKepri'), $ds->kepedulianKepri ?? ''}}">
                        @endif
                        @error('kepedulianKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Persekutuan Doa/ Ibadah</td>
                      <td>Keaktifan (hadir dan terlibat)</td>
                      <td>
                        @if ($ds)
                          @if (auth()->user()->role == 'GURU')
                            <input type="text" class="form-control" name="persekutuanKepri" value="{{$ds->persekutuanKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('persekutuanKepri') is-invalid @enderror" name="persekutuanKepri" value="{{old('persekutuanKepri'), $ds->persekutuanKepri ?? ''}}">
                        @endif
                        @error('persekutuanKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Kesetiaan pada YSKI</td>
                      <td>Kepatuhan  terhadap peraturan kepegawaian, Pelaksanaan tugas/ kesepakatan</td>
                      <td>
                        @if ($ds)
                          @if (auth()->user()->role == 'GURU')
                            <input type="text" class="form-control" name="kesetiaanyskiKepri" value="{{$ds->kesetiaanyskiKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('kesetiaanyskiKepri') is-invalid @enderror" name="kesetiaanyskiKepri" value="{{old('kesetiaanyskiKepri'), $ds->kesetiaanyskiKepri ?? ''}}">
                        @endif
                        @error('kesetiaanyskiKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td>Kesetiaan pada Pimpinan</td>
                      <td>Kepatuhan terhadap perintah pimpinan dan keputusan bersama</td>
                      <td>
                        @if ($ds)
                          @if (auth()->user()->role == 'GURU')
                            <input type="text" class="form-control" name="kesetiaanpimKepri" value="{{$ds->kesetiaanpimKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('kesetiaanpimKepri') is-invalid @enderror" name="kesetiaanpimKepri" value="{{old('kesetiaanpimKepri'), $ds->kesetiaanpimKepri ?? ''}}">
                        @endif
                        @error('kesetiaanpimKepri')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <th>Aspek Pedagogi</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Model pembelajaran</td>
                      <td>Flipped classroom, 4C dan menyenangkan</td>
                      <td>
                        @if ($ds)
                          @if (auth()->user()->role == 'GURU')
                            <input type="text" class="form-control" name="modelPeda" value="{{$ds->modelPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('modelPeda') is-invalid @enderror" name="modelPeda" value="{{old('modelPeda'), $ds->modelPeda ?? ''}}">
                        @endif
                        @error('modelPeda')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <th>Aspek Sosial</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Kerjasama dengan Siswa / Orang Tua</td>
                      <td>Komunikasi dan relasi yang baik </td>
                      <td>
                        @if ($ds)
                          @if (auth()->user()->role == 'GURU')
                            <input type="text" class="form-control" name="samaortuSos" value="{{$ds->samaortuSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('samaortuSos') is-invalid @enderror" name="samaortuSos" value="{{old('samaortuSos'), $ds->samaortuSos ?? ''}}">
                        @endif
                        @error('samaortuSos')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <th>Aspek Profesional</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Kompetensi Keilmuan</td>
                      <td>Pengembangan keilmuan, prestasi</td>
                      <td>
                        @if ($ds)
                          @if (auth()->user()->role == 'GURU')
                            <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{$ds->kompkeilmuProfesional}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control @error('kompkeilmuProfesional') is-invalid @enderror" name="kompkeilmuProfesional" value="{{old('kompkeilmuProfesional'), $ds->kompkeilmuProfesional ?? ''}}">
                        @endif
                        @error('kompkeilmuProfesional')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td><b>Hasil</b></td>
                      <td></td>
                      <td>
                        @if ($ds)
                          {{$ds->hasil}}
                        @else
                          <b>Nilai belum diinputkan</b>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        @if ($ds)
                            <b>Terimakasih sudah mengisi nilai</b>
                        @else
                          <button class="btn btn-primary" type="submit">Simpan</button>
                        @endif
                      </td>
                    </tr>
                  </form>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- END Full Table -->
    </div>
    <!-- END Page Content -->
  </main>
  {{-- @include('sweetalert::alert') --}} 
@endsection

@push('prepend-style')
    <style>
      .blinking-text {
          font-size: 18px;
          font-weight: bold;
          color: red;
          animation: blink 2s steps(2, start) infinite;
      }

      @keyframes blink {
          to {
              visibility: hidden;
          }
      }
    </style>
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
      document.addEventListener('DOMContentLoaded', function() {
          document.querySelectorAll('form[action*="academic-years"]').forEach(form => {
              form.addEventListener('submit', function() {
                  // Mengosongkan form nilai
                  document.getElementById('student_id').value = '';
                  document.getElementById('score').value = '';
              });
          });
      });
    </script>
    <script>
      new DataTable('#nilai');
    </script>
    {{-- <script>
      toastr.success('Have fun storming the castle!', 'Miracle Max Says')
    </script> --}}
@endpush