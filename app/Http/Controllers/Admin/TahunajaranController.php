<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahunajaran;
use Yajra\DataTables\Facades\DataTables;

class TahunajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Tahunajaran::orderBy('id', 'DESC');

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a class="btn btn-warning" href="' . route('tahunajaran.edit', $item->id) . '">
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

        return view('pages.admin.tahunajaran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.tahunajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Tahunajaran::create($data);

        return redirect()->route('tahunajaran.index')->with('success', 'Data berhasil dimasukan. Good job');
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
        $item = Tahunajaran::findOrFail($id);

        return view('pages.admin.tahunajaran.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $item = Tahunajaran::findOrFail($id);
        $item->update($data);

        return redirect()->route('tahunajaran.index')->with('success', 'Data berhasil diubah. Good job');
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
        $item = Tahunajaran::findOrFail($id);
        $item->delete();

        return redirect()->route('tahunajaran.index')->with('success', 'Data berhasil dihapus. Good job');
    }
}
