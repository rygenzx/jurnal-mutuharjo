<?php

namespace App\Imports;

use App\Teacher;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class TeachersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = User::create([
            "role" => "teacher",
            "username" => $row[1],
            "password" => bcrypt($row[2])
        ]);

        return new Teacher([
            "nama" => $row[0],
            "user_id" => $user->id,
        ]);
    }
}