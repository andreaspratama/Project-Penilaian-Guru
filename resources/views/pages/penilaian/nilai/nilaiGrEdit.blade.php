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
            Edit Nilai Guru {{$guru->nama}}
          </h3>
          <a href="{{route('nilaiGrDetail', $guru->id)}}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="block-content">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="ks-tab" data-bs-toggle="tab" data-bs-target="#ks" type="button" role="tab" aria-controls="ks" aria-selected="true">Kepala Sekolah</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="wakakur-tab" data-bs-toggle="tab" data-bs-target="#wakakur" type="button" role="tab" aria-controls="wakakur" aria-selected="false">Waka Kurikulum</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="os-tab" data-bs-toggle="tab" data-bs-target="#os" type="button" role="tab" aria-controls="os" aria-selected="false">Orang Tua / Siswa</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="rk-tab" data-bs-toggle="tab" data-bs-target="#rk" type="button" role="tab" aria-controls="rk" aria-selected="false">Rekan Kerja</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="ds-tab" data-bs-toggle="tab" data-bs-target="#ds" type="button" role="tab" aria-controls="ds" aria-selected="false">Diri Sendiri</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="ks" role="tabpanel" aria-labelledby="ks-tab">
              <table class="table table-bordered table-striped table-vcenter" id="indikatornilai">
                <thead>
                  <tr>
                    <th>Komponen</th>
                    <th>Definisi</th>
                    <th style="width: 40%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @if (auth()->user()->role == 'ADMIN')
                    <form action="/dp3guru/guru/{{$guru->id}}/editNilaiKsAdmin" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $nilai->id ?? '' }}">
                      <input type="hidden" name="guru_id" value="{{$guru->id}}">
                      <tr>
                          <th colspan="3" class="text-center">Evaluasi Guru oleh Kepala Sekolah</th>
                      </tr>
                      <tr>
                        <th>Aspek Kepribadian</th>
                        <th></th>
                        <th></th>
                      </tr>
                      <tr>
                        <td>Perilaku</td>
                        <td>Kesesuaian dengan Iman dan etika Kristen</td>
                        <td>
                          <input type="text" class="form-control" name="prilakuKepri" value="{{$nilai->prilakuKepri ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Tutur Kata</td>
                        <td>Kesesuaian dengan Iman dan etika Kristen</td>
                        <td>
                          <input type="text" class="form-control" name="tuturkataKepri" value="{{$nilai->tuturkataKepri ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Keuangan</td>
                        <td>Jujur dan bertanggung jawab</td>
                        <td>
                          <input type="text" class="form-control" name="keuanganKepri" value="{{$nilai->keuanganKepri ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Kepedulian</td>
                        <td>Terhadap sesama dan lingkungan sekolah</td>
                        <td>
                          <input type="text" class="form-control" name="kepedulianKepri" value="{{$nilai->kepedulianKepri ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Persekutuan Doa/ Ibadah</td>
                        <td>Keaktifan (hadir dan terlibat)</td>
                        <td>
                          <input type="text" class="form-control" name="persekutuanKepri" value="{{$nilai->persekutuanKepri ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Penampilan</td>
                        <td>Bersih, rapi dan sopan</td>
                        <td>
                          <input type="text" class="form-control" name="penampilanKepri" value="{{$nilai->penampilanKepri ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Sikap Kerja</td>
                        <td>Aktif dan positif</td>
                        <td>
                          <input type="text" class="form-control" name="sikapkerjaKepri" value="{{$nilai->sikapkerjaKepri ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Masuk Kerja</td>
                        <td>Hadir penuh, ijin "jelas", tidak terlambat</td>
                        <td>
                          <input type="text" class="form-control" name="masukkerjaKepri" value="{{$nilai->masukkerjaKepri ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Kesetiaan pada YSKI</td>
                        <td>Kepatuhan  terhadap peraturan kepegawaian, Pelaksanaan tugas/ kesepakatan</td>
                        <td>
                          <input type="text" class="form-control" name="kesetianyskiKepri" value="{{$nilai->kesetianyskiKepri ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Kesetiaan pada Pimpinan</td>
                        <td>Kepatuhan terhadap perintah pimpinan dan keputusan bersama</td>
                        <td>
                          <input type="text" class="form-control" name="kesetianpimKepri" value="{{$nilai->kesetianpimKepri ?? ''}}">
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
                          <input type="text" class="form-control" name="manajkelasPeda" value="{{$nilai->manajkelasPeda ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Kualitas Pembelajaran</td>
                        <td>Rancangan, pelaksanaan, penilaian</td>
                        <td>
                          <input type="text" class="form-control" name="kualitaspemPeda" value="{{$nilai->kualitaspemPeda ?? ''}}">
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
                          <input type="text" class="form-control" name="samaortuSos" value="{{$nilai->samaortuSos ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Kerjasama dengan Pendidik</td>
                        <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama, Berbagi pengetahuan dan pemahaman keilmuan</td>
                        <td>
                          <input type="text" class="form-control" name="samapendSos" value="{{$nilai->samapendSos ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Kerjasama dengan Tenaga Kependidikan</td>
                        <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama</td>
                        <td>
                          <input type="text" class="form-control" name="samatenpendSos" value="{{$nilai->samatenpendSos ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Organisasi/ Kegiatan Sekolah</td>
                        <td>Pemikiran untuk pengembangan/ perbaikan/ pemecahan masalah</td>
                        <td>
                          <input type="text" class="form-control" name="organisasiSos" value="{{$nilai->organisasiSos ?? ''}}">
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
                          <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{$nilai->kompkeilmuProfesional ?? ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td>Seminar / Literasi</td>
                        <td>Keaktifan mengikuti seminar / pelatihan, keaktifan membaca buku</td>
                        <td>
                          <input type="text" class="form-control" name="seminarProfesional" value="{{$nilai->seminarProfesional ?? ''}}">
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
                          <button class="btn btn-primary" type="submit">Update Nilai</button>
                          <a href="{{route('nilaiGrDetail', $guru->id)}}" class="btn btn-secondary">Kembali</a>
                        </td>
                      </tr>
                    </form>
                  @endif 
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="wakakur" role="tabpanel" aria-labelledby="wakakur-tab">
              <table class="table table-bordered table-striped table-vcenter" id="indikatornilai">
                <thead>
                  <tr>
                    <th>Komponen</th>
                    <th>Definisi</th>
                    <th style="width: 40%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @if (auth()->user()->role == 'ADMIN')
                      <form action="/dp3guru/guru/{{$guru->id}}/editNilaiWakaAdmin" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{ $nilaiwaka->id ?? '' }}">
                          <input type="hidden" name="guru_id" value="{{$guru->id}}">
                          <tr>
                          <th colspan="3" class="text-center">Evaluasi Guru oleh Waka Kurikulum</th>
                          </tr>
                          <tr>
                          <th>Aspek Kepribadian</th>
                          <th></th>
                          <th></th>
                          </tr>
                          <tr>
                          <td>Penampilan</td>
                          <td>Bersih, rapi dan sopan</td>
                          <td>
                              <input type="text" class="form-control" name="penamKepri" value="{{$nilaiwaka->penamKepri ?? ''}}">
                          </td>
                          </tr>
                          <tr>
                          <td>Sikap Kerja</td>
                          <td>Aktif dan positif</td>
                          <td>
                              <input type="text" class="form-control" name="sikerKepri" value="{{$nilaiwaka->sikerKepri ?? ''}}">
                          </td>
                          </tr>
                          <tr>
                          <td>Masuk Kerja</td>
                          <td>Hadir penuh, ijin "jelas", tidak terlambat</td>
                          <td>
                              <input type="text" class="form-control" name="maskerKepri" value="{{$nilaiwaka->maskerKepri ?? ''}}">
                          </td>
                          </tr>
                          <tr>
                          <td>Kesetiaan pada Pimpinan</td>
                          <td>Kepatuhan terhadap perintah pimpinan dan keputusan bersama</td>
                          <td>
                              <input type="text" class="form-control" name="kesetiaanpimKepri" value="{{$nilaiwaka->kesetiaanpimKepri ?? ''}}">
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
                              <input type="text" class="form-control" name="valuePeda" value="{{$nilaiwaka->valuePeda ?? ''}}">
                          </td>
                          </tr>
                          <tr>
                          <td>Manajemen Kelas</td>
                          <td>Pembelajaran yang kondusif, efektif dan efisien</td>
                          <td>
                              <input type="text" class="form-control" name="manajkelasPeda" value="{{$nilaiwaka->manajkelasPeda ?? ''}}">
                          </td>
                          </tr>
                          <tr>
                          <td>Penggunaan LMS</td>
                          <td>Aktif memanfaatkan dalam PBM</td>
                          <td>
                              <input type="text" class="form-control" name="lmsPeda" value="{{$nilaiwaka->lmsPeda ?? ''}}">
                          </td>
                          </tr>
                          <tr>
                          <td>Model pembelajaran</td>
                          <td>Flipped classroom, 4C dan menyenangkan</td>
                          <td>
                              <input type="text" class="form-control" name="modelpemPeda" value="{{$nilaiwaka->modelpemPeda ?? ''}}">
                          </td>
                          </tr>
                          <tr>
                          <td>Media Pembelajaran</td>
                          <td>Pembuatan PPT / Slide / Canva / Video yang menarik</td>
                          <td>
                              <input type="text" class="form-control" name="mediaPeda" value="{{$nilaiwaka->mediaPeda ?? ''}}">
                          </td>
                          </tr>
                          <tr>
                          <td>Kualitas Pembelajaran</td>
                          <td>Rancangan, pelaksanaan, penilaian </td>
                          <td>
                              <input type="text" class="form-control" name="kualitaspemPeda" value="{{$nilaiwaka->kualitaspemPeda ?? ''}}">
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
                              <input type="text" class="form-control" name="samapendSos" value="{{$nilaiwaka->samapendSos ?? ''}}">
                          </td>
                          </tr>
                          <tr>
                          <td>Organisasi / Kegiatan Sekolah</td>
                          <td>Pemikiran untuk pengembangan / perbaikan / pemecahan masalah</td>
                          <td>
                              <input type="text" class="form-control" name="organisasiSos" value="{{$nilaiwaka->organisasiSos ?? ''}}">
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
                              <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{$nilaiwaka->kompkeilmuProfesional ?? ''}}">
                          </td>
                          </tr>
                          <tr>
                          <td>Kompetensi Digital</td>
                          <td>Penguasaan teknologi</td>
                          <td>
                              <input type="text" class="form-control" name="kompdigProfesional" value="{{$nilaiwaka->kompdigProfesional ?? ''}}">
                          </td>
                          </tr>
                          <tr>
                          <td>Seminar / Literasi</td>
                          <td>Keaktifan mengikuti seminar / pelatihan, keaktifan membaca buku</td>
                          <td>
                              <input type="text" class="form-control" name="seminarProfesional" value="{{$nilaiwaka->seminarProfesional ?? ''}}">
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
                              <button class="btn btn-primary" type="submit">Update Nilai</button>
                              <a href="{{route('nilaiGrDetail', $guru->id)}}" class="btn btn-secondary">Kembali</a>
                          </td>
                          </tr>
                      </form>
                  @endif
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="os" role="tabpanel" aria-labelledby="os-tab">
              <table class="table table-bordered table-striped table-vcenter" id="indikatornilai">
                <thead>
                  <tr>
                    <th>Komponen</th>
                    <th>Definisi</th>
                    <th style="width: 40%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @if (auth()->user()->role == 'ADMIN')
                    <form action="/dp3guru/guru/{{$guru->id}}/editNilaiOsAdmin" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $so->id ?? '' }}">
                        <input type="hidden" name="guru_id" value="{{$guru->id}}">
                        <tr>
                            <th colspan="3" class="text-center">Evaluasi Guru oleh Orang Tua / Siswa</th>
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
                            <input type="text" class="form-control" name="valuePeda" value="{{$so->valuePeda ?? ''}}">
                        </td>
                        </tr>
                        <tr>
                        <td>Manajemen Kelas</td>
                        <td>Pembelajaran yang kondusif, efektif dan efisien</td>
                        <td>
                            <input type="text" class="form-control" name="manajPeda" value="{{$so->manajPeda ?? ''}}">
                        </td>
                        </tr>
                        <tr>
                        <td>Penggunaan LMS</td>
                        <td>Aktif memanfaatkan dalam PBM</td>
                        <td>
                            <input type="text" class="form-control" name="lmsPeda" value="{{$so->lmsPeda ?? ''}}"> 
                        </td>
                        </tr>
                        <tr>
                        <td>Model pembelajaran</td>
                        <td>Flipped classroom, 4C dan menyenangkan</td>
                        <td>
                            <input type="text" class="form-control" name="modelPeda" value="{{$so->modelPeda ?? ''}}">
                        </td>
                        </tr>
                        <tr>
                        <td>Media Pembelajaran</td>
                        <td>Pembuatan PPT / Slide / Canva / Video yang menarik</td>
                        <td>
                            <input type="text" class="form-control" name="mediaPeda" value="{{$so->mediaPeda ?? ''}}">
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
                            <input type="text" class="form-control" name="kerjasoSos" value="{{$so->kerjasoSos ?? ''}}">
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
                            <input type="text" class="form-control" name="kompdigProfesional" value="{{$so->kompdigProfesional ?? ''}}">
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
                            <button class="btn btn-primary" type="submit">Update Nilai</button>
                            <a href="{{route('nilaiGrDetail', $guru->id)}}" class="btn btn-secondary">Kembali</a>
                        </td>
                        </tr>
                    </form>
                  @endif
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="rk" role="tabpanel" aria-labelledby="rk-tab">
              <table class="table table-bordered table-striped table-vcenter" id="indikatornilai">
                <thead>
                  <tr>
                    <th>Komponen</th>
                    <th>Definisi</th>
                    <th style="width: 40%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @if (auth()->user()->role == 'ADMIN')
                  <form action="/dp3guru/guru/{{$guru->id}}/editNilaiRkAdmin" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $rk->id ?? '' }}">
                    <input type="hidden" name="guru_id" value="{{$guru->id}}">
                    <tr>
                        <th colspan="3" class="text-center">Evaluasi Guru oleh Rekan Kerja</th>
                    </tr>
                    <tr>
                      <th>Aspek Kepribadian</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Perilaku</td>
                      <td>Kesesuaian dengan Iman dan etika Kristen</td>
                      <td>
                        <input type="text" class="form-control" name="perilakuKepri" value="{{$rk->perilakuKepri ?? ''}}">
                      </td>
                    </tr>
                    <tr>
                      <td>Tutur Kata</td>
                      <td>Kesesuaian dengan Iman dan etika Kristen</td>
                      <td>
                        <input type="text" class="form-control" name="tuturkataKepri" value="{{$rk->tuturkataKepri ?? ''}}">
                      </td>
                    </tr>
                    <tr>
                      <td>Kepedulian</td>
                      <td>Terhadap sesama dan lingkungan sekolah</td>
                      <td>
                        <input type="text" class="form-control" name="kepedulianKepri" value="{{$rk->kepedulianKepri ?? ''}}">
                      </td>
                    </tr>
                    <tr>
                      <td>Penampilan</td>
                      <td>Bersih, rapi dan sopan</td>
                      <td>
                        <input type="text" class="form-control" name="penampilanKepri" value="{{$rk->penampilanKepri ?? ''}}">
                      </td>
                    </tr>
                    <tr>
                      <td>Sikap Kerja</td>
                      <td>Aktif dan positif</td>
                      <td>
                        <input type="text" class="form-control" name="sikerKepri" value="{{$rk->sikerKepri ?? ''}}">
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
                        <input type="text" class="form-control" name="samapendSos" value="{{$rk->samapendSos ?? ''}}">
                      </td>
                    </tr>
                    <tr>
                      <td>Kerjasama dengan Tenaga Kependidikan</td>
                      <td>Komunikasi dan relasi yang baik, Pelaksanaan tugas bersama</td>
                      <td>
                        <input type="text" class="form-control" name="samatenpendSos" value="{{$rk->samatenpendSos ?? ''}}">
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
                        <button class="btn btn-primary" type="submit">Update Nilai</button>
                        <a href="{{route('nilaiGrDetail', $guru->id)}}" class="btn btn-secondary">Kembali</a>
                      </td>
                    </tr>
                  </form>
                  @endif
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="ds" role="tabpanel" aria-labelledby="ds-tab">
              <table class="table table-bordered table-striped table-vcenter" id="indikatornilai">
                <thead>
                  <tr>
                    <th>Komponen</th>
                    <th>Definisi</th>
                    <th style="width: 40%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @if (auth()->user()->role == 'ADMIN')
                  <form action="/dp3guru/guru/{{$guru->id}}/editNilaiDsAdmin" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $ds->id ?? '' }}">
                    <input type="hidden" name="guru_id" value="{{$guru->id}}">
                    <tr>
                        <th colspan="3" class="text-center">Evaluasi Guru oleh Diri Sendiri</th>
                    </tr>
                    <tr>
                      <th>Aspek Kepribadian</th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Kepedulian</td>
                      <td>Terhadap sesama dan lingkungan sekolah</td>
                      <td>
                        <input type="text" class="form-control" name="kepedulianKepri" value="{{$ds->kepedulianKepri ?? ''}}">
                      </td>
                    </tr>
                    <tr>
                      <td>Persekutuan Doa/ Ibadah</td>
                      <td>Keaktifan (hadir dan terlibat)</td>
                      <td>
                        <input type="text" class="form-control" name="persekutuanKepri" value="{{$ds->persekutuanKepri ?? ''}}">
                      </td>
                    </tr>
                    <tr>
                      <td>Kesetiaan pada YSKI</td>
                      <td>Kepatuhan  terhadap peraturan kepegawaian, Pelaksanaan tugas/ kesepakatan</td>
                      <td>
                        <input type="text" class="form-control" name="kesetiaanyskiKepri" value="{{$ds->kesetiaanyskiKepri ?? ''}}">
                      </td>
                    </tr>
                    <tr>
                      <td>Kesetiaan pada Pimpinan</td>
                      <td>Kepatuhan terhadap perintah pimpinan dan keputusan bersama</td>
                      <td>
                        <input type="text" class="form-control" name="kesetiaanpimKepri" value="{{$ds->kesetiaanpimKepri ?? ''}}">
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
                        <input type="text" class="form-control" name="modelPeda" value="{{$ds->modelPeda ?? ''}}">
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
                        <input type="text" class="form-control" name="samaortuSos" value="{{$ds->samaortuSos ?? ''}}">
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
                        <input type="text" class="form-control" name="kompkeilmuProfesional" value="{{$ds->kompkeilmuProfesional ?? ''}}">
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
                        <button class="btn btn-primary" type="submit">Update Nilai</button>
                        <a href="{{route('nilaiGrDetail', $guru->id)}}" class="btn btn-secondary">Kembali</a>
                      </td>
                    </tr>
                  </form>
                  @endif
                </tbody>
              </table>
            </div>
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

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        // Cek apakah ada tab yang terakhir aktif di localStorage
        var activeTab = localStorage.getItem('activeTab');

        // Jika ada, aktifkan tab tersebut
        if (activeTab) {
          var tab = new bootstrap.Tab(document.querySelector('button[data-bs-target="' + activeTab + '"]'));
          tab.show();
        }

        // Simpan tab yang aktif setiap kali user berpindah tab
        document.querySelectorAll('button[data-bs-toggle="tab"]').forEach(function(tab) {
          tab.addEventListener('shown.bs.tab', function (event) {
            var targetTab = event.target.getAttribute('data-bs-target');
            localStorage.setItem('activeTab', targetTab); // Simpan ID tab ke localStorage
          });
        });
      });
    </script>
@endpush