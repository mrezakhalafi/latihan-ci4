<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HewanModel;

class Hewan extends BaseController
{

    protected $hewan;

    public function __construct()
    {

        $this->hewan = new HewanModel();
    }

    public function index()
    {

        // d($this->request->getVar('keyword'));

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $hewan = $this->hewan->search($keyword);
            // dd($hewan);
        } else {
            $hewan = $this->hewan->getHewan();
        }

        $currentPage = $this->request->getVar('page_hewan') ? $this->request->getVar('page_hewan') : '1';

        $data = [
            'title' => 'List Hewan',
            // 'hewan' => $hewan
            'hewan' => $hewan,
            'pager' => $this->hewan->pager,
            'currentPage' => $currentPage
        ];

        return view('/hewan/index', $data);
    }
}
