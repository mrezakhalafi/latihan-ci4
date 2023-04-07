<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {

        $data['title'] = "Index";

        return view('pages/home', $data);
    }

    public function about()
    {

        $data['title'] = "About";

        return view('pages/home', $data);
    }
}
