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
     * @param $data
     * @param $user_id
     * @param $checkboxes
     * @return RM
     */
    public function create($data, $user_id, $checkboxes)
    {
        $request = new RM($data);
        $request->user_id = $user_id;
        $request->save();
        $request->checkboxes()->attach($checkboxes);

        return $request;
    }


    /**
     *
     */
    public function withFiles()
    {

    }
}
