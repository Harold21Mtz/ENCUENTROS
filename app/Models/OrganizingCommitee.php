<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizingCommitee extends Model
{
    use HasFactory;
    protected $table = 'organizingcommitee';

    protected $fillable = [
        'organizer_charge',
        'organizer_name',
        'organizer_title',
        'organizer_university',
        'organizer_description',
        'status',
        'registerBy',
    ];

    protected $guarded = [
        'status',
        'registerBy',
    ];
}
