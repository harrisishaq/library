<?php

use Illuminate\Database\Seeder;
Use App\MData\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
    		['isbn' => '9780785129431', 'title' => 'Avengers/Invaders', 'authors_id' => '1', 'publishers_id' => '2', 'year' => '2010', 'status' => '1'],
    		['isbn' => '9780785107552', 'title' => 'Earth X', 'authors_id' => '1', 'publishers_id' => '2', 'year' => '2001', 'status' => '1'],
    		['isbn' => '9781302917333', 'title' => 'Spider-Man: Life Story', 'authors_id' => '3', 'publishers_id' => '2', 'year' => '2019', 'status' => '1'],
    		['isbn' => '9781302914981', 'title' => 'Daredevil by Chip Zdarsky, Vol. 1: Know Fear', 'authors_id' => '3', 'publishers_id' => '2', 'year' => '2019', 'status' => '1'],
    		['isbn' => '9781302907563', 'title' => 'Peter Parker: The Spectacular Spider-Man, Vol. 1: Into the Twilight', 'authors_id' => '3', 'publishers_id' => '2', 'year' => '2017', 'status' => '1'],
    	];

    	foreach($books as $book){
    		Book::create($book);
    	}
    }
}
