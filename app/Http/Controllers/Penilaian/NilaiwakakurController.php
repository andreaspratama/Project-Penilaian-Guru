<?php

namespace App\Http\Controllers\Penilaian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahunajaran;
use App\Models\Unit;
use App\Models\Guru;
use App\Models\Indikatornilai;
use App\Models\Nilaiwakakur;
use Auth;

class NilaiwakakurController extends Controller
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

    public function nilaiGuru()
    {
        $gurus = Guru::all();

        return view('pages.penilaian.nilai.nilaiCoba', compact('gurus'));
    }

    public function nilaiGr($id)
    {
        $guru = Guru::findOrFail($id);
        $nilai = Nilaiks::where('guru_id', $guru->id)->first();
        $prilakuKepri = Nilaiks::where('prilakuKepri')->get();

        return view('pages.penilaian.nilai.nilaiGr', compact('guru', 'nilai', 'prilakuKepri'));
    }

    // public function prosNilaiGr($idguru, $idindikator)
    // {
    //     $aspek = Indikatornilai::findOrFail($idindikator);
    //     $gurus = Guru::findOrFail($idguru);
    //     $ta = Tahunajaran::where('status', 'Aktif')->get();

    //     return view('pages.penilaian.nilai.prosNilaiGr', compact('aspek', 'gurus', 'ta'));
    // }

    public function tambahNilai(Request $request, $idguru)
    {
        $hitung = $request->prilakuKepri + $request->tuturkataKepri + $request->keuanganKepri + $request->kepedulianKepri + $request->persekutuanKepri + $request->penampilanKepri + $request->sikapkerjaKepri + $request->masukkerjaKepri + $request->kesetiaanyskiKepri + $request->kesetianpimKepri + $request->manajkelasPeda + $request->kualitaspemPeda + $request->samaortuSos + $request->samapendSos + $request->samatenpendSos + $request->organisasiSos + $request->kompkeilmuProfesional + $request->seminarProfesional;
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
        // $ta = Tahunajaran::where('status', 'Aktif')->get();
        // $tahasil = $ta[0]->nama;
        // $role = Auth()->user()->role;
        // $guruid = $idguru;
        // dd($guruid);

        // $data = $request->all();
        // $data->ta = $tahasil;
        // $data->role = $role;
        // dd($data);
        // $data->save();
        
        // $tahasil = $ta[0]->nama;
        // $guru = Guru::findOrFail($idguru);
        // $guru->indikatornilais()->attach($request->indikatornilai_id, ['prilaku' => $request->prilaku, 'tuturkata' => $request->tuturkata, 'keuangan' => $request->keuangan, 'kepedulian' => $request->kepedulian, 'persekutuan' => $request->persekutuan, 'penampilan' => $request->penampilan, 'sikapkerja' => $request->sikapkerja, 'masukkerja' => $request->masukkerja, 'kesetiaanyski' => $request->kesetiaanyski, 'kesetiaanpimpinan' => $request->kesetiaanpimpinan, 'role' => Auth()->user()->role, 'ta' => $tahasil]);

        return redirect('/dp3guru/nilaiGr/'.$idguru);
    }

    public function prosEditNilaiGr($idguru, $idindikator)
    {
        $aspek = Indikatornilai::findOrFail($idindikator);
        $gurus = Guru::findOrFail($idguru);

        return view('pages.penilaian.nilai.prosEditNilaiGr', compact('aspek', 'gurus'));
    }

    public function editNilai(Request $request, $idguru)
    {
        $guru = Guru::findOrFail($idguru);
        $guru->indikatornilais()->updateExistingPivot($request->indikatornilai_id, ['prilaku' => $request->prilaku, 'tuturkata' => $request->tuturkata]);

        return redirect('url()->current()');
    }
}
