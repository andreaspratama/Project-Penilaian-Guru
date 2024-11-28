<?php

namespace App\Http\Controllers\Penilaian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahunajaran;
use App\Models\Unit;
use App\Models\Guru;
use App\Models\Indikatornilai;
use App\Models\Nilaiks;
use App\Models\Nilaiwakakur;
use App\Models\Penilai;
use App\Models\So;
use App\Models\Rk;
use App\Models\Rksem;
use App\Models\Sosem;
use App\Models\Ds;
use App\Models\User;
use App\Http\Requests\KsRequest;
use App\Http\Requests\WakaRequest;
use App\Http\Requests\SoRequest;
use App\Http\Requests\RkRequest;
use App\Http\Requests\GuruRequest;
use App\Http\Requests\DsRequest;
use Illuminate\Support\Facades\Hash;
use Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $tas = Tahunajaran::all();
        $units = Unit::all();

        return view('pages.penilaian.nilai.index', compact('units', 'tas'));
    }

    public function cariGuru(Request $request){

        $gurus = Guru::where('id',$request->guru)->first();
        $taCari = Tahunajaran::where('id', $request->ta)->where('sem', $request->semester)->first();
        if ($taCari) {
            $taCariHasil = $taCari->nama;
            $taCariSem = $taCari->sem;

            $nilai = Nilaiks::where('guru_id', $gurus->id)->where('ta', $taCariHasil)->where('sem', $taCariSem)->first();
            $nilaiwaka = Nilaiwakakur::where('guru_id', $gurus->id)->where('ta', $taCariHasil)->where('sem', $taCariSem)->first();
            $so = So::where('guru_id', $gurus->id)->where('ta', $taCariHasil)->where('sem', $taCariSem)->first();
            $rk = Rk::where('guru_id', $gurus->id)->where('ta', $taCariHasil)->where('sem', $taCariSem)->first();
            $ds = Ds::where('guru_id', $gurus->id)->where('ta', $taCariHasil)->where('sem', $taCariSem)->first();
            if ($nilaiwaka && $nilai && $so && $rk && $ds) {
                $nilaiAkhir = ($nilai->hasil * 0.35) + ($nilaiwaka->hasil * 0.25) + ($so->hasil * 0.2) + ($rk->hasil * 0.12) + ($ds->hasil * 0.08);
            } else {
                $nilaiAkhir = 'Nilai belum lengkap';
            }

            if ($nilaiwaka && $nilai && $so && $rk && $ds) {
                if ($nilaiAkhir >= 110.67) {
                    $angkaNilai = 'A';
                } elseif ($nilaiAkhir >= 93.65) {
                    $angkaNilai = 'B';
                } else {
                    $angkaNilai = 'C';
                }
            } else {
                $angkaNilai = 'Nilai belum lengkap';
            }
        }

        return view('pages.penilaian.nilai.nilaiCari', compact('gurus','taCari', 'nilai', 'nilai', 'nilaiwaka', 'so', 'rk', 'ds', 'nilaiAkhir', 'angkaNilai'));
    }

    // public function nilaiGrDetailCari($id)
    // {
    //     $gurus = Guru::findOrFail($id);
    //     $taCari = Tahunajaran::where('id', $request->ta)->get();
    //     $taCariHasil = $taCari[0]->nama;
    //     $nilai = Nilaiks::where('guru_id', $guru->id)->where('ta', $taCariHasil)->first();
    //     $nilaiwaka = Nilaiwakakur::where('guru_id', $guru->id)->where('ta', $taCariHasil)->first();
    //     $so = So::where('guru_id', $guru->id)->where('ta', $taCariHasil)->first();
    //     $rk = Rk::where('guru_id', $guru->id)->where('ta', $taCariHasil)->first();
    //     $ds = Ds::where('guru_id', $guru->id)->where('ta', $taCariHasil)->first();
    //     if ($nilaiwaka && $nilai && $so && $rk && $ds) {
    //         $nilaiAkhir = ($nilai->hasil * 0.35) + ($nilaiwaka->hasil * 0.25) + ($so->hasil * 0.2) + ($rk->hasil * 0.12) + ($ds->hasil * 0.08);
    //     } else {
    //         $nilaiAkhir = 'Nilai belum lengkap';
    //     }

    //     if ($nilaiwaka && $nilai && $so && $rk && $ds) {
    //         if ($nilaiAkhir >= 110.67) {
    //             $angkaNilai = 'A';
    //         } elseif ($nilaiAkhir >= 93.65) {
    //             $angkaNilai = 'B';
    //         } else {
    //             $angkaNilai = 'C';
    //         }
    //     } else {
    //         $angkaNilai = 'Nilai belum lengkap';
    //     }
        
        
    //     // $nilaiAkhir = $nilaiwaka->hasil + $nilai->hasil + $so->hasil + $rk->hasil + $ds->hasil;

    //     return view('pages.penilaian.nilai.nilaiGrDetailCari', compact('guru', 'nilai', 'nilaiwaka', 'so', 'rk', 'ds', 'nilaiAkhir', 'angkaNilai'));
    // }

    public function ambilGuru(Request $request)
    {
        $guru = Guru::where('unit_id', $request->unit_id)->get();
        if (count($guru) > 0) {
            return response()->json($guru);
        }
    }

    public function nilaiGuru()
    {
        $gurus = Guru::all();

        return view('pages.penilaian.nilai.nilaiCoba', compact('gurus'));
    }

    public function nilaiGuruRekan()
    {
        $gurus = Guru::all();

        return view('pages.penilaian.nilai.nilaiGuruRekan', compact('gurus'));
    }

    public function nilaiGr($id)
    {
        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $guru = Guru::findOrFail($id);
        $nilai = Nilaiks::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $nilaiwaka = Nilaiwakakur::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $so = So::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $sosem = Sosem::where('guru_id', $guru->id)->where('ta', $tahasil)->where('user_id', auth()->user()->id)->first();
        $rk = Rk::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $rksem = Rksem::where('guru_id', $guru->id)->where('ta', $tahasil)->where('user_id', auth()->user()->id)->first();
        $ds = Ds::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $cekta = Nilaiks::where('ta', $tahasil)->first();

        return view('pages.penilaian.nilai.nilaiGr', compact('guru', 'nilai', 'nilaiwaka', 'so', 'rk', 'ds', 'cekta', 'ta', 'rksem', 'sosem'));
    }

    public function historyRk($id)
    {
        $guru = Guru::findOrFail($id);
        $rksem = Rksem::all();

        return view('pages.penilaian.nilai.historyRk', compact('guru', 'rksem'));
    }

    public function historyOs($id)
    {
        $guru = Guru::findOrFail($id);
        $sosem = Sosem::all();

        return view('pages.penilaian.nilai.historySo', compact('guru', 'sosem'));
    }

    public function nilaiGrDetail($id)
    {
        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $guru = Guru::findOrFail($id);
        $nilai = Nilaiks::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $nilaiwaka = Nilaiwakakur::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $so = So::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $rk = Rk::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $ds = Ds::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        if ($nilaiwaka && $nilai && $so && $rk && $ds) {
            $nilaiAkhir = ($nilai->hasil * 0.35) + ($nilaiwaka->hasil * 0.25) + ($so->hasil * 0.2) + ($rk->hasil * 0.12) + ($ds->hasil * 0.08);
        } else {
            $nilaiAkhir = 'Nilai belum lengkap';
        }

        if ($nilaiwaka && $nilai && $so && $rk && $ds) {
            if ($nilaiAkhir >= 110.67) {
                $angkaNilai = 'A';
            } elseif ($nilaiAkhir >= 93.65) {
                $angkaNilai = 'B';
            } else {
                $angkaNilai = 'C';
            }
        } else {
            $angkaNilai = 'Nilai belum lengkap';
        }
        
        
        // $nilaiAkhir = $nilaiwaka->hasil + $nilai->hasil + $so->hasil + $rk->hasil + $ds->hasil;

        return view('pages.penilaian.nilai.nilaiGrDetail', compact('guru', 'nilai', 'nilaiwaka', 'so', 'rk', 'ds', 'nilaiAkhir', 'angkaNilai'));
    }

    public function nilaiGrDetailKs($id)
    {
        $guru = Guru::findOrFail($id);
        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $guru = Guru::findOrFail($id);
        $nilai = Nilaiks::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $nilaiwaka = Nilaiwakakur::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $so = So::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $rk = Rk::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $ds = Ds::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        if ($nilaiwaka && $nilai && $so && $rk && $ds) {
            $nilaiAkhir = ($nilai->hasil * 0.35) + ($nilaiwaka->hasil * 0.25) + ($so->hasil * 0.2) + ($rk->hasil * 0.12) + ($ds->hasil * 0.08);
        } else {
            $nilaiAkhir = 'Nilai belum lengkap';
        }

        if ($nilaiwaka && $nilai && $so && $rk && $ds) {
            if ($nilaiAkhir >= 110.67) {
                $angkaNilai = 'A';
            } elseif ($nilaiAkhir >= 93.65) {
                $angkaNilai = 'B';
            } else {
                $angkaNilai = 'C';
            }
        } else {
            $angkaNilai = 'Nilai belum lengkap';
        }

        return view('pages.penilaian.nilai.nilaiGrDetailKs', compact('guru', 'nilai', 'nilaiwaka', 'so', 'rk', 'ds', 'nilaiAkhir', 'angkaNilai'));
    }

    public function nilaiGrEdit($id)
    {
        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $guru = Guru::findOrFail($id);
        $nilai = Nilaiks::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $nilaiwaka = Nilaiwakakur::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $so = So::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $rk = Rk::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $ds = Ds::where('guru_id', $guru->id)->where('ta', $tahasil)->first();

        return view('pages.penilaian.nilai.nilaiGrEdit', compact('guru', 'nilai', 'nilaiwaka', 'so', 'rk', 'ds'));
    }

    // Tambah Nilai Role KS
    public function tambahNilaiKs(KsRequest $request, $idguru)
    {
        $hitung = $request->prilakuKepri + $request->tuturkataKepri + $request->keuanganKepri + $request->kepedulianKepri + $request->persekutuanKepri + $request->penampilanKepri + $request->sikapkerjaKepri + $request->masukkerjaKepri + $request->kesetianyskiKepri + $request->kesetianpimKepri + $request->manajkelasPeda + $request->kualitaspemPeda + $request->samaortuSos + $request->samapendSos + $request->samatenpendSos + $request->organisasiSos + $request->kompkeilmuProfesional + $request->seminarProfesional;
        $hitunghasil = $hitung;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $tasem = $ta[0]->sem;

        $dataid = Nilaiks::find($request->id);
        $datata = Nilaiks::find($tahasil);
        $data = $dataid && $datata;

        if(!$data) {
            $data = new Nilaiks();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
        $data->sem = $tasem;
        $data->role = Auth()->user()->role;
        $data->prilakuKepri = $request->prilakuKepri;
        $data->tuturkataKepri = $request->tuturkataKepri;
        $data->keuanganKepri = $request->keuanganKepri;
        $data->kepedulianKepri = $request->kepedulianKepri;
        $data->persekutuanKepri = $request->persekutuanKepri;
        $data->penampilanKepri = $request->penampilanKepri;
        $data->sikapkerjaKepri = $request->sikapkerjaKepri;
        $data->masukkerjaKepri = $request->masukkerjaKepri;
        $data->kesetianyskiKepri = $request->kesetianyskiKepri;
        $data->kesetianpimKepri = $request->kesetianpimKepri;
        $data->manajkelasPeda = $request->manajkelasPeda;
        $data->kualitaspemPeda = $request->kualitaspemPeda;
        $data->samaortuSos = $request->samaortuSos;
        $data->samapendSos = $request->samapendSos;
        $data->samatenpendSos = $request->samatenpendSos;
        $data->organisasiSos = $request->organisasiSos;
        $data->kompkeilmuProfesional = $request->kompkeilmuProfesional;
        $data->seminarProfesional = $request->seminarProfesional;
        $data->hasil = $hitunghasil;
        $data->save();

        emotify('success', 'Terimakasih, nilai sudah diinputkan dengan baik');

        return redirect('/dp3guru/nilaiGr/'.$idguru);
    }

    // Edit Nilai KS Role ADMIN
    public function editNilaiKsAdmin(Request $request, $idguru)
    {
        $hitung = $request->prilakuKepri + $request->tuturkataKepri + $request->keuanganKepri + $request->kepedulianKepri + $request->persekutuanKepri + $request->penampilanKepri + $request->sikapkerjaKepri + $request->masukkerjaKepri + $request->kesetianyskiKepri + $request->kesetianpimKepri + $request->manajkelasPeda + $request->kualitaspemPeda + $request->samaortuSos + $request->samapendSos + $request->samatenpendSos + $request->organisasiSos + $request->kompkeilmuProfesional + $request->seminarProfesional;
        $hitunghasil = $hitung;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $tasem = $ta[0]->sem;

        $data = Nilaiks::find($request->id);

        if(!$data) {
            $data = new Nilaiks();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
        $data->sem = $tasem;
        $data->role = Auth()->user()->role;
        $data->prilakuKepri = $request->prilakuKepri;
        $data->tuturkataKepri = $request->tuturkataKepri;
        $data->keuanganKepri = $request->keuanganKepri;
        $data->kepedulianKepri = $request->kepedulianKepri;
        $data->persekutuanKepri = $request->persekutuanKepri;
        $data->penampilanKepri = $request->penampilanKepri;
        $data->sikapkerjaKepri = $request->sikapkerjaKepri;
        $data->masukkerjaKepri = $request->masukkerjaKepri;
        $data->kesetianyskiKepri = $request->kesetianyskiKepri;
        $data->kesetianpimKepri = $request->kesetianpimKepri;
        $data->manajkelasPeda = $request->manajkelasPeda;
        $data->kualitaspemPeda = $request->kualitaspemPeda;
        $data->samaortuSos = $request->samaortuSos;
        $data->samapendSos = $request->samapendSos;
        $data->samatenpendSos = $request->samatenpendSos;
        $data->organisasiSos = $request->organisasiSos;
        $data->kompkeilmuProfesional = $request->kompkeilmuProfesional;
        $data->seminarProfesional = $request->seminarProfesional;
        $data->hasil = $hitunghasil;
        $data->save();

        return redirect('/dp3guru/nilaiGrEdit/'.$idguru);
    }

    // Tambah Nilai Role WAKA
    public function tambahNilaiWaka(WakaRequest $request, $idguru)
    {
        $hitung = $request->penamKepri + $request->sikerKepri + $request->maskerKepri + $request->kesetiaanpimKepri + $request->valuePeda + $request->manajkelasPeda + $request->lmsPeda + $request->modelpemPeda + $request->mediaPeda + $request->kualitaspemPeda + $request->samapendSos + $request->organisasiSos + $request->kompkeilmuProfesional + $request->kompdigProfesional + $request->seminarProfesional;
        $hitunghasil = $hitung;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $tasem = $ta[0]->sem;

        $data = Nilaiwakakur::find($request->id);

        if(!$data) {
            $data = new Nilaiwakakur();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
        $data->sem = $tasem;
        $data->role = Auth()->user()->role;
        $data->penamKepri = $request->penamKepri;
        $data->sikerKepri = $request->sikerKepri;
        $data->maskerKepri = $request->maskerKepri;
        $data->kesetiaanpimKepri = $request->kesetiaanpimKepri;
        $data->valuePeda = $request->valuePeda;
        $data->manajkelasPeda = $request->manajkelasPeda;
        $data->lmsPeda = $request->lmsPeda;
        $data->modelpemPeda = $request->modelpemPeda;
        $data->mediaPeda = $request->mediaPeda;
        $data->kualitaspemPeda = $request->kualitaspemPeda;
        $data->samapendSos = $request->samapendSos;
        $data->organisasiSos = $request->organisasiSos;
        $data->kompkeilmuProfesional = $request->kompkeilmuProfesional;
        $data->kompdigProfesional = $request->kompdigProfesional;
        $data->seminarProfesional = $request->seminarProfesional;
        $data->hasil = $hitunghasil;
        $data->save();

        emotify('success', 'Terimakasih, nilai sudah diinputkan dengan baik');

        return redirect('/dp3guru/nilaiGr/'.$idguru);
    }

    // Edit Nilai WAKA Role ADMIN
    public function editNilaiWakaAdmin(Request $request, $idguru)
    {
        $hitung = $request->penamKepri + $request->sikerKepri + $request->maskerKepri + $request->kesetiaanpimKepri + $request->valuePeda + $request->manajkelasPeda + $request->lmsPeda + $request->modelpemPeda + $request->mediaPeda + $request->kualitaspemPeda + $request->samapendSos + $request->organisasiSos + $request->kompkeilmuProfesional + $request->kompdigProfesional + $request->seminarProfesional;
        $hitunghasil = $hitung;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $tasem = $ta[0]->sem;

        $data = Nilaiwakakur::find($request->id);

        if(!$data) {
            $data = new Nilaiwakakur();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
        $data->sem = $tasem;
        $data->role = Auth()->user()->role;
        $data->penamKepri = $request->penamKepri;
        $data->sikerKepri = $request->sikerKepri;
        $data->maskerKepri = $request->maskerKepri;
        $data->kesetiaanpimKepri = $request->kesetiaanpimKepri;
        $data->valuePeda = $request->valuePeda;
        $data->manajkelasPeda = $request->manajkelasPeda;
        $data->lmsPeda = $request->lmsPeda;
        $data->modelpemPeda = $request->modelpemPeda;
        $data->mediaPeda = $request->mediaPeda;
        $data->kualitaspemPeda = $request->kualitaspemPeda;
        $data->samapendSos = $request->samapendSos;
        $data->organisasiSos = $request->organisasiSos;
        $data->kompkeilmuProfesional = $request->kompkeilmuProfesional;
        $data->kompdigProfesional = $request->kompdigProfesional;
        $data->seminarProfesional = $request->seminarProfesional;
        $data->hasil = $hitunghasil;
        $data->save();

        return redirect('/dp3guru/nilaiGrEdit/'.$idguru);
    }

    // Tambah Nilai Role SO
    public function tambahNilaiSo(SoRequest $request, $idguru)
    {
        $hitung = $request->valuePeda + $request->manajPeda + $request->lmsPeda + $request->modelPeda + $request->mediaPeda + $request->kerjasoSos + $request->kompdigProfesional;
        $hitunghasil = $hitung;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $tasem = $ta[0]->sem;
        $guruId = $request->guru_id;
        $userId = Auth()->user()->id;

        // Cek di tabel so sementara
        $existing = Sosem::where('guru_id', $guruId)
                                       ->where('user_id', $userId)
                                       ->first();
        
        $existing = Sosem::where('guru_id', $guruId)->where('user_id', $userId)->first();
        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah memberikan nilai.');
        }

        // Cek unit guru untuk menentukan jumlah penilai
        $guru = Guru::find($guruId);
        $unit = $guru->unit->nama;
        $jumlahPenilaiDibutuhkan = in_array($unit, ['K1', 'K2', 'K3']) ? 3 : 5;

        // Simpan nilai sementara
        $datasem = new Sosem();
        $datasem->guru_id = $guruId;
        $datasem->user_id = $userId;
        $datasem->ta = $tahasil;
        $datasem->sem = $tasem;
        $datasem->role = Auth()->user()->role;
        $datasem->valuePeda = $request->valuePeda;
        $datasem->manajPeda = $request->manajPeda;
        $datasem->lmsPeda = $request->lmsPeda;
        $datasem->modelPeda = $request->modelPeda;
        $datasem->mediaPeda = $request->mediaPeda;
        $datasem->kerjasoSos = $request->kerjasoSos;
        $datasem->kompdigProfesional = $request->kompdigProfesional;
        $datasem->hasil = $hitunghasil;
        $datasem->hasil = $hitunghasil;
        $datasem->comment = $request->comment;
        $datasem->save();

        // Cek jumlah penilai
        $jumlahPenilai = Sosem::where('guru_id', $guruId)->count();
        if ($jumlahPenilai == $jumlahPenilaiDibutuhkan) {
            // Hitung rata-rata nilai
            $rataRata1 = Sosem::where('guru_id', $guruId)->avg('valuePeda');
            $rataRata2 = Sosem::where('guru_id', $guruId)->avg('manajPeda');
            $rataRata3 = Sosem::where('guru_id', $guruId)->avg('lmsPeda');
            $rataRata4 = Sosem::where('guru_id', $guruId)->avg('modelPeda');
            $rataRata5 = Sosem::where('guru_id', $guruId)->avg('mediaPeda');
            $rataRata6 = Sosem::where('guru_id', $guruId)->avg('kerjasoSos');
            $rataRata7 = Sosem::where('guru_id', $guruId)->avg('kompdigProfesional');
            $rataRata8 = Sosem::where('guru_id', $guruId)->avg('hasil');
            
            // Simpan rata-rata ke tabel penilaian utama
            So::create([
                'guru_id' => $guruId,
                'ta' => $tahasil,
                'sem' => $tasem,
                'role' => Auth()->user()->role,
                'valuePeda' => $rataRata1,
                'manajPeda' => $rataRata2,
                'lmsPeda' => $rataRata3,
                'modelPeda' => $rataRata4,
                'mediaPeda' => $rataRata5,
                'kerjasoSos' => $rataRata6,
                'kompdigProfesional' => $rataRata7,
                'hasil' => $rataRata8,
                'comment' =>$request->comment,
            ]);

            // Hapus nilai sementara setelah semua penilai selesai
            // Rksem::where('guru_id', $guruId)->delete();
            emotify('success', 'Terimakasih, nilai sudah diinputkan dengan baik');

            return redirect()->back();
        }

        emotify('success', 'Terimakasih, nilai sudah diinputkan dengan baik');

        return redirect('/dp3guru/nilaiGr/'.$idguru);
    }

    // Edit Nilai SO Role Admin
    public function editNilaiSoAdmin(Request $request, $idguru)
    {
        $hitung = $request->valuePeda + $request->manajPeda + $request->lmsPeda + $request->modelPeda + $request->mediaPeda + $request->kerjasoSos + $request->kompdigProfesional;
        $hitunghasil = $hitung;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $tasem = $ta[0]->sem;

        $data = So::find($request->id);

        if(!$data) {
            $data = new So();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
        $data->sem = $tasem;
        $data->role = Auth()->user()->role;
        $data->valuePeda = $request->valuePeda;
        $data->manajPeda = $request->manajPeda;
        $data->lmsPeda = $request->lmsPeda;
        $data->modelPeda = $request->modelPeda;
        $data->mediaPeda = $request->mediaPeda;
        $data->kerjasoSos = $request->kerjasoSos;
        $data->kompdigProfesional = $request->kompdigProfesional;
        $data->hasil = $hitunghasil;
        $data->save();

        return redirect('/dp3guru/nilaiGrEdit/'.$idguru);
    }

    // Tambah Nilai Role RK
    public function tambahNilaiRk(RkRequest $request, $idguru)
    {
        $hitung = $request->perilakuKepri + $request->tuturkataKepri + $request->kepedulianKepri + $request->penampilanKepri + $request->sikerKepri + $request->samapendSos + $request->samatenpendSos;
        $hitunghasil = $hitung;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $tasem = $ta[0]->sem;
        $guruId = $request->guru_id;
        $userId = Auth()->user()->id;

        $existing = Rksem::where('guru_id', $guruId)
                                       ->where('user_id', $userId)
                                       ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah memberikan nilai.');
        }

        // Data sementara
        $datasem = Rksem::find($request->id);

        if(!$datasem) {
            $datasem = new Rksem();
        }

        $datasem->guru_id = $guruId;
        $datasem->user_id = $userId;
        $datasem->ta = $tahasil;
        $datasem->sem = $tasem;
        $datasem->role = Auth()->user()->role;
        $datasem->perilakuKepri = $request->perilakuKepri;
        $datasem->tuturkataKepri = $request->tuturkataKepri;
        $datasem->kepedulianKepri = $request->kepedulianKepri;
        $datasem->penampilanKepri = $request->penampilanKepri;
        $datasem->sikerKepri = $request->sikerKepri;
        $datasem->samapendSos = $request->samapendSos;
        $datasem->samatenpendSos = $request->samatenpendSos;
        $datasem->hasil = $hitunghasil;
        $datasem->save();

        // Cek jumlah penilai
        $jumlahPenilai = Rksem::where('guru_id', $guruId)->count();
        if ($jumlahPenilai == 2) {
            // Hitung rata-rata nilai
            $rataRata1 = Rksem::where('guru_id', $guruId)->avg('perilakuKepri');
            $rataRata2 = Rksem::where('guru_id', $guruId)->avg('tuturkataKepri');
            $rataRata3 = Rksem::where('guru_id', $guruId)->avg('kepedulianKepri');
            $rataRata4 = Rksem::where('guru_id', $guruId)->avg('penampilanKepri');
            $rataRata5 = Rksem::where('guru_id', $guruId)->avg('sikerKepri');
            $rataRata6 = Rksem::where('guru_id', $guruId)->avg('samapendSos');
            $rataRata7 = Rksem::where('guru_id', $guruId)->avg('samatenpendSos');
            $rataRata8 = Rksem::where('guru_id', $guruId)->avg('hasil');
            
            // Simpan rata-rata ke tabel penilaian utama
            Rk::create([
                'guru_id' => $guruId,
                'ta' => $tahasil,
                'sem' => $tasem,
                'role' => Auth()->user()->role,
                'perilakuKepri' => $rataRata1,
                'tuturkataKepri' => $rataRata2,
                'kepedulianKepri' => $rataRata3,
                'penampilanKepri' => $rataRata4,
                'sikerKepri' => $rataRata5,
                'samapendSos' => $rataRata6,
                'samatenpendSos' => $rataRata7,
                'hasil' => $rataRata8,
            ]);

            // Hapus nilai sementara setelah semua penilai selesai
            // Rksem::where('guru_id', $guruId)->delete();

            emotify('success', 'Terimakasih, nilai sudah diinputkan dengan baik');

            return redirect()->back();
        }


        // $data = Rk::find($request->id);

        // if(!$data) {
        //     $data = new Rk();
        // }

        // $data->guru_id = $request->guru_id;
        // $data->ta = $tahasil;
        // $data->role = Auth()->user()->role;
        // $data->perilakuKepri = $request->perilakuKepri;
        // $data->tuturkataKepri = $request->tuturkataKepri;
        // $data->kepedulianKepri = $request->kepedulianKepri;
        // $data->penampilanKepri = $request->penampilanKepri;
        // $data->sikerKepri = $request->sikerKepri;
        // $data->samapendSos = $request->samapendSos;
        // $data->samatenpendSos = $request->samatenpendSos;
        // $data->hasil = $hitunghasil;
        // $data->save();

        emotify('success', 'Terimakasih, nilai sudah diinputkan dengan baik');

        return redirect('/dp3guru/nilaiGr/'.$idguru);
    }

    // Edit Nilai RK Role Admin
    public function editNilaiRkAdmin(Request $request, $idguru)
    {
        $hitung = $request->perilakuKepri + $request->tuturkataKepri + $request->kepedulianKepri + $request->penampilanKepri + $request->sikerKepri + $request->samapendSos + $request->samatenpendSos;
        $hitunghasil = $hitung;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $tasem = $ta[0]->sem;

        $data = Rk::find($request->id);

        if(!$data) {
            $data = new Rk();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
        $data->sem = $tasem;
        $data->role = Auth()->user()->role;
        $data->perilakuKepri = $request->perilakuKepri;
        $data->tuturkataKepri = $request->tuturkataKepri;
        $data->kepedulianKepri = $request->kepedulianKepri;
        $data->penampilanKepri = $request->penampilanKepri;
        $data->sikerKepri = $request->sikerKepri;
        $data->samapendSos = $request->samapendSos;
        $data->samatenpendSos = $request->samatenpendSos;
        $data->hasil = $hitunghasil;
        $data->save();

        return redirect('/dp3guru/nilaiGrEdit/'.$idguru);
    }

    // Tambah Nilai Role Diri Sendiri
    public function tambahNilaiDs(DsRequest $request, $idguru)
    {
        $hitung = $request->kepedulianKepri + $request->persekutuanKepri + $request->kesetiaanyskiKepri + $request->kesetiaanpimKepri + $request->modelPeda + $request->samaortuSos + $request->kompkeilmuProfesional;
        $hitunghasil = $hitung;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $tasem = $ta[0]->sem;

        $data = Ds::find($request->id);

        if(!$data) {
            $data = new Ds();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
        $data->sem = $tasem;
        $data->role = Auth()->user()->role;
        $data->kepedulianKepri = $request->kepedulianKepri;
        $data->persekutuanKepri = $request->persekutuanKepri;
        $data->kesetiaanyskiKepri = $request->kesetiaanyskiKepri;
        $data->kesetiaanpimKepri = $request->kesetiaanpimKepri;
        $data->modelPeda = $request->modelPeda;
        $data->samaortuSos = $request->samaortuSos;
        $data->kompkeilmuProfesional = $request->kompkeilmuProfesional;
        $data->hasil = $hitunghasil;
        $data->save();

        emotify('success', 'Terimakasih, nilai sudah diinputkan dengan baik');

        return redirect('/dp3guru/nilaiGr/'.$idguru);
    }

    // Edit Nilai Diri Sendiri Role Admin
    public function editNilaiDsAdmin(Request $request, $idguru)
    {
        $hitung = $request->kepedulianKepri + $request->persekutuanKepri + $request->kesetiaanyskiKepri + $request->kesetiaanpimKepri + $request->modelPeda + $request->samaortuSos + $request->kompkeilmuProfesional;
        $hitunghasil = $hitung;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $tasem = $ta[0]->sem;

        $data = Ds::find($request->id);

        if(!$data) {
            $data = new Ds();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
        $data->sem = $tasem;
        $data->role = Auth()->user()->role;
        $data->kepedulianKepri = $request->kepedulianKepri;
        $data->persekutuanKepri = $request->persekutuanKepri;
        $data->kesetiaanyskiKepri = $request->kesetiaanyskiKepri;
        $data->kesetiaanpimKepri = $request->kesetiaanpimKepri;
        $data->modelPeda = $request->modelPeda;
        $data->samaortuSos = $request->samaortuSos;
        $data->kompkeilmuProfesional = $request->kompkeilmuProfesional;
        $data->hasil = $hitunghasil;
        $data->save();

        return redirect('/dp3guru/nilaiGrEdit/'.$idguru);
    }

    public function cariGuruBaru(Request $request)
    {
        // Ambil nilai filter dari request
        $ta = $request->input('ta');
        $semester = $request->input('semester');
        $unit = $request->input('unit');
        $guru = $request->input('guru');

        // Query berdasarkan filter
        $query = DB::table('nilai_guru');

        if ($ta) {
            $query->where('ta_id', $ta);
        }

        if ($semester) {
            $query->where('semester', $semester);
        }

        if ($unit) {
            $query->where('unit_id', $unit);
        }

        if ($guru) {
            $query->where('guru_id', $guru);
        }

        // Dapatkan hasil pencarian
        $hasil = $query->get();

        // Kirim hasil ke view
        return view('nilai_guru.index', compact('hasil'));
    }

    public function ubahPassword()
    {
        return view('pages.penilaian.nilai.ubahPassword');
    }

    public function ubahPasswordProses(Request $request)
    {
        // Cek password lama
        if(!Hash::check($request->old_password, auth()->user()->password)) {
            $request->flash();

            return redirect()->back()->with('message', 'Password lama tidak sesuai')->withInput();
        }

        if($request->new_password != $request->repeatpass) {
            $request->flash();
            
            return redirect()->back()->with('message', 'Password tidak sesuai')->withInput();
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('success', 'Password sudah diubah');
    }
}
