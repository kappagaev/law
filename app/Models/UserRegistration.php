<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRegistration extends Model
{
    public $guarded = false;

    use HasFactory;

    function getUserAttributes(): array
    {
        return $this->only(['name', 'surname', 'patronymic', 'email', 'kmamail', 'university_role_id', 'is_naukma']);
    }

    function universityRole()
    {
        return $this->belongsTo(UniversityRole::class);
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
        $fullAddress = '';

        return $this->territory->full_address ;

    }
}
