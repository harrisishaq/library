<?php

namespace App\MData;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = 'publishers';
    protected $fillable = ['publisher_code', 'name', 'country', 'status'];
    protected $dates = ['updated_at', 'created_at'];
}
