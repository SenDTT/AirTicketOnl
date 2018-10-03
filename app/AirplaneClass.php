<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirplaneClass extends Model
{
    protected $table = 'airplane_class';

    protected $fillable = [
        'seat_class_id',
        'airplane_id',
        'seat_num'
    ];

    public function airplane()
    {
        return $this->belongsTo(Airplanes::class, 'airplane_id', 'id');
    }

    public function seatClass()
    {
        return $this->belongsTo(SeatClasses::class, 'seat_class_id', 'id');
    }
}
