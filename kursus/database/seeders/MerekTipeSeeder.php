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
        $merek = Merek::firstOrCreate(['name' => 'Toyota']);
  
        $tipe = [[
            'merek_id' => $merek->id, 'name' => 'Avanza'
        ],[
            'merek_id' => $merek->id, 'name' => 'Agya'
        ],[
            'merek_id' => $merek->id, 'name' => 'Calya'
        ],[
            'merek_id' => $merek->id, 'name' => 'Camry'
        ],[
            'merek_id' => $merek->id, 'name' => 'Corolla Altis'
        ],[
            'merek_id' => $merek->id, 'name' => 'Fortuner'
        ],[
            'merek_id' => $merek->id, 'name' => 'Innova'
        ],[
            'merek_id' => $merek->id, 'name' => 'Kijang Innova'
        ],[
            'merek_id' => $merek->id, 'name' => 'Kijang Innova Reborn'
        ],[
            'merek_id' => $merek->id, 'name' => 'Kijang Innova Venturer'
        ],[
            'merek_id' => $merek->id, 'name' => 'Kijang Innova Venturer Touring Sport'
        ],[
            'merek_id' => $merek->id, 'name' => 'Kijang Innova Venturer Touring Sport Diesel'
        ],[
            'merek_id' => $merek->id, 'name' => 'Kijang Innova Venturer Diesel'
        ],[
            'merek_id' => $merek->id, 'name' => 'Kijang Innova Diesel'
        ],[
            'merek_id' => $merek->id, 'name' => 'Kijang Innova Diesel Reborn'
        ],[
            'merek_id' => $merek->id, 'name' => 'Kijang Innova Diesel Venturer'
        ],[
            'merek_id' => $merek->id, 'name' => 'Kijang Innova Diesel Venturer Touring Sport'
        ],[
            'merek_id' => $merek->id, 'name' => 'Kijang Innova Diesel Venturer Touring Sport'
        ]];

        foreach ($tipe as $value) {
            Tipe::firstOrCreate(
                ['name' => $value['name']],
                ['merek_id' => $value['merek_id']
            ]);
        }

        unset($tipe);
        unset($merek);

        /*------------------------------------------
        --------------------------------------------
        Nissan Data
        --------------------------------------------
        --------------------------------------------*/
        $merek = Merek::firstOrCreate(['name' => 'Nissan']);
        $tipe = [[
            'merek_id' => $merek->id, 
            'name' => 'GTR Nismo',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Premium',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Track Edition',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Black Edition',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Pure Edition',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Premium Edition',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Track Edition Engineered By Nismo',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Nismo',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Nismo Engineered By Nismo',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Nismo N Attack Package',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Nismo N Attack Package Engineered By Nismo',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Nismo N Attack Package Track Edition',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Nismo N Attack Package Track Edition Engineered By Nismo',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Nismo N Attack Package Track Edition Engineered By Nismo',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Nismo N Attack Package Track Edition Engineered By Nismo',
        ],[
            'merek_id' => $merek->id, 
            'name' => 'GTR Nismo N Attack Package'
        ]];

        foreach ($tipe as $value) {
            Tipe::firstOrCreate(
                ['name' => $value['name']],
                ['merek_id' => $value['merek_id']
            ]);
        }

        unset($tipe);
        unset($merek);
    }
}