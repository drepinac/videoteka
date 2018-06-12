<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB; 

class ZanrsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
DB::table('zanrs')->insert(
        [
          array(// row #0
            'naziv' => 'Akcija',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
          ),
          array(// row #1
            'naziv' => 'Povjesni',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
          ),
          array(// row #2
            'naziv' => 'Triller',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
          ),
          array(// row #3
            'naziv' => 'Fanatasticni',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => NULL
          )
            ]
            ); 
    }
}
