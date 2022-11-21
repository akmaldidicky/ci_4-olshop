<?php

namespace App\Models;

use CodeIgniter\Model;

class T_sales_model extends Model
{
    protected $table      = 't_sales';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode', 'tgl', 'cust_id', 'subtotal', 'diskon', 'ongkir', 'total_bayar'];

    public function getAll($kode = false)
    {
        if ($kode) {
            return $this->where('kode', $kode)->findAll();
        }

        return $this->findAll();
    }
}
