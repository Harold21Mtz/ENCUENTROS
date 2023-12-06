<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'event_name',
        'event_description_one',
        'event_description_two',
        'event_image',
        'event_image_one',
        'event_image_two',
        'event_image_three',
        'event_image_four',
        'event_image_five',
        'event_image_six',
        'event_image_seven',
        'event_image_eight',
        'status',
        'registerBy',
    ];

    protected $guarded = [
        'status',
        'registerBy',
    ];
}
