<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    public $guarded = false;

    public $timestamps = false;

    public function disctrict()
    {
        return $this->belongsTo(District::class);
    }
}
