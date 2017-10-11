<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('cities')->insert([
    		[
    		'name' => 'Pécs',
    		],
    		[
    		'name' => 'Mohács',
    		],
    		[
    		'name' => 'Pellérd',
    		],
    		[
    		'name' => 'Kozármisleny',
    		]
  		]);
    }
  }
