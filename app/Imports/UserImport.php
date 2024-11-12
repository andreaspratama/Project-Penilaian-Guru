<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;
use Illuminate\Support\Str;

class UserImport implements ToModel
{ 
    public function model(array $row)
        {
            $rem = Str::random(60);

            return new User([
                'name' => $row[0],
                'email' => $row[1],
                'password' => bcrypt($row[2]),
                'remember_token' => $rem,
                'role' => $row[3],
            ]);
        }    
}
