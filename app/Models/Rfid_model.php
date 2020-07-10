<?php

namespace App\Models;

use CodeIgniter\Model;

class Rfid_model extends Model
{
    protected $table = 'tb_rfid';
    protected $primaryKey = 'nis';
    protected $allowedFields = ['nis', 'uid', 'nama', 'date', 'time', 'status'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
