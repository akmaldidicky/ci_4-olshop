<?php

namespace App\Models;

use CodeIgniter\Model;

class T_detail_model extends Model
{
    protected $table      = 't_sales';
    protected $primaryKey = 'sales_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['sales_kode', 'barang_id', 'harga_bandrol', 'qty', 'diskon_pct', 'diskon_nilai', 'harga_diskon', 'total'];

    public function getAll($kode = false)
    {
        if ($kode) {
            return $this->where('kode', $kode)->findAll();
        }

        return $this->findAll();
    }
    public function masukin($detail)
    {
        foreach ($detail as $s => $d) :
            $this->query("INSERT INTO t_sales_det (sales_kode,barang_id,harga_bandrol,qty,diskon_pct,diskon_nilai,harga_diskon,total) VALUES ('" . $d['sales_id'] . "','" . $d['barang_id'] . "','" . $d['harga_bandrol'] . "','" . $d['qty'] . "','" . $d['diskon_pct'] . "','" . $d['diskon_nilai'] . "','" . $d['harga_diskon'] . "','" . $d['total'] . "')");
        endforeach;
    }
}
