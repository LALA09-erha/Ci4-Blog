<?php

namespace App\Controllers;

// Mengambil data dari model
use App\Models\BlogModel;
use App\Models\PostModel;

class AdminController extends BaseController
{

    // Untuk Menampilkan Halaman Dashboard Admin
    public function index()
    {
        $users = new BlogModel();
        $data = [
            'title' => 'Blog PAW',
            'users' => $users->findAll(),
        ];
        if (session()->get('role') == 'Admin') {
            return view('home\users', $data);
        } else {
            return redirect()->to('login')->with('pesan', 'Anda harus login terlebih dahulu');
        }
    }


    // Untuk Menampilkan Halaman Update data user
    public function update($id)
    {
        $users = new BlogModel();
        $user = $users->find($id);
        if ($user == null) {
            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'Update User',
            'user' => $users->find($id),
        ];
        if (session()->get('role') == 'Admin') {
            return view('home\update', $data);
        } else {
            return redirect()->to('login')->with('pesan', 'Anda harus login terlebih dahulu');
        }
    }

    // Untuk memproses data update user
    public function updateuser()
    {
        $users = new BlogModel();
        $data = [
            'username' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
        ];
        $cek = $users->find($this->request->getPost('id'));
        if ($cek['role'] != $this->request->getPost('role')) {
            $users->update($this->request->getPost('id'), $data);
            return redirect()->to('/users')->with('pesan', 'Data berhasil diubah');
        } else {
            return redirect()->to('/users')->with('pesan', 'Data tidak berubah');
        }
    }

    // untuk memproses data delete user
    public function delete($id)
    {
        $users = new BlogModel();
        $post = new PostModel();
        $user = $users->find($id);
        if ($user == null) {
            return redirect()->to('/admin');
        }

        // cari post berdasarkan id user
        $cek = $post->where('ID', $id)->findAll();
        if (empty($cek)) {
            $users->delete($id);
            return redirect()->to('/users')->with('pesan', 'Data berhasil dihapus');
        } else {
            return redirect()->to('/users')->with('pesan', 'Data gagal dihapus,User ini memiliki post');
        }
    }
}