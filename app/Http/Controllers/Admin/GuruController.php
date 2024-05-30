<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Unit;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

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
                ->rawColumns(['aksi', 'number'])
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

        // INSERT KE TABEL GURU
        $request->request->add(['user_id' => $user->id]);
        Guru::create($request->all());

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

        return view('pages.admin.guru.edit', compact('item', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $item = Guru::findOrFail($id);
        $item->update($data);

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

        return redirect()->route('guru.index')->with('success', 'Data berhasil dihapus. Good job');
    }
}
