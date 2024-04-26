<?php

namespace App\Http\Controllers\Penilaian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahunajaran;
use App\Models\Unit;
use App\Models\Guru;

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
}
