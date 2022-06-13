<?php

namespace App\Models;

use CodeIgniter\Model;


// untuk mengatur dan menghubungkan ke database dengan table pengguna
class BlogModel extends Model
{
    protected $table      = 'pengguna';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['email', 'username', 'role', 'pass'];
}