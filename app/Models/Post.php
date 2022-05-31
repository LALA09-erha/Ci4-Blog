<?php

namespace App\Models;

use CodeIgniter\Model;

class Post extends Model
{
    protected $table      = 'post';
    protected $primaryKey = 'IDPOST';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['ID', 'judul', 'teks', 'date', 'post_status'];
}