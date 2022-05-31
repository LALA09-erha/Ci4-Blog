<?php

namespace App\Controllers;

use App\Models\Blog;

class Valid extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Masuk'
        ];
        return view('login\login', $data);
    }
    public function regist()
    {
        $data = [
            'title' => 'Daftar'
        ];
        return view('login\regist', $data);
    }
    public function daftaruser()
    {
        $blogModel = new Blog();
        #validation data input user
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'username' => 'required',
            'role' => 'required',
            'pass' => 'required|min_length[5]',

        ]);
        #jika ada kesalahan input data user maka akan dikembalikan ke halaman regist 
        if (!$validation->run($_POST)) {
            session()->setFlashdata('pesan', 'Diisi dengan benar,Pastikan password lebih dari 5 karakter');
            return redirect()->to(site_url("regist"));
        }
        $email = $this->request->getPost('email');
        $nama = $this->request->getPost('nama');
        #cek unik email dan username
        $cek = $blogModel->where('email', $email)->orWhere('username', $nama)->first();
        if ($cek) {
            session()->setFlashdata('pesan', 'Email atau Username sudah digunakan');
            return redirect()->to(site_url("regist"));
        } else {
            $data = [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('nama'),
                'role' => $this->request->getVar('role'),
                'pass' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ];
            $blogModel->insert($data);
            session()->setFlashdata('pesan', 'Berhasil Daftar');
            return redirect()->to(site_url("login"));
        }
    }
}