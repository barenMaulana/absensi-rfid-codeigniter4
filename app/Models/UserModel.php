<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_users';
    protected $primaryKey = 'uid';
    protected $allowedFields = ['nis', 'uid', 'nama', 'unit_id', 'status'];
    protected $useTimestamps = true;
}
