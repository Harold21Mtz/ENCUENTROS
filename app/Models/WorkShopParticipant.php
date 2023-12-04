<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkShopParticipant extends Model
{
    use HasFactory;

    protected $table = 'workshopparticipants';

    protected $fillable = [
        'participant_name',
        'participant_title',
        'participant_presentation',
        'participant_description',
        'participant_university',
        'participant_profile',
        'participant_image_country',
        'status',
        'registerBy',
    ];

    protected $guarded = [
        'status',
        'registerBy',
    ];
}
