<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang_model extends Model
{
    protected $table      = 'm_barang';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode', 'nama', 'harga'];

    public function getAll($kode = false)
    {
        if ($kode) {
            return $this->where('kode', $kode)->findAll();
        }

        return $this->findAll();
    }
}
