<?php

namespace App\Models;

use App\Models\Builders\RequestBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Request
 * @package App\Models
 */
class Request extends Model
{

    public $guarded = false;

    use HasFactory;
    // autoload user
    /**
     * @var string[]
     */
    protected $with = ['user'];

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return mixed
     */
    public function requests()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeWhereUserIsNotBanned($query)
    {
        return $query->whereHas('user', function ($user) {
            $user->where('status', User::STATUS_NOT_BANNED);
        });
    }

    public function scopeLatest($column = 'created_at')
    {
        return $this->orderBy($column, 'desc');
    }
}
