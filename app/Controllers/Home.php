<?php

namespace App\Controllers;

use App\Models\Post;

class Home extends BaseController
{
    public function index()
    {
        $postingan = new Post();
        $data = [
            'title' => 'Blog PAW',
            'posts' => $postingan->findAll()
        ];
        return view('home/home', $data);
    }
}