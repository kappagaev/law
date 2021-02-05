<?php


namespace App\Services;


use App\Models\Request;

class RequestSearchService
{
    private $model;

    public function __construct()
    {
        $this->model = Request::whereUserIsNotBanned();
    }

    public function setValues(array $array)
    {
        foreach ($array as $key => $value) {
            if($value == null) {
                continue;
            }
            $this->setValue($key, $value);
        }
        return $this;
    }

    public function setValue($key, $value)
    {
        $this->model->where($key , $value);
        return $this;
    }

    public function get()
    {
        return $this->model
            ->latest()
            ->where('status', 1)
            ->paginate(16);
    }

    public function setTimestamps(array $array)
    {
        foreach ($array as $key => $value) {
            if($value == null) {
                continue;
            }
            $this->model->whereDate($key, '=' , $value);
        }
        return $this;
    }
}
