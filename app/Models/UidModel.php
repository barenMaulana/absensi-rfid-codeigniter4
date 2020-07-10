<?php

namespace App\Models;

use CodeIgniter\Model;

class UidModel extends Model
{
    protected $table = 'uid';
    protected $allowedFields = ['uid'];
    protected $builder;
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getData()
    {
        $this->builder->select('uid,nis,nama,unit_id');
        $this->builder->join('tb_user', 'tb_user.id = uid.id');
        return $this->builder->get()->getResultArray();
    }

    public function insertUsers($data)
    {
        $builder = $this->db->table('tb_users');
        $builder->insert($data);
    }
}
