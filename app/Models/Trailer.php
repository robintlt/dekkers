<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trailer';

 protected $casts = [
        'date_of_firstadmission' => 'datetime:Y-m-d', // Change your format
        'document' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                'license_plate', 'fleetnumber','merk','date_of_firstadmission','document'
    ];
}
