<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WindowFilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('window-film')->insert([
        	'nama' => 'Black Mamba'
        ]);
    }
}
