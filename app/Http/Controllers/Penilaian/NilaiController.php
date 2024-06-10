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
use App\Models\So;
use App\Models\Rk;
use App\Models\Ds;
use App\Http\Requests\KsRequest;
use App\Http\Requests\WakaRequest;
use App\Http\Requests\SoRequest;
use App\Http\Requests\RkRequest;
use App\Http\Requests\GuruRequest;
use Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $tas = Tahunajaran::all();
        $units = Unit::all();

        return view('pages.penilaian.nilai.index', compact('units', 'tas'));
    }

    public function ambilGuru(Request $request)
    {
        $guru = Guru::where('unit_id', $request->unit_id)->get();
        if (count($guru) > 0) {
            return response()->json($guru);
        }
    }

    // FUNTION BARU

    // 1. ....
    // 2. ....

    public function nilaiGuru()
    {
        $gurus = Guru::all();

        return view('pages.penilaian.nilai.nilaiCoba', compact('gurus'));
    }

    public function nilaiGr($id)
    {
        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $guru = Guru::findOrFail($id);
        $nilai = Nilaiks::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $nilaiwaka = Nilaiwakakur::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $so = So::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $rk = Rk::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $ds = Ds::where('guru_id', $guru->id)->where('ta', $tahasil)->first();
        $cekta = Nilaiks::where('ta', $tahasil)->first();

        return view('pages.penilaian.nilai.nilaiGr', compact('guru', 'nilai', 'nilaiwaka', 'so', 'rk', 'ds', 'cekta', 'ta'));
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
            $nilaiAkhir = $nilai->hasil + $nilaiwaka->hasil + $so->hasil + $rk->hasil + $ds->hasil;
        } else {
            $nilaiAkhir = 'Nilai belum lengkap';
        }
        
        // $nilaiAkhir = $nilaiwaka->hasil + $nilai->hasil + $so->hasil + $rk->hasil + $ds->hasil;

        return view('pages.penilaian.nilai.nilaiGrDetail', compact('guru', 'nilai', 'nilaiwaka', 'so', 'rk', 'ds', 'nilaiAkhir'));
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
        $hitunghasil = $hitung * 0.35;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;

        $dataid = Nilaiks::find($request->id);
        $datata = Nilaiks::find($tahasil);
        $data = $dataid && $datata;

        if(!$data) {
            $data = new Nilaiks();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
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

        return redirect('/dp3guru/nilaiGr/'.$idguru);
    }

    // Edit Nilai KS Role ADMIN
    public function editNilaiKsAdmin(Request $request, $idguru)
    {
        $hitung = $request->prilakuKepri + $request->tuturkataKepri + $request->keuanganKepri + $request->kepedulianKepri + $request->persekutuanKepri + $request->penampilanKepri + $request->sikapkerjaKepri + $request->masukkerjaKepri + $request->kesetianyskiKepri + $request->kesetianpimKepri + $request->manajkelasPeda + $request->kualitaspemPeda + $request->samaortuSos + $request->samapendSos + $request->samatenpendSos + $request->organisasiSos + $request->kompkeilmuProfesional + $request->seminarProfesional;
        $hitunghasil = $hitung * 0.35;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;

        $data = Nilaiks::find($request->id);

        if(!$data) {
            $data = new Nilaiks();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
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
        $hitunghasil = $hitung * 0.25;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;

        $data = Nilaiwakakur::find($request->id);

        if(!$data) {
            $data = new Nilaiwakakur();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
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

        return redirect('/dp3guru/nilaiGr/'.$idguru);
    }

    // Edit Nilai WAKA Role ADMIN
    public function editNilaiWakaAdmin(Request $request, $idguru)
    {
        $hitung = $request->penamKepri + $request->sikerKepri + $request->maskerKepri + $request->kesetiaanpimKepri + $request->valuePeda + $request->manajkelasPeda + $request->lmsPeda + $request->modelpemPeda + $request->mediaPeda + $request->kualitaspemPeda + $request->samapendSos + $request->organisasiSos + $request->kompkeilmuProfesional + $request->kompdigProfesional + $request->seminarProfesional;
        $hitunghasil = $hitung * 0.25;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;

        $data = Nilaiwakakur::find($request->id);

        if(!$data) {
            $data = new Nilaiwakakur();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
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
        $hitunghasil = $hitung * 0.20;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;

        $data = So::find($request->id);

        if(!$data) {
            $data = new So();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
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

        return redirect('/dp3guru/nilaiGr/'.$idguru);
    }

    // Edit Nilai SO Role Admin
    public function editNilaiSoAdmin(Request $request, $idguru)
    {
        $hitung = $request->valuePeda + $request->manajPeda + $request->lmsPeda + $request->modelPeda + $request->mediaPeda + $request->kerjasoSos + $request->kompdigProfesional;
        $hitunghasil = $hitung * 0.20;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;

        $data = So::find($request->id);

        if(!$data) {
            $data = new So();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
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
        $hitunghasil = $hitung * 0.12;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;

        $data = Rk::find($request->id);

        if(!$data) {
            $data = new Rk();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
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

        return redirect('/dp3guru/nilaiGr/'.$idguru);
    }

    // Edit Nilai RK Role Admin
    public function editNilaiRkAdmin(Request $request, $idguru)
    {
        $hitung = $request->perilakuKepri + $request->tuturkataKepri + $request->kepedulianKepri + $request->penampilanKepri + $request->sikerKepri + $request->samapendSos + $request->samatenpendSos;
        $hitunghasil = $hitung * 0.12;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;

        $data = Rk::find($request->id);

        if(!$data) {
            $data = new Rk();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
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
    public function tambahNilaiDs(GuruRequest $request, $idguru)
    {
        $hitung = $request->kepedulianKepri + $request->persekutuanKepri + $request->kesetiaanyskiKepri + $request->kesetiaanpimKepri + $request->modelPeda + $request->samaortuSos + $request->kompkeilmuProfesional;
        $hitunghasil = $hitung * 0.08;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;

        $data = Ds::find($request->id);

        if(!$data) {
            $data = new Ds();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
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

        return redirect('/dp3guru/nilaiGr/'.$idguru);
    }

    // Edit Nilai Diri Sendiri Role Admin
    public function editNilaiDsAdmin(Request $request, $idguru)
    {
        $hitung = $request->kepedulianKepri + $request->persekutuanKepri + $request->kesetiaanyskiKepri + $request->kesetiaanpimKepri + $request->modelPeda + $request->samaortuSos + $request->kompkeilmuProfesional;
        $hitunghasil = $hitung * 0.08;

        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;

        $data = Ds::find($request->id);

        if(!$data) {
            $data = new Ds();
        }

        $data->guru_id = $request->guru_id;
        $data->ta = $tahasil;
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
}
