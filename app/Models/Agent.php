<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\HasProfilePhoto;

class Agent extends Model
{
    use HasFactory;
    use HasProfilePhoto;

    protected $guarded = [];

    protected $appends = [
        'name'
    ];

    public function getNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }
}
