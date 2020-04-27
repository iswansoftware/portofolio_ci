<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_choose' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeShow($query)
    {
        return $query->where('is_choose', 1);
    }

    public function getImageLinkAttribute()
    {
        return asset('back/uploads/portofolio/' . $this->image);
    }
}
