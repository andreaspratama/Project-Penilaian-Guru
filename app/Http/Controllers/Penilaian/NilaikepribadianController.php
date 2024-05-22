<?php

namespace App\Http\Controllers\Penilaian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kepribadian;

class NilaikepribadianController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();

        return view('pages.penilaian.nilaikepribadian.index', compact('gurus'));
    }

    public function editNilai($id)
    {
        $item = Guru::findOrFail($id);
        $kepri = Kepribadian::all();

        return view('pages.penilaian.nilaikepribadian.edit', compact('item', 'kepri'));
    }

    public function buatNilai()
    {
        return view('pages.penilaian.nilaikepribadian.buatnilai');
    }
}
