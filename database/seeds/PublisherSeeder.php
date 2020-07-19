<?php

use Illuminate\Database\Seeder;
use App\MData\Publisher;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$publishers = [
    		['publisher_code' => '4215', 'name' => 'VIZ Media', 'country' => 'America', 'status' => '1'],
    		['publisher_code' => '4231', 'name' => 'Marvel Comics', 'country' => 'America', 'status' => '1'],
    		['publisher_code' => '4012', 'name' => 'DC Comics', 'country' => 'America', 'status' => '1'],
    	];

    	foreach($publishers as $publisher){
    		Publisher::create($publisher);
    	}
    }
}
