<?php

namespace App\Controllers;

class Homepage extends BaseController
{
    public function index($nama = '', $umur = '')
    {
        // return view('index');
        return "Hello, my name is " . $nama . ' and my age is ' . $umur;
    }

    public function add($nama = '', $umur = '')
    {

        return "Helloadddddd , my name is " . $nama . ' and my age is ' . $umur;
    }
}
