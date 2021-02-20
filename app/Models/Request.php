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
    /** @const */
    public static $files = [
        'photocopy',
        'audio',
        'video',
        'reg_photocopy',
        'witness_reg_photo'
    ];
    protected $casts = [
        'photocopy' => 'array',
        'audio' => 'array',
        'video' => 'array',
        'reg_photocopy' => 'array',
        'witness_reg_photo' => 'array',
    ];

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

    public function scopeConfirmed($query)
    {
        return $query->where('status', 1);
    }

    public function checkboxes()
    {
        return $this->belongsToMany(ViolationTypeCheckbox::class, 'checkbox_request', 'request_id', 'violation_type_checkbox_id');
    }

    public function territory()
    {
        return $this->belongsTo(Territory::class);
    }

    public function getFullAddressAttribute()
    {

        return $this->territory->full_address .' '. $this->place_address;
    }

    public function getAllFilesPathsAttribute()
    {
        $paths = [];
        foreach (self::$files as $file) {
            if($this->$file != null) {
                foreach ($this->$file as $modelFile) {
                    $paths[] = $file . '/' . $modelFile;
                }
            }

        }
        return $paths;
    }
    public function getAllFilesAttribute()
    {
        $files = [];
        foreach (self::$files as $file) {

            if($this->$file != null) {
                $files[$file] = implode(', ', $this->$file);
            }

        }
        return $files;
    }
}
