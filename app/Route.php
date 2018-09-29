<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';

    protected $fillable = [
        'route_code',
        'airport_id_from',
        'airport_id_to',
        'route_name',
        'location_code_from',
        'location_code_to',
    ];

    static public $rules = [
        'route_code' => 'required|min:1:max:255',
        'airport_id_from' => 'required|min:1:max:255',
        'airport_id_to' => 'required',
        'route_name' => 'required',
        'location_code_from' => 'nullable',
        'location_code_to' => 'nullable',
    ];

    public function airportsFrom()
    {
        return $this->belongsTo(Airport::class, 'airport_id_from', 'id');
    }

    public function airportsTo()
    {
        return $this->belongsTo(Airport::class, 'airport_id_to', 'id');
    }
}
