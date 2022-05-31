<?php

namespace App\Controllers;

use App\Models\BlogModel;

class ValidController extends BaseController
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
        $blogModel = new BlogModel();


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