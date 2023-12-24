<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ConduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conduits')->insert([
            'title' => Str::random(100),
            'about' => Str::random(500),
            'detail' => Str::random(900),
            'tag' => Str::random(10),
            'created_at' => new DateTime(),
        ]);
    }
}
