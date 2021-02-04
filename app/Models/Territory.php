<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Territory extends Model
{
    public $guarded = false;

    public $timestamps = false;

    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(Territory::class, 'territory_id');
    }

    public function children()
    {
        return $this->hasMany(Territory::class, 'territory_id');
    }

    public function getFullAddressAttribute()
    {
        if($this->level > 1) {
            return $this->parent->full_address . ' '. $this->type. '.' . $this->name;
        }
        return $this->name;
    }
}
