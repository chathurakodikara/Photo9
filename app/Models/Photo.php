<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory, Multitenantable;

    protected $fillable = [
        'user_id',
        'description',
        'path',
        'image_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtFormatedAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    
}
