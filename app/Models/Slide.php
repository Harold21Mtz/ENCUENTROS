<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $table = 'slides';

    protected $fillable = [
        'conference_name',
        'conference_date',
        'university_name',
        'faculty_name',
        'conference_logo',
        'conference_image',
        'conference_image_secondary_one',
        'conference_image_secondary_two',
        'conference_image_secondary_three',
        'conference_image_secondary_four',
        'conference_image_secondary_five',
        'status',
        'registerBy',
    ];

    protected $guarded = [
        'status',
        'registerBy',
    ];
}
