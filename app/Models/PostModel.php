<?php

namespace App\Models;

use CodeIgniter\Model;


// untuk mengatur dan menghubungkan ke database dengan table post
class PostModel extends Model
{
    protected $table      = 'post';
    protected $primaryKey = 'IDPOST';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['ID', 'judul', 'slug', 'teks', 'date', 'post_status'];
}