<?php

namespace App\Models;

use CodeIgniter\Model;

class Blog extends Model
{
    protected $table      = 'pengguna';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['email', 'username', 'role', 'pass'];
}