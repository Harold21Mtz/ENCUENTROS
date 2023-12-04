<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publishing extends Model
{
    use HasFactory;
    protected $table = 'publishings';

    protected $fillable = [
        'name_journal',
        'image_journal',
        'link_journal',
        'status',
        'registerBy',
    ];

    protected $guarded = [
        'status',
        'registerBy',
    ];
}
