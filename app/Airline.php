<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $table = 'airlines';

    protected $fillable = [
        'airline_code',
        'airline_name',
        'carry_on',
        'check_in_baggage',
        'airline_img'
    ];

    /**
     * Validation rules for this model
     */
    static public $rules = [
        'airline_code' => 'required|min:3:max:255',
        'airline_name' => 'required|min:3:max:255',
        'carry_on' => 'required',
        'check_in_baggage' => 'required',
        'airline_img' => 'required',
    ];
}
