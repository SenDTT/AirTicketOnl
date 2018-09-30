<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $table = 'ticket_type';

    protected $fillable = [
        'ticket_type_name'
    ];

    /**
     * Validation rules for this model
     */
    static public $rules = [
        'ticket_type_name' => 'required|min:1:max:255',
    ];
}
