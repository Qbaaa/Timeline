<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model{

    protected $fillable = [
        'name',
        'color',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

}
