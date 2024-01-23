<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WarrantySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('warranty')->insert([
            'code' => Str::random(10),
            'status' => 'unclaimed'
        ]);
        DB::table('warranty')->insert([
            'code' => Str::random(10),
            'status' => 'unclaimed'
        ]);
        DB::table('warranty')->insert([
            'code' => Str::random(10),
            'status' => 'unclaimed'
        ]);
        DB::table('warranty')->insert([
            'code' => Str::random(10),
            'status' => 'unclaimed'
        ]);
        DB::table('warranty')->insert([
            'code' => Str::random(10),
            'status' => 'unclaimed'
        ]);
        DB::table('warranty')->insert([
            'code' => Str::random(10),
            'status' => 'unclaimed'
        ]);
        DB::table('warranty')->insert([
            'code' => Str::random(10),
            'status' => 'unclaimed'
        ]);
        DB::table('warranty')->insert([
            'code' => Str::random(10),
            'status' => 'unclaimed'
        ]);
        DB::table('warranty')->insert([
            'code' => Str::random(10),
            'status' => 'unclaimed'
        ]);
        DB::table('warranty')->insert([
            'code' => Str::random(10),
            'status' => 'unclaimed'
        ]);
    }
}
