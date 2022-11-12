<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    protected $fillable = [
        'name',
        'date',
        'short_description',
        'detailed_description',
        'file_image',
        'type_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
