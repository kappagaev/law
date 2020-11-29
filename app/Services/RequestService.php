<?php

namespace App\Services;

use App\Models\Request as RM;
use Illuminate\Support\Facades\Auth;

/**
 * Class RequestService
 * @package App\Services
 */
class RequestService
{
    /**
     * @param $data
     * @return RM
     */
    public function create($data)
    {
        $request = new RM($data);
        $request->save();
        return $request;
    }
}
