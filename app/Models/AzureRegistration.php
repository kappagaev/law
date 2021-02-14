<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AzureRegistration extends Model
{
    use HasFactory;

    public $guarded = false;

    function getUserAttributes(): array
    {
        return $this->only(['email', 'socialite_id']);
    }
}
