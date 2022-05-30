<?php

namespace App\Controllers;

use App\Models\Mhsmodel;

class Valid extends BaseController
{
    public function index()
    {
        $mhsmodel = new Mhsmodel();
        $data = [
            'title' => 'Masuk'
        ];
        return view('login\login', $data);
    }
    public function regist()
    {
        $mhsmodel = new Mhsmodel();
        $data = [
            'title' => 'Daftar'
        ];
        return view('login\regist', $data);
    }
}