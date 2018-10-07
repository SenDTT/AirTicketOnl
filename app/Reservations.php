<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $table = 'reservations';

    protected $fillable = [
        'reservation_code',
        'reservation_gender',
        'name',
        'phone',
        'email',
        'requirement',
        'total',
        'status',
    ];

    static public $rules = [
        'reservation_gender' => 'required|min:1:max:255',
        'name' => 'required|min:1:max:255',
        'phone' => 'required|digits_between:10,12',
        'email' => 'required|email',
        'requirement' => 'required'
    ];
}
