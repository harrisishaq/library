<?php

use Illuminate\Database\Seeder;
use App\MData\Library;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libraries = [
    		['name' => 'Library A', 'status' => '1'],
    		['name' => 'Library B', 'status' => '1'],
    		['name' => 'Library C', 'status' => '1'],
    	];

    	foreach($libraries as $library){
    		Library::create($library);
    	}
    }
}
