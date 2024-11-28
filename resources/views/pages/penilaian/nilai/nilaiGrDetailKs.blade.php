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
            <br>
            @if (auth()->user()->role == 'GURU')
              <span class="text-danger">*nilai belum akan keluar sebelum semua menginputkan nilai</span>
            @endif
          </h3>
          <a href="{{route('nilaiGuru')}}" class="btn btn-secondary mx-2">Kembali</a>
          @if (auth()->user()->role == 'ADMIN')
            <a href="{{route('nilaiGrEdit', $guru->id)}}" class="btn btn-warning">Edit Nilai</a>
          @endif
        </div>
        <div class="block-content">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter table-responsive" id="indikatornilai">
              <thead>
                <tr>
                  <th>Komponen</th>
                  <th>Definisi</th>
                  <th style="width: 10%;">Total</th>
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
                  </tr>
                  <tr>
                    <td>Perilaku</td>
                    <td>Kesesuaian dengan Iman dan etika Kristen</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilai) && isset($rk) && !is_null($nilai->prilakuKepri) && !is_null($rk->perilakuKepri)) {
                                $tPrilaku = ($nilai->prilakuKepri + $rk->perilakuKepri) / 2;
                            } else {
                                $tPrilaku = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tPrilaku !== null ? round($tPrilaku) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Tutur Kata</td>
                    <td>Kesesuaian dengan Iman dan etika Kristen</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilai) && isset($rk) && !is_null($nilai->tuturkataKepri) && !is_null($rk->tuturkataKepri)) {
                                $tTuturkata = ($nilai->tuturkataKepri + $rk->tuturkataKepri) / 2;
                            } else {
                                $tTuturkata = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tTuturkata !== null ? round($tTuturkata) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Keuangan</td>
                    <td>Jujur dan bertanggung jawab</td>
                    <td>
                      @if ($nilai)
                        <div class="text-center">{{$nilai->keuanganKepri}}</div>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Kepedulian</td>
                    <td>Terhadap sesama dan lingkungan sekolah</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilai) && isset($rk) && isset($ds) && !is_null($nilai->kepedulianKepri) && !is_null($rk->kepedulianKepri) && !is_null($ds->kepedulianKepri)) {
                                $tKepedulian = ($nilai->kepedulianKepri + $rk->kepedulianKepri + $ds->kepedulianKepri) / 3;
                            } else {
                                $tKepedulian = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tKepedulian !== null ? round($tKepedulian) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Persekutuan Doa/ Ibadah</td>
                    <td>Keaktifan (hadir dan terlibat)</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilai) && isset($ds) && !is_null($nilai->persekutuanKepri) && !is_null($ds->persekutuanKepri)) {
                                $tKepedulian = ($nilai->persekutuanKepri + $ds->persekutuanKepri) / 2;
                            } else {
                                $tKepedulian = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tKepedulian !== null ? round($tKepedulian) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Penampilan</td>
                    <td>Bersih, rapi dan sopan</td>
                    <td>
                      <?php
                          // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                          if (isset($nilai) && isset($nilaiwaka) && isset($rk) && !is_null($nilai->penampilanKepri) && !is_null($rk->penampilanKepri) && !is_null($nilaiwaka->penamKepri)) {
                              $tPenampilan = ($nilai->penampilanKepri + $nilaiwaka->penamKepri + $rk->penampilanKepri) / 3;
                          } else {
                              $tPenampilan = null;
                          }
                      ?>
                      <div class="text-center">
                          {{ $tPenampilan !== null ? round($tPenampilan) : '' }}
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Sikap Kerja</td>
                    <td>Aktif dan positif</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilai) && isset($nilaiwaka) && isset($rk) && !is_null($nilai->sikapkerjaKepri) && !is_null($rk->sikerKepri) && !is_null($nilaiwaka->sikerKepri)) {
                                $tSikapkerja = ($nilai->sikapkerjaKepri + $nilaiwaka->sikerKepri + $rk->sikerKepri) / 3;
                            } else {
                                $tSikapkerja = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tSikapkerja !== null ? round($tSikapkerja) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Masuk Kerja</td>
                    <td>Hadir penuh, ijin "jelas", tidak terlambat</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilai) && isset($nilaiwaka) && !is_null($nilai->masukkerjaKepri) && !is_null($nilaiwaka->maskerKepri)) {
                                $tMasukkerja = ($nilai->masukkerjaKepri + $nilaiwaka->maskerKepri) / 2;
                            } else {
                                $tMasukkerja = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tMasukkerja !== null ? round($tMasukkerja) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kesetiaan pada YSKI</td>
                    <td>Kepatuhan  terhadap peraturan kepegawaian, Pelaksanaan tugas/ kesepakatan</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilai) && isset($ds) && !is_null($nilai->kesetianyskiKepri) && !is_null($ds->kesetiaanyskiKepri)) {
                                $tseminar = ($nilai->kesetianyskiKepri + $ds->kesetiaanyskiKepri) / 2;
                            } else {
                                $tseminar = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tseminar !== null ? round($tseminar) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kesetiaan pada Pimpinan</td>
                    <td>Kepatuhan terhadap perintah pimpinan dan keputusan bersama</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilai) && isset($nilaiwaka) && isset($ds) && !is_null($nilai->kesetianpimKepri) && !is_null($nilaiwaka->kesetiaanpimKepri) && !is_null($ds->kesetiaanpimKepri)) {
                                $Setiapimpinan = ($nilai->kesetianpimKepri + $nilaiwaka->kesetiaanpimKepri + $ds->kesetiaanpimKepri) / 3;
                            } else {
                                $Setiapimpinan = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $Setiapimpinan !== null ? round($Setiapimpinan) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <th>Aspek Pedagogi</th>
                    <th></th>
                    <th></th>
                  </tr>
                  <tr>
                    <td>Value SPECIAL</td>
                    <td>Terintegrasi Dalam Pembelajaran</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilaiwaka) && isset($so) && !is_null($nilaiwaka->valuePeda) && !is_null($so->valuePeda)) {
                                $tValuespecial = ($nilaiwaka->valuePeda + $so->valuePeda) / 2;
                            } else {
                                $tValuespecial = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tValuespecial !== null ? round($tValuespecial) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Manajemen Kelas</td>
                    <td>Pembelajaran yang kondusif, efektif dan efisien</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilai) && isset($nilaiwaka) && isset($so) && !is_null($nilai->manajkelasPeda) && !is_null($nilaiwaka->manajkelasPeda) && !is_null($so->manajPeda)) {
                                $tManajKelas = ($nilai->manajkelasPeda + $nilaiwaka->manajkelasPeda + $so->manajPeda) / 3;
                            } else {
                                $tManajKelas = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tManajKelas !== null ? round($tManajKelas) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Penggunaan Sisky</td>
                    <td>Aktif memanfaatkan dalam kegiatan belajar mengajar</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($so) && isset($nilaiwaka) && !is_null($nilaiwaka->lmsPeda) && !is_null($so->lmsPeda)) {
                                $tSisky = ($nilaiwaka->lmsPeda + $so->lmsPeda) / 2;
                            } else {
                                $tSisky = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tSisky !== null ? round($tSisky) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Model pembelajaran</td>
                    <td>Flipped classroom, 4C dan menyenangkan</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($so) && isset($nilaiwaka) && isset($ds) && !is_null($so->modelPeda) && !is_null($nilaiwaka->modelpemPeda) && !is_null($ds->modelPeda)) {
                                $tmodelPemb = ($so->modelPeda + $nilaiwaka->modelpemPeda + $ds->modelPeda) / 3;
                            } else {
                                $tmodelPemb = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tmodelPemb !== null ? round($tmodelPemb) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Media Pembelajaran</td>
                    <td>Pembuatan PPT / Slide / Canva / Video yang menarik</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($so) && isset($nilaiwaka) && !is_null($so->mediaPeda) && !is_null($nilaiwaka->mediaPeda)) {
                                $tmediaPemb = ($so->mediaPeda + $nilaiwaka->mediaPeda) / 2;
                            } else {
                                $tmediaPemb = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tmediaPemb !== null ? round($tmediaPemb) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kualitas Pembelajaran</td>
                    <td>Rancangan, pelaksanaan, penilaian</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilai) && isset($nilaiwaka) && !is_null($nilai->kualitaspemPeda) && !is_null($nilaiwaka->kualitaspemPeda)) {
                                $tkualitasPemb = ($nilai->kualitaspemPeda + $nilaiwaka->kualitaspemPeda) / 2;
                            } else {
                                $tkualitasPemb = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tkualitasPemb !== null ? round($tkualitasPemb) : '' }}
                        </div>
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
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($so) && isset($nilai) && isset($ds) && !is_null($so->kerjasoSos) && !is_null($nilai->samaortuSos) && !is_null($ds->samaortuSos)) {
                                $tsamaOrtu = ($so->kerjasoSos + $nilai->samaortuSos + $ds->samaortuSos) / 3;
                            } else {
                                $tsamaOrtu = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tsamaOrtu !== null ? round($tsamaOrtu) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kerjasama dengan Pendidik</td>
                    <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama, Berbagi pengetahuan dan pemahaman keilmuan</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilaiwaka) && isset($nilai) && isset($rk) && !is_null($nilaiwaka->samapendSos) && !is_null($nilai->samapendSos) && !is_null($rk->samapendSos)) {
                                $tsamaPend = ($nilaiwaka->samapendSos + $nilai->samapendSos + $rk->samapendSos) / 3;
                            } else {
                                $tsamaPend = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tsamaPend !== null ? round($tsamaPend) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kerjasama dengan Tenaga Kependidikan</td>
                    <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilai) && isset($rk) && !is_null($nilai->samatenpendSos) && !is_null($rk->samatenpendSos)) {
                                $tsamatenPend = ($nilai->samatenpendSos + $rk->samatenpendSos) / 2;
                            } else {
                                $tsamatenPend = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tsamatenPend !== null ? round($tsamatenPend) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Organisasi/ Kegiatan Sekolah</td>
                    <td>Pemikiran untuk pengembangan/ perbaikan/ pemecahan masalah</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilai) && isset($nilaiwaka) && !is_null($nilai->organisasiSos) && !is_null($nilaiwaka->organisasiSos)) {
                                $torganisasi = ($nilai->organisasiSos + $nilaiwaka->organisasiSos) / 2;
                            } else {
                                $torganisasi = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $torganisasi !== null ? round($torganisasi) : '' }}
                        </div>
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
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilaiwaka) && isset($nilai) && isset($ds) && !is_null($nilaiwaka->kompkeilmuProfesional) && !is_null($nilai->kompkeilmuProfesional) && !is_null($ds->kompkeilmuProfesional)) {
                                $tkompkeilmuan = ($nilaiwaka->kompkeilmuProfesional + $nilai->kompkeilmuProfesional + $ds->kompkeilmuProfesional) / 3;
                            } else {
                                $tkompkeilmuan = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tkompkeilmuan !== null ? round($tkompkeilmuan) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kompetensi Digital</td>
                    <td>Penguasaan teknologi</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilaiwaka) && isset($so) && !is_null($nilaiwaka->kompdigProfesional) && !is_null($so->kompdigProfesional)) {
                                $tkompdigi = ($nilaiwaka->kompdigProfesional + $so->kompdigProfesional) / 2;
                            } else {
                                $tkompdigi = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tkompdigi !== null ? round($tkompdigi) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Seminar / Literasi</td>
                    <td>Keaktifan mengikuti seminar / pelatihan, keaktifan membaca buku</td>
                    <td>
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilaiwaka) && isset($nilai) && !is_null($nilaiwaka->seminarProfesional) && !is_null($nilai->seminarProfesional)) {
                                $tseminar = ($nilaiwaka->seminarProfesional + $nilai->seminarProfesional) / 2;
                            } else {
                                $tseminar = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $tseminar !== null ? round($tseminar) : '' }}
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td><b>Hasil</b></td>
                    <td></td>
                    <td class="text-center">
                        <?php
                            // Periksa apakah objek $nilai dan $rk tidak null, lalu periksa properti
                            if (isset($nilaiwaka) && isset($nilai) && isset($so) && isset($rk) && isset($ds) && !is_null($nilaiwaka->hasil) && !is_null($nilai->hasil) && !is_null($so->hasil) && !is_null($rk->hasil) && !is_null($ds->hasil)) {
                                $thasilsemua = ($nilaiwaka->hasil + $nilai->hasil + $so->hasil + $rk->hasil + $ds->hasil) / 5;
                            } else {
                                $thasilsemua = null;
                            }
                        ?>
                        <div class="text-center">
                            {{ $thasilsemua !== null ? $thasilsemua : '' }}
                        </div>
                    </td>
                    {{-- <td class="text-center">
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
                    </td> --}}
                  </tr>
                  <tr>
                    <td><b>Nilai Akhir</b></td>
                    <td></td>
                    <td class="text-center">
                      <b>{{$nilaiAkhir}}</b>
                    </td>
                  </tr>
                  <tr>
                    <td><b>Predikat</b></td>
                    <td></td>
                    <td class="text-center">
                      <b>{{$angkaNilai}}</b>
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