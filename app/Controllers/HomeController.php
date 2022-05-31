<?php

namespace App\Controllers;

use App\Models\PostModel;

class HomeController extends BaseController
{
    public function index()
    {
        $postingan = new PostModel();
        $data = [
            'title' => 'Blog PAW',
            'posts' => $postingan->findAll()
        ];
        return view('home/home', $data);
    }
}