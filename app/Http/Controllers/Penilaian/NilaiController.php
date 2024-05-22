<?php

namespace App\Http\Controllers\Penilaian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahunajaran;
use App\Models\Unit;
use App\Models\Guru;
use App\Models\Indikatornilai;
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

    public function nilaiGuru()
    {
        $aspek = Indikatornilai::all();

        return view('pages.penilaian.nilai.nilaiCoba', compact('aspek'));
    }

    public function nilaiGr($id)
    {
        $aspek = Indikatornilai::findOrFail($id);
        $gurus = Guru::all();

        return view('pages.penilaian.nilai.nilaiGr', compact('aspek', 'gurus'));
    }

    public function prosNilaiGr($idguru, $idindikator)
    {
        $aspek = Indikatornilai::findOrFail($idindikator);
        $gurus = Guru::findOrFail($idguru);
        $ta = Tahunajaran::where('status', 'Aktif')->get();

        return view('pages.penilaian.nilai.prosNilaiGr', compact('aspek', 'gurus', 'ta'));
    }

    public function tambahNilai(Request $request, $idguru)
    {
        $ta = Tahunajaran::where('status', 'Aktif')->get();
        $tahasil = $ta[0]->nama;
        $guru = Guru::findOrFail($idguru);
        $guru->indikatornilais()->attach($request->indikatornilai_id, ['prilaku' => $request->prilaku, 'tuturkata' => $request->tuturkata, 'keuangan' => $request->keuangan, 'kepedulian' => $request->kepedulian, 'persekutuan' => $request->persekutuan, 'penampilan' => $request->penampilan, 'sikapkerja' => $request->sikapkerja, 'masukkerja' => $request->masukkerja, 'kesetiaanyski' => $request->kesetiaanyski, 'kesetiaanpimpinan' => $request->kesetiaanpimpinan, 'role' => Auth()->user()->role, 'ta' => $tahasil]);

        return redirect('url()->current()');
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
