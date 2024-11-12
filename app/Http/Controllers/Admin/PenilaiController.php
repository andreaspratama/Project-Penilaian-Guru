<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penilai;
use App\Models\Unit;
use App\Models\User;
use App\Models\Guru;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PenilaiImport;

class PenilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Penilai::orderBy('id', 'DESC')->with('unit');

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a class="btn btn-warning" href="' . route('penilai.edit', $item->id) . '">
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
                ->rawColumns(['aksi', 'number'])
                ->make();
        }

        return view('pages.admin.penilai.index');
    }

    public function ambilGuruPenilai(Request $request)
    {
        $guru = Guru::where('unit_id', $request->unit_id)->get();
        if (count($guru) > 0) {
            return response()->json($guru);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();

        return view('pages.admin.penilai.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // INSERT KE TABLE USER
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('penilai');
        $user->role = $request->role;
        $user->save();

        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required',
            'unit_id' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'dinilai' => 'array', // Pastikan dinilai adalah array
        ]);

        $dinilai = implode(',', $validatedData['dinilai']);

        // INSERT KE TABLE PENILAI
        $penilai = new Penilai();
        $penilai->nama = $validatedData['nama'];
        $penilai->unit_id = $validatedData['unit_id'];
        $penilai->user_id = $user->id;
        $penilai->email = $validatedData['email'];
        $penilai->role = $validatedData['role'];
        $penilai->dinilai = $dinilai;
        $penilai->save();

        // $request->request->add(['user_id' => $user->id]);
        // $data = Penilai::create($request->all());

        return redirect()->route('penilai.index')->with('success', 'Data berhasil dimasukan. Good job');
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
        $gurus = Guru::all();
        $item = Penilai::findOrFail($id);

        return view('pages.admin.penilai.edit', compact('item', 'units', 'gurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Penilai::findOrFail($id);
        $update_penilai = $data->user_id;

        $dinilai = is_array($data['dinilai']) ? implode(',', $data['dinilai']) : $data['dinilai'];

        $data->update([
            'nama' => $request->nama,
            'unit_id' => $request->unit_id,
            'user_id' => $update_penilai,
            'email' => $request->email,
            'role' => $request->role,
            'dinilai' => is_array($request->dinilai) ? implode(',', $request->dinilai) : $request->dinilai,
        ]);

        $baru = User::find($update_penilai);
        $baru->name = $request->nama;
        $baru->email = $request->email;
        $baru->role = $request->role;
        $baru->save();

        // Validasi data
        // $validatedData = $request->validate([
        //     'nama' => 'required',
        //     'unit_id' => 'required',
        //     'email' => 'required|email',
        //     'role' => 'required',
        //     'dinilai' => 'required|array', // Pastikan dinilai adalah array
        // ]);

        // INSERT KE TABLE PENILAI
        // $penilai = new Penilai();
        // $penilai->nama = $validatedData['nama'];
        // $penilai->unit_id = $validatedData['unit_id'];
        // $penilai->user_id = $user->id;
        // $penilai->email = $validatedData['email'];
        // $penilai->role = $validatedData['role'];
        // $penilai->dinilai = $dinilai;
        // $penilai->save();


        return redirect()->route('penilai.index')->with('success', 'Data berhasil diubah. Good job');
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
        $item = Penilai::findOrFail($id);
        $item->delete();

        $hapus_siswa = $item->user_id;
        User::where('id', $hapus_siswa)->delete();
        return redirect()->route('penilai.index')->with('success', 'Data berhasil dihapus. Good job');
    }

    public function penilaiImportExcel(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataPenilai', $namaFile);

        Excel::import(new PenilaiImport, public_path('/DataPenilai/'.$namaFile));

        return redirect()->route('penilai.index')->with('success', 'Data Berhasil Diimport');
    }
}
