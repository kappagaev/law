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
    public function violationType()
    {
        return $this->belongsTo(ViolationType::class);
    }

    public function violationSphere()
    {
        return $this->belongsTo(ViolationSphere::class);
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

    public function checkboxes()
    {
        return $this->belongsToMany(ViolationTypeCheckbox::class, 'checkbox_request', 'request_id', 'violation_type_checkbox_id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function settlement()
    {
        return $this->belongsTo(Settlement::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function getFullAddressAttribute()
    {

        return $this->region->name . " область "
            . $this->district->name . " район "
            . $this->settlement->name . " "
            . $this->place_address;
    }
}
