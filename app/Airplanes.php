<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplanes extends Model
{
    protected $table = 'airplanes';
    protected $fillable = ['airplane_code', 'airplane_name'];
}
