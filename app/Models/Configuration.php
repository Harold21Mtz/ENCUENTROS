<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

    protected $table = 'configurations';

    protected $fillable = [
        'configuration_maintenance',
        'registerBy',
    ];

    protected $guarded = [
        'registerBy',
    ];
}
