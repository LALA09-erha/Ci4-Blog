<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'post';
    protected $primaryKey = 'IDPOST';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['ID', 'judul', 'slug', 'teks', 'date', 'post_status'];
}