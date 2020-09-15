<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\HasProfilePhoto;

class Agent extends Model
{
    use HasFactory;
    use HasProfilePhoto;

    protected $guarded = [];

    protected $appends = [
        'name'
    ];

    protected static function boot()
    {
        parent::boot();

        Agent::saving(function ($model) {
            if ($model->profile_photo_path != $model->getOriginal('profile_photo_path')) {
                $imagePath = storage_path('app/public/' . $model->profile_photo_path);
                $img = \Image::make($imagePath);
                $img->resize(99, 128);
                $img->save($imagePath);
            }

            if ($model->verified != $model->getOriginal('verified')) {
                $model->verified_at = $model->verified === true ? now() : null;
            }
        });
    }

    public function scopeVerified($query)
    {
        return $query->where('verified', true);
    }

    public function getNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl()
    {
        return Storage::disk($this->profilePhotoDisk())->url('avatar.jpg');
    }
}
