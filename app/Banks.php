<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    protected $table = 'banks';
    protected $fillable = ['bank_name', 'account_number', 'account_name', 'branch', 'bank_img'];
}
