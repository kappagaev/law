<?php

namespace App\Http\Controllers;

class StaticPageController extends Controller
{
    public function about()
    {
        return view('static/about')->with('title', 'Про нас');
    }

    public function registration()
    {
        return view('static/registration')->with('title', 'Реєстрація');
    }

    public function rules()
    {
        return view('static/rules')->with('title', 'Правила');
    }

    public function donate()
    {
        return view('static/donate')->with('title', 'Підтримати проєкт');
    }
}
