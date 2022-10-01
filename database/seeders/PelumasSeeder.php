<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class PelumasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pelumasData = ['Turalik 52','Tellus 68','Tellus 1000','Masri 150','Masri 220','Masri 320',
        'Masri 460','Masri 680','Morlina 320','Alphasyn 320','Alphasyn 460','Alphasyn HTX 1000',
        'Rarus 429','Mobil Gear 320','Unisyn 460','Unisyn 1000','Renolin PG 1000','Gadus 220',
        'Gadus 460','Mobilith SHC 220','Mobilith SHC 460','Mobil XHP 222','Mobil XHP 462','Almagard 3752',
        'LE 9011','Tribol 220','Firetemp XT 2','Mollub Alloy 777-2'];
        $id = 1;
        $date = Carbon::now();
        for ($i=0; $i <= sizeof($pelumasData) - 1; $i++) { 
            DB::table('pelumas')->insert([
                'id' => $id,
                'nama_pelumas' => $pelumasData[$i],
                'created_at' => $date,
                'updated_at' => $date
            ]);
            $id++;
        }
    }
}
