<?php

namespace App\Controllers;

use App\Models\Customers_model;
use App\Models\Barang_model;
use App\Models\T_sales_model;
use App\Models\T_detail_model;



class Home extends BaseController
{
    protected $Customers_model;
    protected $barang;
    protected $tsales;
    protected $detail;
    public function __construct()
    {
        $this->Customers_model = new Customers_model();
        $this->barang = new Barang_model();
        $this->tsales = new T_sales_model();
        $this->detail = new T_detail_model();
    }
    public function index()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        $cart->insert(array(
            'rowid'      => 'sku_1234ABCD',
            'id'      => 'sku_1234ABCD',
            'qty'     => 0,
            'nama_cust'     => '',
            'kode_cust'     => '',
            'id_cust'     => '',
            'tgl_cust' => date('Y-m-d'),
            'telp_cust'     => '',
            'price'    => 0,
            'name'   => 0,
            'option'     => 0,
            'diskon'     => 0,
            'nilai_diskon'     => 0,
            'harga_diskon'     => 0,
            'total'     =>  0
        ));
        $cek = $cart->contents();
        // print_r($cek);
        $data = [
            'title' => 'Home'
        ];
        return view('home/index', $data);
    }
    public function daftar()
    {
        $db      = \Config\Database::connect();
        $query = $db->query('SELECT t_sales.kode as kode, m_customer.nama as nama, t_sales.created_at as tanggal, SUM(IF(t_sales_det.sales_kode=t_sales.kode,t_sales_det.qty,0)) as qty, subtotal, diskon, ongkir, total_bayar FROM t_sales JOIN m_customer ON m_customer.id = t_sales.cust_id JOIN t_sales_det ON t_sales_det.sales_kode=t_sales.kode GROUP BY kode;');
        $row = $query->getResultArray();
        $data = [
            'title' => 'Daftar',
            'item' => $row
        ];
        return view('home/daftar', $data);
    }
    public function transaksi()
    {
        $data = [
            'title' => 'Daftar',
            'customers' => $this->Customers_model->getAll(),
            'barang' => $this->barang->getAll()
        ];
        return view('home/coba2', $data);
    }
    public function coba()
    {
        $cart = \Config\Services::cart();
        // $cart->destroy();
        $key = $this->request->getVar('key');
        if ($key == true) {
            $cust_id = $this->request->getVar('cust_id');
            $nama_cust = $this->request->getVar('nama_cust');
            $kode_cust = $this->request->getVar('kode_cust');
            $telp_cust = $this->request->getVar('telp_cust');
            $tgl_transaksi = $this->request->getVar('tgl_transaksi');
            // -------------------------
            $id = $this->request->getVar('id');
            $kode = $this->request->getVar('kode');
            $nama = $this->request->getVar('nama');
            $harga = $this->request->getVar('harga');
            $diskon = $this->request->getVar('diskon');
            $nilai_diskon = ($harga * $diskon / 100);
            $harga_diskon = $harga - ($harga * $diskon / 100);
            $cart->insert(array(
                'id'      => $id,
                'qty'     => 1,
                'price'    => $harga,
                'name'   => $nama,
                'option'     => $kode,
                'diskon'     => $diskon,
                'nilai_diskon'     => $nilai_diskon,
                'harga_diskon'     => $harga_diskon,
                'total'     => $harga - $nilai_diskon

            ));
            // $cart = $cart->contents();
            // print_r($cart);
            // die;
        }
        $cart = $cart->contents();
        // print_r($cart);
        // die;
        $data = [
            'title' => 'Transaksi',
            'customers' => $this->Customers_model->getAll(),
            'barang' => $this->barang->getAll(),
            'cart' => $cart
        ];
        // print_r($cart);
        return view('home/coba', $data);
    }
    public function hapus($rowid = null)
    {
        $cart = \Config\Services::cart();
        if ($rowid) {
            $cart->remove($rowid);
            return  redirect()->to(base_url() . '/home/coba');
        }
    }

    public function update()
    {
        $cart = \Config\Services::cart();
        $rowid = $this->request->getVar('rowid');
        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('ubah_nama');
        $qty = $this->request->getVar('qty');
        $harga = $this->request->getVar('harga');
        $diskon = $this->request->getVar('ubah_diskon');
        $cart->update([
            'rowid'   => $rowid,
            'qty'     => $qty,
            'price'   => $harga,
            'name'    => $nama,
            'diskon'    => $diskon
        ]);
        // $cek = $cart->contents();
        // echo ($rowid);
        // echo "<br>";
        // print_r($cek);
        // die;
        return  redirect()->to(base_url() . '/home/coba');
    }
    public function update_cust()
    {
        $cart = \Config\Services::cart();
        $rowid2 = $this->request->getVar('rowid2');
        $nama = $this->request->getVar('nama_cust');
        $id = $this->request->getVar('id_cust');
        $kode = $this->request->getVar('kode_cust');
        $telp = $this->request->getVar('telp_cust2');
        $tgl = $this->request->getVar('tgl_transaksi');


        var_dump($telp);
        var_dump($nama);

        var_dump($tgl);
        // die;
        $cart->update([
            'rowid'      => '30ce2047fcb282227eaa8505f38b3ff4',
            'id'      => 'sku_1234ABCD',
            'nama_cust'     => $nama,
            'kode_cust'     => $kode,
            'id_cust'     => $id,
            'tgl_cust' => $tgl,
            'telp_cust' => $telp
        ]);
        // $cek = $cart->contents();
        // echo ($rowid);
        // echo "<br>";
        // print_r($cek);
        // die;
        sleep(1);
        return  redirect()->to(base_url() . '/home/coba');
    }
    public function save()
    {
        $cart = \Config\Services::cart();
        $db      = \Config\Database::connect();
        // ------------ code transaksi--------------
        $tahun =  date("Y", strtotime(date('Y')));
        $bulan =  date("m", strtotime(date('M')));

        $query = $db->query('SELECT * FROM t_sales');
        $row = $query->getNumRows();
        $rows = $row + 1;
        $no_item = str_pad($rows, 3, "0", STR_PAD_LEFT);
        $no_transaksi = $tahun . $bulan . '-' . $no_item;

        // --------------------- customer ----------------------------
        $kode_c = $this->request->getVar('kode_cc');
        $nama_c = $this->request->getVar('nama_cc');
        $telp = $this->request->getVar('telp_cc');
        $tgl = $this->request->getVar('tgl_tt');
        $cust_id = $this->request->getVar('id_cc');
        // var_dump($cust_id);
        // $cek = $cart->contents();
        // var_dump($cek);
        // die;

        // ---------------------------- transaksi ------------------------
        $kode_barang = $this->request->getVar('kode_t');
        $nama_t = $this->request->getVar('nama_t');
        $qty_t = $this->request->getVar('qty_t');
        $harga_barang = $this->request->getVar('harga_t');
        $diskon_t = $this->request->getVar('diskon_t');
        $nilai_diskon = $this->request->getVar('nilai_diskon');
        $harga_diskon_t = $this->request->getVar('harga_diskon_t');
        $total_t = $this->request->getVar('total_t');
        $x = 0;
        foreach ($kode_barang as $k => $v) :
            $detail[] = [
                'sales_id' => $no_transaksi,
                'barang_id' => $v,
                'harga_bandrol' => $harga_barang[$x],
                'qty' => $qty_t[$x],
                'diskon_pct' => $diskon_t[$x],
                'diskon_nilai' => $nilai_diskon[$x],
                'harga_diskon' => $harga_diskon_t[$x],
                'total' => $total_t[$x],
            ];

            $x++;
        endforeach;
        print_r($detail);
        // die;
        // foreach ($detail as $s => $d) :
        //     $this->$db->query("INSERT INTO t_sales_det (sales_kode,barang_id,harga_bandrol,qty,diskon_pct,diskon_nilai,harga_diskon,total) VALUES ('" . $d['sales_id'] . "','" . $d['barang_id'] . "','" . $d['harga_bandrol'] . "','" . $d['qty'] . "','" . $d['diskon_pct'] . "','" . $d['diskon_nilai'] . "','" . $d['harga_diskon'] . "','" . $d['total'] . "')");
        // endforeach;


        $this->detail->masukin($detail);
        // -------------------------------
        $subtotal = $this->request->getVar('subtotal');
        $diskon_2 = $this->request->getVar('diskon_2');
        $ongkir = $this->request->getVar('ongkir');
        $total_bayar     = $this->request->getVar('total_bayar');

        $tsales = [
            'kode' => $no_transaksi,
            'tgl' => $tgl,
            'cust_id' => $cust_id,
            'subtotal' => $subtotal,
            'diskon' => $diskon_2,
            'ongkir' => $ongkir,
            'total_bayar' => $total_bayar
        ];

        $this->tsales->insert($tsales);


        return  redirect()->to(base_url() . '/home');
    }
}
