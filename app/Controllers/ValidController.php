<?php

namespace App\Controllers;

use App\Models\BlogModel;

class ValidController extends BaseController
{

    // untuk menampilkan halaman login
    public function index()
    {
        $data = [
            'title' => 'Masuk'
        ];
        return view('login\login', $data);
    }

    // untuk menampilkan halamanan register
    public function regist()
    {
        $data = [
            'title' => 'Daftar'
        ];
        return view('login\regist', $data);
    }

    // untuk memproses data register
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

    // untuk memproses data login

    public function loginuser()
    {
        $blogModel = new BlogModel();
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');
        $cek = $blogModel->where('email', $email)->first();
        // dd($cek);
        if ($cek) {
            if (password_verify($pass, $cek['pass'])) {
                $data = [
                    'email' => $cek['email'],
                    'username' => $cek['username'],
                    'role' => $cek['role'],
                    'id' => $cek['ID'],
                ];

                session()->setFlashdata('pesan', 'Login Berhasil');
                session()->set($data);
                return redirect()->to('/');
            } else {
                session()->setFlashdata('pesan', 'Login Gagal');
                return redirect()->to(site_url("login"));
            }
        } else {
            session()->setFlashdata('pesan', 'Login Gagal');
            return redirect()->to(site_url("login"));
        }
    }

    // untuk memproses logout
    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('pesan', 'Logout Berhasil');
        return redirect()->to('/login');
    }
}