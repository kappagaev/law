<?php

namespace App\Services;

use App\Models\Request;
use App\Models\Request as RM;
use Illuminate\Support\Facades\Auth;

/**
 * Class RequestService
 * @package App\Services
 */
class RequestService
{
    /**
     * @var RM
     */
    private $model;

    /**
     * RequestService constructor.
     */
    public function __construct()
    {
        $this->model = new RM();
    }

    /**
     * @param $data
     * @return RequestService
     */
    public function create($data)
    {
        $request = new RM($data);
        $this->model = $request;
        return $this;
    }


    /**
     *
     */
    public function withFiles()
    {

    }
}
