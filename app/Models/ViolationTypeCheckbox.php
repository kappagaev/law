<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationTypeCheckbox extends Model
{
    use HasFactory;

    public $guarded = false;

    public $timestamps = false;

    public function violationType()
    {
        return $this->belongsTo(ViolationType::class, 'violation_type_id');
    }
}
