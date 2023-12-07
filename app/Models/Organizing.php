<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizing extends Model
{
    use HasFactory;
    protected $table = 'organizing';

    protected $fillable = [
        'organizing_name',
        'organizing_image',
        'status',
        'registerBy',
    ];

    protected $guarded = [
        'status',
        'registerBy',
    ];
}
