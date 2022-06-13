<?php

namespace App\Controllers;

use App\Models\PostModel;

class HomeController extends BaseController
{

    // untuk menampilkan halaman postingan untuk user pembaca
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM post join pengguna on post.ID = pengguna.ID where post.post_status = '1' ORDER by post.date desc");
        $postingan = $query->getResult();
        $data = [
            'title' => 'Blog PAW',
            'posts' => $postingan,
        ];
        if (session()->get('email') || session()->get('username')) {
            return view('home\home', $data);
        } else {
            return redirect()->to('login')->with('pesan', 'Anda harus login terlebih dahulu');
        }
    }


    // untuk menampilkan halaman detail postingan

    public function detail($slug)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM post join pengguna on post.ID = pengguna.ID where post.slug = '$slug'");
        $postingan = $query->getRow();
        if ($postingan == null) {
            return redirect()->to('/');
        }
        $data = [
            'title' => $postingan->judul,
            'post' => $postingan,
        ];
        if (session()->get('email') || session()->get('username')) {
            session()->setFlashdata('pesan', 'Selamat Membaca');
            return view('home\detail', $data);
        } else {
            return redirect()->to('login')->with('pesan', 'Anda harus login terlebih dahulu');
        }
    }
}