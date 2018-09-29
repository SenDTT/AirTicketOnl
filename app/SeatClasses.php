<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatClasses extends Model
{
    protected $table = 'seat_classes';
    protected $fillable = ['seat_name'];
}
