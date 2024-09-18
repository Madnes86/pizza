<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BD_us extends Controller
{
    public function add($table, $data)
    {
        
        DB::table('$tabel')->insert(
               $data
        );
        dd($data);
    }
    public function update($table, $data, $where)
    {
        DB::table('$table')->where('$where')->update(
            $data
        );
    }

    public function delete($table, $where)
    {
        DB::table('$table')->where('$where')->delete();
    }   

    public function get($table)
    {
        return DB::table('$table')->get();
    }
}
