<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    /**
     * Admin panel
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View|Response
     */
    public function index()
    {
        $users = User::with('role')
            ->paginate(32);
        return view('admin/panel')->with('users', $users)->with('title', 'Адмінка');
    }


    public function requests()
    {
        $requests = Request::with(['violationType', 'violationSphere', 'user', 'district', 'region','settlement'])
            ->paginate(32);
        return view('admin/requests')->with('requests', $requests)->with('title', 'Адмінка');
    }
}
