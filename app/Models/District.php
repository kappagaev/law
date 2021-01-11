<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public $guarded = false;

    public $timestamps = false;

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }
}
