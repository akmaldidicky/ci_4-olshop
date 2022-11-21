<?php

namespace App\Models;

use CodeIgniter\Model;

class Customers_model extends Model
{
    protected $table      = 'm_customer';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode', 'nama', 'telp'];

    public function getAll($kode = false)
    {
        if ($kode) {
            return $this->where('kode', $kode)->findAll();
        }

        return $this->findAll();
    }
}
