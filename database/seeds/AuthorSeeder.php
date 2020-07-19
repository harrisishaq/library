<?php

use Illuminate\Database\Seeder;
use App\MData\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
    		['name' => 'Alex Ross', 'country' => 'America', 'status' => '1'],
    		['name' => 'Chip Zdarsky', 'country' => 'Canada', 'status' => '1'],
    		['name' => 'Mariko Tamaki', 'country' => 'Canada', 'status' => '1'],
    	];

    	foreach($authors as $author){
    		Author::create($author);
    	}
    }
}
