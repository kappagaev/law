<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public $guarded = false;

    public $timestamps = false;

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
