<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Merek;
use App\Models\Tipe;
  
class MerekTipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*------------------------------------------
        --------------------------------------------
        Toyota Data
        --------------------------------------------
        --------------------------------------------*/
        $merek = Merek::create(['name' => 'Toyota']);
  
        $tipe = Tipe::create(['merek_id' => $merek->id, 'name' => 'Avanza']);

        /*------------------------------------------
        --------------------------------------------
        India Country Data
        --------------------------------------------
        --------------------------------------------*/
        $merek = Merek::create(['name' => 'Nissan']);
  
        $tipe = Tipe::create(['merek_id' => $merek->id, 'name' => 'GTR Nismo']);
    }
}