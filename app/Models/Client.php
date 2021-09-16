<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    protected $fillable = ['klantnaam', 'adres','postcode', 'plaats','kvk', 'btw_number','user_id'];
}
