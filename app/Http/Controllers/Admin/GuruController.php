<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Unit;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GuruImport;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Guru::with('unit')->orderBy('id', 'DESC');

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a class="btn btn-warning" href="' . route('guru.edit', $item->id) . '">
                            Edit
                        </a>
                        <a class="btn btn-danger delete" href="#" data-id="'. $item->id .'">
                            Delete
                        </a>
                    ';
                })
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->addColumn('dinilai', function($item) {
                    // Ambil ID dari kolom `dinilai` dan ubah menjadi array
                    $dinilaiIds = explode(',', $item->dinilai);
    
                    // Ambil nama guru berdasarkan ID di array
                    $namaGuru = Guru::whereIn('id', $dinilaiIds)->pluck('nama')->toArray();
    
                    // Gabungkan nama guru menjadi string dipisah koma atau format lain
                    return implode(', ', $namaGuru);
                })
                ->rawColumns(['aksi', 'number', 'dinilai'])
                ->make();
        }

        return view('pages.admin.guru.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();

        return view('pages.admin.guru.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // INSERT KE TABEL USER
        $user = new User;
        $user->name  = $request->nama;
        $user->email  = $request->email;
        $user->password  = bcrypt('guru123**');
        $user->role = 'GURU';
        $user->save();

        $dinilai = isset($request['dinilai']) && is_array($request['dinilai']) 
            ? implode(',', $request['dinilai']) 
            : null; // Jika tidak ada, biarkan kosong (null)

        // INSERT KE TABLE PENILAI
        $guru = new Guru();
        $guru->nama = $request->nama;
        $guru->email = $request->email;
        $guru->unit_id = $request->unit_id;
        $guru->user_id = $user->id;
        $guru->dinilai = $dinilai;
        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Data berhasil dimasukan. Good job');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $units = Unit::all();
        $item = Guru::findOrFail($id);
        $gurus = Guru::all();

        return view('pages.admin.guru.edit', compact('item', 'units', 'gurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Guru::findOrFail($id);
        $dinilai = is_array($data['dinilai']) ? implode(',', $data['dinilai']) : $data['dinilai'];

        $data = $request->all();
        $data['dinilai'] = is_array($request->dinilai) ? implode(',', $request->dinilai) : $request->dinilai;
        $item = Guru::findOrFail($id);
        $item->update($data);

        $userId = $item->user_id;
        $userEdit = User::find($userId);
        $userEdit->name = $request->nama;
        $userEdit->email = $request->email;
        $userEdit->save();

        return redirect()->route('guru.index')->with('success', 'Data berhasil diubah. Good job');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id)
    {
        $item = Guru::findOrFail($id);
        $item->delete();

        $guruIdDelete = $item->user_id;
        User::where('id', $guruIdDelete)->delete();

        return redirect()->route('guru.index')->with('success', 'Data berhasil dihapus. Good job');
    }

    public function guruImportExcel(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataGuru', $namaFile);

        Excel::import(new GuruImport, public_path('/DataGuru/'.$namaFile));

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Diimport');
    }

}
