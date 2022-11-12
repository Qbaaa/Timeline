<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Process extends Model {

    protected $fillable = [
        'name',
        'date_start',
        'date_end',
        'short_description',
        'detailed_description',
        'file_image',
    ];

    protected $hidden = ['created_at', 'updated_at'];

}
