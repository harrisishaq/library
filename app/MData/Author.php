<?php

namespace App\MData;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = ['name', 'country', 'status'];
    protected $dates = ['updated_at', 'created_at'];
}
