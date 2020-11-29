<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{

// requests
// id
// title
// user_id
    use HasFactory;
    // autoload user
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requests()
    {
        return $this->belongsTo('App\Models\User');
    }

    protected $fillable = [
        'title'
    ];

//    // fetches Requests only where user status is not banned
//    public function scopeActive($query)
//    {
//        return $query->whereHas('user', function($q) {
//            $q->where('status', User::STATUS_NOT_BANNED);
//        });
//    }
}
