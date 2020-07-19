<?php

namespace App\Operational;

use Illuminate\Database\Eloquent\Model;

class BookLibrary extends Model
{
    protected $table = 'book_libraries';
    protected $fillable = ['books_id', 'libraries_id', 'status'];
    protected $dates = ['updated_at', 'created_at'];

    public function libraryInformation()
    {
        return $this->belongsTo('App\MData\Library', 'libraries_id');
    }

    public function bookInformation()
    {
        return $this->belongsTo('App\MData\Book', 'books_id');
    }
}
