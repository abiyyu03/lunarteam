<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PlantAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plantAreaData = ['NAR 1 CR', 'NR 1 (RECL.LS)', 'NR 1 (RECL.Shale)','NR1 (Feed Been RM)', 
                            'NR1 ( Raw Mill)', 'NR1 (Kiln)', 'NR1 (Coal Mill)', 'HRC UTARA','HRC SELATAN',
                            'F MILL 1','F MILL 2', 'F MILL 3', 'F MILL 4', 'NR1 (SHREDDER)', 'NR1 (PACKHOUSE)'];
        $i = 1;
        foreach ($plantAreaData as $key => $value) {
            DB::table('plant_area')->insert([
                'id' => $i++,
                'plant_area' => $value,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }


    }
}
