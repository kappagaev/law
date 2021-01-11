<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationType extends Model
{
    use HasFactory;

    public $guarded = false;

    public $timestamps = false;

    public function checkboxes()
    {
        return $this->hasMany(ViolationTypeCheckbox::class, 'violation_type_id');
    }

    public function sphere()
    {
        return $this->belongsTo(ViolationSphere::class, 'violation_sphere_id');
    }
}
