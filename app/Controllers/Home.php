<?php

namespace App\Controllers;

use App\Models\Mhsmodel;

class Home extends BaseController
{
    public function index()
    {
        $mhsmodel = new Mhsmodel();
        $data = [
            'title' => 'Tampil Data',
            'mhs' => $mhsmodel->findAll()
        ];
        return view('home', $data);
    }
}