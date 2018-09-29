<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table='locations';
    protected $fillable=['location_code','location_name','description'];
}
