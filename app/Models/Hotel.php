<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';

    protected $fillable = [
        'hotel_name',
        'hotel_description',
        'hotel_contact_number',
        'hotel_contact_email',
        'hotel_image',
        'hotel_image_secondary_one',
        'hotel_image_secondary_two',
        'hotel_image_secondary_three',
        'status',
        'registerBy',
    ];

    protected $guarded = [
        'status',
        'registerBy',
    ];

}
