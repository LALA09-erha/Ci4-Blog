<?php

namespace App\Controllers;

use App\Models\PostModel;

class PostController extends BaseController
{
    public function index()
    {
        #jika tidak ada session maka redirect ke halaman login
        if (!session()->get('email') || !session()->get('username')) {
            return redirect()->to('login')->with('pesan', 'Anda harus login terlebih dahulu');
        }
        $db      = \Config\Database::connect();
        $builder = $db->table('post');
        $query = session()->get('role') == 'Admin' ? $builder->join('pengguna', 'pengguna.ID = post.ID')->orderBy('date', 'desc')->get() : $builder->join('pengguna', 'pengguna.ID = post.ID')->where('post.ID', session()->get('id'))->orderBy('date', 'desc')->get();
        // $query = $builder->join('pengguna', 'pengguna.ID = post.ID')->where('post.ID', session()->get('id'))->get();
        $data = [
            'title' => 'Postingan',
            'posts' => $query->getResult(),
        ];
        return view('home\post', $data);
    }

    public function tambah()
    {
        if (!session()->get('email') || !session()->get('username')) {
            return redirect()->to('login')->with('pesan', 'Anda harus login terlebih dahulu');
        }

        $data = [
            'title' => 'Tulis Postingan',
        ];
        return view('home\tambah', $data);
    }

    public function prosespost()
    {
        $blogModel = new PostModel();
        $judul = $this->request->getVar('judul');
        $slug = url_title($judul, '-', true);
        #cek slug sudah ada atau belum di database 
        $cek = $blogModel->where('slug', $slug)->first();
        if ($cek) {
            $slug = $slug . '-' . time();
        }
        $data = [
            'judul' => $this->request->getVar('judul'),
            'teks' => $this->request->getVar('body'),
            'post_status' => $this->request->getVar('status'),
            'slug' => $slug,
            'date' => date('Y-m-d H:i:s'),
            'ID' => session()->get('id')
        ];
        $blogModel->insert($data);
        session()->setFlashdata('pesan', 'Postingan berhasil ditambahkan');
        return redirect()->to('/post');
    }

    public function edit($slug)
    {
        if (!session()->get('email') || !session()->get('username')) {
            return redirect()->to('login')->with('pesan', 'Anda harus login terlebih dahulu');
        }
        $blogModel = new PostModel();
        $query = $blogModel->where('slug', $slug)->first();
        if ($query == null) {
            return redirect()->to('/');
        }
        if ($query['ID'] != session()->get('id') && session()->get('role') != 'Admin') {
            return redirect()->to('/post')->with('pesan', 'Anda tidak memiliki akses');
        }
        $data = [
            'title' => 'Edit Postingan',
            'post' => $query,
        ];
        session()->setFlashdata('pesan', $query['judul']);
        return view('home\edit', $data);
    }

    public function editpost()
    {


        $blogModel = new PostModel();
        $idpost = intval($this->request->getVar('idpost'));
        $cek = $blogModel->where('IDPOST', $idpost)->first();
        if ($cek['judul'] == $this->request->getvar('judul') && $cek['teks'] == $this->request->getvar('teks') && $cek['post_status'] == $this->request->getvar('status')) {
            return redirect()->to('/post')->with('pesan', 'Tidak ada perubahan');
        }
        $data = [
            'IDPOST' => $idpost,
            'ID' => $cek['ID'],
            'judul' => $this->request->getVar('judul'),
            'slugh' => $cek['slug'],
            'teks' => $this->request->getVar('teks'),
            'date' => $cek['date'],
            'post_status' => $this->request->getVar('status'),
        ];
        #update data di database 
        $blogModel->save($data);
        session()->setFlashdata('pesan', 'Postingan berhasil diubah');
        return redirect()->to('/post');
    }

    public function hapus($id)
    {
        if (!session()->get('email') || !session()->get('username')) {
            return redirect()->to('login')->with('pesan', 'Anda harus login terlebih dahulu');
        }
        $blogModel = new PostModel();
        $query = $blogModel->where('IDPOST', $id)->first();
        if ($query == null) {
            return redirect()->to('/');
        }
        if ($query['ID'] != session()->get('id') && session()->get('role') != 'Admin') {
            return redirect()->to('/post')->with('pesan', 'Anda tidak memiliki akses');
        }
        $blogModel->delete($id);
        session()->setFlashdata('pesan', 'Postingan berhasil dihapus');
        return redirect()->to('/post');
    }
}