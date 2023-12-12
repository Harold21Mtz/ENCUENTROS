<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    use HasFactory;
    protected $table = 'index';

    protected $fillable = [
        'description_one',
        'description_two',
        'ufpso_student',
        'ufpso_graduate',
        'external_professional',
        'oral_presenter',
        'description_three',
        'message',
        'status',
        'registerBy',
    ];

    protected $guarded = [
        'status',
        'registerBy',
    ];
}
