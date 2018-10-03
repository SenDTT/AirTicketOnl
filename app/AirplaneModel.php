<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirplaneModel extends Model
{
    protected $table = 'airplane_model';

    protected $fillable = [
        'model_code',
        'airplane_id'
    ];

    public function airplane()
    {
        return $this->belongsTo(Airplanes::class, 'airplane_id', 'id');
    }
}
