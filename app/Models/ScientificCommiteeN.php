<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificCommiteeN extends Model
{
    use HasFactory;
    protected $table = 'scientificcommiteen';

    protected $fillable = [
        'scientific_name',
        'scientific_title',
        'scientific_university',
        'scientific_description',
        'status',
        'registerBy',
    ];

    protected $guarded = [
        'status',
        'registerBy',
    ];
}
