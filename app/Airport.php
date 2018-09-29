<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'airports';

    protected $fillable = [
        'airport_code',
        'airport_name',
        'location_id',
    ];

    static public $rules = [
        'airport_code' => 'required|min:3:max:255',
        'airport_name' => 'required|min:3:max:255',
        'location_id' => 'required',
    ];

    /**
     * Get the category
     */
    public function location()
    {
        return $this->belongsTo(Locations::class, 'location_id', 'id');
    }
}
