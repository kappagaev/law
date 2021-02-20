<?php


namespace App\Services;


use App\Models\Request;
use App\Models\Territory;

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

    public function setTerritory($territories)
    {
        extract($territories);
        if (isset($territory3)) {
            $this->model->where('territory_id', $territory3);
        } else if (isset($territory2)) {

            $this->model->whereIn('territory_id', Territory::where('id', $territory2)->orWhere('territory_id', $territory2)->get()->pluck('id')->toArray());

        } else if (isset($territory1)) {

            $this->model->whereIn('territory_id', Territory::where('id', $territory1)->orWhere('territory_id', $territory1)->get()->pluck('id')->toArray());
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
            ->confirmed()
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
