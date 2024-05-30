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
            Nilai Guru {{$guru->nama}}
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
                  <th style="width: 40%;">Aksi</th>
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
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="prilakuKepri" value="{{$nilai->prilakuKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="prilakuKepri" value="{{$nilai->prilakuKepri ?? ''}}">
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Tutur Kata</td>
                      <td>Kesesuaian dengan Iman dan etika Kristen</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="tuturkataKepri" value="{{$nilai->tuturkataKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="tuturkataKepri" value="{{$nilai->tuturkataKepri ?? ''}}">                        
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Keuangan</td>
                      <td>Jujur dan bertanggung jawab</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="keuanganKepri" value="{{$nilai->keuanganKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="keuanganKepri" value="{{$nilai->keuanganKepri ?? ''}}">                       
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Kepedulian</td>
                      <td>Terhadap sesama dan lingkungan sekolah</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="kepedulianKepri" value="{{$nilai->kepedulianKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="kepedulianKepri" value="{{$nilai->kepedulianKepri ?? ''}}">                       
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Persekutuan Doa/ Ibadah</td>
                      <td>Keaktifan (hadir dan terlibat)</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="persekutuanKepri" value="{{$nilai->persekutuanKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="persekutuanKepri" value="{{$nilai->persekutuanKepri ?? ''}}">                      
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Penampilan</td>
                      <td>Bersih, rapi dan sopan</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="penampilanKepri" value="{{$nilai->penampilanKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="penampilanKepri" value="{{$nilai->penampilanKepri ?? ''}}">                      
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Sikap Kerja</td>
                      <td>Aktif dan positif</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="sikapkerjaKepri" value="{{$nilai->sikapkerjaKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="sikapkerjaKepri" value="{{$nilai->sikapkerjaKepri ?? ''}}">                      
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Masuk Kerja</td>
                      <td>Hadir penuh, ijin "jelas", tidak terlambat</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="masukkerjaKepri" value="{{$nilai->masukkerjaKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="masukkerjaKepri" value="{{$nilai->masukkerjaKepri ?? ''}}">                      
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Kesetiaan pada YSKI</td>
                      <td>Kepatuhan  terhadap peraturan kepegawaian, Pelaksanaan tugas/ kesepakatan</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="kesetianyskiKepri" value="{{$nilai->kesetianyskiKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="kesetianyskiKepri" value="{{$nilai->kesetianyskiKepri ?? ''}}">                      
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Kesetiaan pada Pimpinan</td>
                      <td>Kepatuhan terhadap perintah pimpinan dan keputusan bersama</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="kesetianpimKepri" value="{{$nilai->kesetianpimKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="kesetianpimKepri" value="{{$nilai->kesetianpimKepri ?? ''}}">                    
                        @endif
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
                            <input type="text" class="form-control" name="manajkelasPeda" value="{{$nilai->manajkelasPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="manajkelasPeda" value="{{$nilai->manajkelasPeda ?? ''}}">                    
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Kualitas Pembelajaran</td>
                      <td>Rancangan, pelaksanaan, penilaian</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="kualitaspemPeda" value="{{$nilai->kualitaspemPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="kualitaspemPeda" value="{{$nilai->kualitaspemPeda ?? ''}}">                    
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
                      <td>Komunikasi dan relasi yang baik</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="samaortuSos" value="{{$nilai->samaortuSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="samaortuSos" value="{{$nilai->samaortuSos ?? ''}}">                    
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Kerjasama dengan Pendidik</td>
                      <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama, Berbagi pengetahuan dan pemahaman keilmuan</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="samapendSos" value="{{$nilai->samapendSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="samapendSos" value="{{$nilai->samapendSos ?? ''}}">                    
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Kerjasama dengan Tenaga Kependidikan</td>
                      <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="samatenpendSos" value="{{$nilai->samatenpendSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="samatenpendSos" value="{{$nilai->samatenpendSos ?? ''}}">                    
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Organisasi/ Kegiatan Sekolah</td>
                      <td>Pemikiran untuk pengembangan/ perbaikan/ pemecahan masalah</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="organisasiSos" value="{{$nilai->organisasiSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="organisasiSos" value="{{$nilai->organisasiSos ?? ''}}">                    
                        @endif
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
                            <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{$nilai->kompkeilmuProfesional}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{$nilai->kompkeilmuProfesional ?? ''}}">                    
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Seminar / Literasi</td>
                      <td>Keaktifan mengikuti seminar / pelatihan, keaktifan membaca buku</td>
                      <td>
                        @if ($nilai)
                          @if (auth()->user()->role == 'KS')
                            <input type="text" class="form-control" name="seminarProfesional" value="{{$nilai->seminarProfesional}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="seminarProfesional" value="{{$nilai->seminarProfesional ?? ''}}">                  
                        @endif
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
                          <input type="text" class="form-control" name="penamKepri" value="{{$nilaiwaka->penamKepri ?? ''}}">
                        @endif
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
                          <input type="text" class="form-control" name="sikerKepri" value="{{$nilaiwaka->sikerKepri ?? ''}}">                        
                        @endif
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
                          <input type="text" class="form-control" name="maskerKepri" value="{{$nilaiwaka->maskerKepri ?? ''}}">                       
                        @endif
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
                          <input type="text" class="form-control" name="kesetiaanpimKepri" value="{{$nilaiwaka->kesetiaanpimKepri ?? ''}}">                       
                        @endif
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
                          <input type="text" class="form-control" name="valuePeda" value="{{$nilaiwaka->valuePeda ?? ''}}">                    
                        @endif
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
                          <input type="text" class="form-control" name="manajkelasPeda" value="{{$nilaiwaka->manajkelasPeda ?? ''}}">                    
                        @endif
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
                          <input type="text" class="form-control" name="lmsPeda" value="{{$nilaiwaka->lmsPeda ?? ''}}">                    
                        @endif
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
                          <input type="text" class="form-control" name="modelpemPeda" value="{{$nilaiwaka->modelpemPeda ?? ''}}">                    
                        @endif
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
                          <input type="text" class="form-control" name="mediaPeda" value="{{$nilaiwaka->mediaPeda ?? ''}}">                    
                        @endif
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
                          <input type="text" class="form-control" name="kualitaspemPeda" value="{{$nilaiwaka->kualitaspemPeda ?? ''}}">                    
                        @endif
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
                          <input type="text" class="form-control" name="samapendSos" value="{{$nilaiwaka->samapendSos ?? ''}}">                    
                        @endif
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
                          <input type="text" class="form-control" name="organisasiSos" value="{{$nilaiwaka->organisasiSos ?? ''}}">                    
                        @endif
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
                          <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{$nilaiwaka->kompkeilmuProfesional ?? ''}}">                    
                        @endif
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
                          <input type="text" class="form-control" name="kompdigProfesional" value="{{$nilaiwaka->kompdigProfesional ?? ''}}">                    
                        @endif
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
                          <input type="text" class="form-control" name="seminarProfesional" value="{{$nilaiwaka->seminarProfesional ?? ''}}">                  
                        @endif
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
                        @if ($so)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="valuePeda" value="{{$so->valuePeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="valuePeda" value="{{$so->valuePeda ?? ''}}">
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Manajemen Kelas</td>
                      <td>Pembelajaran yang kondusif, efektif dan efisien</td>
                      <td>
                        @if ($so)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="manajPeda" value="{{$so->manajPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="manajPeda" value="{{$so->manajPeda ?? ''}}">                        
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Penggunaan LMS</td>
                      <td>Aktif memanfaatkan dalam PBM</td>
                      <td>
                        @if ($so)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="lmsPeda" value="{{$so->lmsPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="lmsPeda" value="{{$so->lmsPeda ?? ''}}">                       
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Model pembelajaran</td>
                      <td>Flipped classroom, 4C dan menyenangkan</td>
                      <td>
                        @if ($so)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="modelPeda" value="{{$so->modelPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="modelPeda" value="{{$so->modelPeda ?? ''}}">                       
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Media Pembelajaran</td>
                      <td>Pembuatan PPT / Slide / Canva / Video yang menarik</td>
                      <td>
                        @if ($so)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="mediaPeda" value="{{$so->mediaPeda}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="mediaPeda" value="{{$so->mediaPeda ?? ''}}">                    
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
                        @if ($so)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="kerjasoSos" value="{{$so->kerjasoSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="kerjasoSos" value="{{$so->kerjasoSos ?? ''}}">                    
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
                        @if ($so)
                          @if (auth()->user()->role == 'OS')
                            <input type="text" class="form-control" name="kompdigProfesional" value="{{$so->kompdigProfesional}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="kompdigProfesional" value="{{$so->kompdigProfesional ?? ''}}">                    
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td><b>Hasil</b></td>
                      <td></td>
                      <td>
                        @if ($so)
                          {{$so->hasil}}
                        @else
                          <b>Nilai belum diinputkan</b>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        @if ($so)
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
                        @if ($rk)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="perilakuKepri" value="{{$rk->perilakuKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="perilakuKepri" value="{{$rk->perilakuKepri ?? ''}}">
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Tutur Kata</td>
                      <td>Kesesuaian dengan Iman dan etika Kristen</td>
                      <td>
                        @if ($rk)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="tuturkataKepri" value="{{$rk->tuturkataKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="tuturkataKepri" value="{{$rk->tuturkataKepri ?? ''}}">
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Kepedulian</td>
                      <td>Terhadap sesama dan lingkungan sekolah</td>
                      <td>
                        @if ($rk)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="kepedulianKepri" value="{{$rk->kepedulianKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="kepedulianKepri" value="{{$rk->kepedulianKepri ?? ''}}">
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Penampilan</td>
                      <td>Bersih, rapi dan sopan</td>
                      <td>
                        @if ($rk)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="penampilanKepri" value="{{$rk->penampilanKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="penampilanKepri" value="{{$rk->penampilanKepri ?? ''}}">
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Sikap Kerja</td>
                      <td>Aktif dan positif</td>
                      <td>
                        @if ($rk)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="sikerKepri" value="{{$rk->sikerKepri}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="sikerKepri" value="{{$rk->sikerKepri ?? ''}}">
                        @endif
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
                        @if ($rk)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="samapendSos" value="{{$rk->samapendSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="samapendSos" value="{{$rk->samapendSos ?? ''}}">
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Kerjasama dengan Tenaga Kependidikan</td>
                      <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama</td>
                      <td>
                        @if ($rk)
                          @if (auth()->user()->role == 'RK')
                            <input type="text" class="form-control" name="samatenpendSos" value="{{$rk->samatenpendSos}}" disabled>
                          @endif
                        @else
                          <input type="text" class="form-control" name="samatenpendSos" value="{{$rk->samatenpendSos ?? ''}}">
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td><b>Hasil</b></td>
                      <td></td>
                      <td>
                        @if ($rk)
                          {{$rk->hasil}}
                        @else
                          <b>Nilai belum diinputkan</b>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        @if ($rk)
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
                          <input type="text" class="form-control" name="kepedulianKepri" value="{{$ds->kepedulianKepri ?? ''}}">
                        @endif
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
                          <input type="text" class="form-control" name="persekutuanKepri" value="{{$ds->persekutuanKepri ?? ''}}">
                        @endif
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
                          <input type="text" class="form-control" name="kesetiaanyskiKepri" value="{{$ds->kesetiaanyskiKepri ?? ''}}">
                        @endif
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
                          <input type="text" class="form-control" name="kesetiaanpimKepri" value="{{$ds->kesetiaanpimKepri ?? ''}}">
                        @endif
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
                          <input type="text" class="form-control" name="modelPeda" value="{{$ds->modelPeda ?? ''}}">
                        @endif
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
                          <input type="text" class="form-control" name="samaortuSos" value="{{$ds->samaortuSos ?? ''}}">
                        @endif
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
                          <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{$ds->kompkeilmuProfesional ?? ''}}">
                        @endif
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