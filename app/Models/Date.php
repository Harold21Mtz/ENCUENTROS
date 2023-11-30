<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    protected $table = 'dates';

    protected $fillable = [
        'date_name',
        'date_important',
        'date_description',
        'status',
        'registerBy',
    ];

    protected $guarded = [
        'status',
        'registerBy',
    ];
}
