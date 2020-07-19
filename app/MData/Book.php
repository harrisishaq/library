<?php

namespace App\MData;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['isbn', 'title', 'authors_id', 'publishers_id', 'year', 'status'];
    protected $dates = ['updated_at', 'created_at'];

    public function authorBook()
    {
        return $this->belongsTo('App\MData\Author', 'authors_id');
    }

    public function publisherBook()
    {
        return $this->belongsTo('App\MData\Publisher', 'publishers_id');
    }
}
