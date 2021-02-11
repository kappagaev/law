<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    const STATUS_NOT_BANNED = 1;
    const STATUS_BANNED = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
    public $guarded = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getInitialsAttribute()
    {
        return $this->surname . ' ' . mb_substr($this->name, 0, 1) . '.' . mb_substr($this->patronymic, 0, 1).'.';
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' '. $this->surname . ' ' . $this->patronymic;
    }

    public function territory()
    {
        return $this->belongsTo(Territory::class);
    }

    public function getFullAddressAttribute()
    {
        $fullAddress =  $this->territory->full_address . ' Вулиця ' . $this->street . ' Дім ' . $this->house ;
        if($this->flat) {
            $fullAddress .= ' Квартира ' . $this->flat;
        }
        return $fullAddress;
    }
}
