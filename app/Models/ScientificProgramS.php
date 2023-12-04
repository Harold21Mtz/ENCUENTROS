<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificProgramS extends Model
{
    use HasFactory;
    protected $table = 'scientificprogramS';

    protected $fillable = [
        'name_program',
        'date_presentation',
        'hour_presentation',
        'activity',
        'status',
        'registerBy',
    ];

    protected $guarded = [
        'status',
        'registerBy',
    ];
}
