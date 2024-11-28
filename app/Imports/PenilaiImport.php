<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;
use App\Models\Penilai;
use App\Models\Unit;
use Illuminate\Support\Str;

class PenilaiImport implements ToModel
{
    private $users;
    private $units;
            
    public function __construct()
    {
        $this->users = User::select('id', 'email')->get();
        $this->units = Unit::select('id', 'nama')->get();
    }

    public function model(array $row)
        {
            $user = $this->users->where('email', $row[1])->first();
            $unit = $this->units->where('nama', $row[2])->first();
            return new Penilai([
                'nama' => $row[0],
                'email' => $row[1],
                'unit_id' => $unit->id ?? NULL,
                'user_id' => $user->id ?? NULL,
                'role' => $row[3],
                'dinilai' => $row[4],
            ]);
        }    
}