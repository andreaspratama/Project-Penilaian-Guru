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
          <a href="{{route('nilaiGuru')}}" class="btn btn-secondary mx-2">Kembali</a>
          <a href="{{route('nilaiGrEdit', $guru->id)}}" class="btn btn-warning">Edit Nilai</a>
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter table-responsive" id="indikatornilai">
              <thead>
                <tr>
                  <th>Komponen</th>
                  <th>Definisi</th>
                  <th style="width: 10%;">Waka Kurikulum</th>
                  <th style="width: 10%;">Kepala Sekolah</th>
                  <th style="width: 10%;">Siswa / Orangtua</th>
                  <th style="width: 10%;">Rekan Kerja</th>
                  <th style="width: 10%;">Diri Sendiri</th>
                </tr>
              </thead>
              <tbody>
                <form action="/dp3guru/guru/{{$guru->id}}/tambahNilai" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $nilaiwaka->id ?? '' }}">
                  <input type="hidden" name="guru_id" value="{{$guru->id}}">
                  <tr>
                    <th>Aspek Kepribadian</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  <tr>
                    <td>Perilaku</td>
                    <td>Kesesuaian dengan Iman dan etika Kristen</td>
                    <td></td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->prilakuKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($rk)
                        <div class="text-center">{{$rk->perilakuKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tutur Kata</td>
                    <td>Kesesuaian dengan Iman dan etika Kristen</td>
                    <td></td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->tuturkataKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($rk)
                        <div class="text-center">{{$rk->tuturkataKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Keuangan</td>
                    <td>Jujur dan bertanggung jawab</td>
                    <td></td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->keuanganKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Kepedulian</td>
                    <td>Terhadap sesama dan lingkungan sekolah</td>
                    <td></td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->kepedulianKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($rk)
                        <div class="text-center">{{$rk->kepedulianKepri}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($ds)
                        <div class="text-center">{{$ds->kepedulianKepri}}</div>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Persekutuan Doa/ Ibadah</td>
                    <td>Keaktifan (hadir dan terlibat)</td>
                    <td></td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->persekutuanKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                      @if ($ds)
                        <div class="text-center">{{$ds->persekutuanKepri}}</div>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Penampilan</td>
                    <td>Bersih, rapi dan sopan</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->penamKepri}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->penampilanKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($rk)
                        <div class="text-center">{{$rk->penampilanKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Sikap Kerja</td>
                    <td>Aktif dan positif</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->sikerKepri}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->sikapkerjaKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($rk)
                        <div class="text-center">{{$rk->sikerKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Masuk Kerja</td>
                    <td>Hadir penuh, ijin "jelas", tidak terlambat</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->maskerKepri}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->masukkerjaKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Kesetiaan pada YSKI</td>
                    <td>Kepatuhan  terhadap peraturan kepegawaian, Pelaksanaan tugas/ kesepakatan</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->kesetianyskiKepri}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->kesetianyskiKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                      @if ($ds)
                        <div class="text-center">{{$ds->kesetiaanyskiKepri}}</div>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Kesetiaan pada Pimpinan</td>
                    <td>Kepatuhan terhadap perintah pimpinan dan keputusan bersama</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->kesetiaanpimKepri}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->kesetianpimKepri}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                      @if ($ds)
                        <div class="text-center">{{$ds->kesetiaanpimKepri}}</div>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Aspek Pedagogi</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  <tr>
                    <td>Value SPECIAL</td>
                    <td>Terintegrasi Dalam Pembelajaran</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->valuePeda}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($so)
                        <div class="text-center">{{$so->valuePeda}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Manajemen Kelas</td>
                    <td>Pembelajaran yang kondusif, efektif dan efisien</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->manajkelasPeda}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->manajkelasPeda}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($so)
                        <div class="text-center">{{$so->manajPeda}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Penggunaan LMS</td>
                    <td>Aktif memanfaatkan dalam PBM</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->lmsPeda}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($so)
                        <div class="text-center">{{$so->lmsPeda}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Model pembelajaran</td>
                    <td>Flipped classroom, 4C dan menyenangkan</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->modelpemPeda}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($so)
                        <div class="text-center">{{$so->modelPeda}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($ds)
                        <div class="text-center">{{$ds->modelPeda}}</div>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Media Pembelajaran</td>
                    <td>Pembuatan PPT / Slide / Canva / Video yang menarik</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->mediaPeda}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($so)
                        <div class="text-center">{{$so->mediaPeda}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Kualitas Pembelajaran</td>
                    <td>Rancangan, pelaksanaan, penilaian</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->kualitaspemPeda}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->kualitaspemPeda}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Aspek Sosial</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  <tr>
                    <td>Kerjasama dengan Siswa/ Orang Tua</td>
                    <td>Komunikasi dan relasi yang baik</td>
                    <td></td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->samaortuSos}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($so)
                        <div class="text-center">{{$so->kerjasoSos}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($ds)
                        <div class="text-center">{{$ds->samaortuSos}}</div>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Kerjasama dengan Pendidik</td>
                    <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama, Berbagi pengetahuan dan pemahaman keilmuan</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->samapendSos}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->samapendSos}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($rk)
                        <div class="text-center">{{$rk->samapendSos}}</div>
                      @endif
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Kerjasama dengan Tenaga Kependidikan</td>
                    <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama</td>
                    <td></td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->samatenpendSos}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($rk)
                        <div class="text-center">{{$rk->samatenpendSos}}</div>
                      @endif
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Organisasi/ Kegiatan Sekolah</td>
                    <td>Pemikiran untuk pengembangan/ perbaikan/ pemecahan masalah</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->organisasiSos}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->organisasiSos}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Aspek Profesional</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  <tr>
                    <td>Kompetensi Keilmuan</td>
                    <td>Pengembangan keilmuan, prestasi</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->kompkeilmuProfesional}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->kompkeilmuProfesional}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                      @if ($ds)
                        <div class="text-center">{{$ds->kompkeilmuProfesional}}</div>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Kompetensi Digital</td>
                    <td>Penguasaan teknologi</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->kompdigProfesional}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td>
                      @if ($so)
                        <div class="text-center">{{$so->kompdigProfesional}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Seminar / Literasi</td>
                    <td>Keaktifan mengikuti seminar / pelatihan, keaktifan membaca buku</td>
                    <td>
                      @if ($nilaiwaka)
                        <div class="text-center">{{$nilaiwaka->seminarProfesional}}</div>
                      @endif
                    </td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->seminarProfesional}}</div>
                      @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><b>Hasil</b></td>
                    <td></td>
                    <td class="text-center">
                      @if ($nilaiwaka)
                        {{$nilaiwaka->hasil}}
                      @else
                        <b>Nilai belum diinputkan</b>
                      @endif
                    </td>
                    <td class="text-center">
                      @if ($nilai)
                        {{$nilai->hasil}}
                      @else
                        <b>Nilai belum diinputkan</b>
                      @endif
                    </td>
                    <td class="text-center">
                      @if ($so)
                        {{$so->hasil}}
                      @else
                        <b>Nilai belum diinputkan</b>
                      @endif
                    </td>
                    <td class="text-center">
                      @if ($rk)
                        {{$rk->hasil}}
                      @else
                        <b>Nilai belum diinputkan</b>
                      @endif
                    </td>
                    <td class="text-center">
                      @if ($ds)
                        {{$ds->hasil}}
                      @else
                        <b>Nilai belum diinputkan</b>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td><b>Nilai Akhir</b></td>
                    <td></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center">
                      <b>{{$nilaiAkhir}}</b>
                    </td>
                  </tr>
                </form>
                @if (auth()->user()->role == 'KS')
                  
                {{-- @elseif(auth()->user()->role == 'WAKAKUR')
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
                        <button class="btn btn-primary" type="submit">Simpan</button>
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
                        <button class="btn btn-primary" type="submit">Simpan</button>
                      </td>
                    </tr>
                  </form> --}}
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