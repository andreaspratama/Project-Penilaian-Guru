<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImport;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = User::orderBy('id', 'DESC');

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a class="btn btn-warning" href="' . route('user.edit', $item->id) . '">
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

        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.user.create');
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
        $user->password  = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('user.index')->with('success', 'Data berhasil dimasukan. Good job');
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
        $item = User::findOrFail($id);

        return view('pages.admin.user.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);
        $item->update($data);

        return redirect()->route('user.index')->with('success', 'Data berhasil diubah. Good job');
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
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus. Good job');
    }

    public function userImportExcel(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataUser', $namaFile);

        Excel::import(new UserImport, public_path('/DataUser/'.$namaFile));

        return redirect()->route('user.index')->with('success', 'Data Berhasil Diimport');
    }

}
