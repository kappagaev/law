<?php

namespace App\Models\Builders;

use App\Models\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class RequestBuilder extends Builder
{
    /**
     * @return Request|\Illuminate\Database\Eloquent\Builder
     */
    public function whereUserIsNotBanned()
    {
        return $this->whereHas('user', function ($user) {
            $user->where('status', User::STATUS_NOT_BANNED);
        });
    }
}
