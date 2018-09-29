<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $table = 'airlines';

    protected $fillable = [
        'airline_code',
        'airline_name',
        'airline_img'
    ];

    /**
     * Validation rules for this model
     */
    static public $rules = [
        'airline_code' => 'required|min:3:max:255',
        'airline_name' => 'required|min:3:max:255',
        'airline_img' => 'required',
    ];
}
