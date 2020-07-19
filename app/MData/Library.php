<?php

namespace App\MData;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = 'libraries';
    protected $fillable = ['name', 'status'];
    protected $dates = ['updated_at', 'created_at'];
}
