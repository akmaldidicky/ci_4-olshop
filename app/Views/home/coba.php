<?= $this->extend('layout/tamplate'); ?>
<?= $this->section('content'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<div class="container">
    <div class="item1">
        <h1>TRANSAKSI</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-2 .ms-auto col-sm-3">
                <!-- <table class="table table-bordered border">
                        <thead>
                            <tr>
                                <th colspan="2">Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <th><label for="kode_t">No</label></th>
                                <td><input type="text" class="form-control" name="kode_t" id="kode_t" readonly placeholder="auto generate"></td>

                            </tr>
                            <tr>
                                <th scope="row"><label for="tgl_t">Tanggal</label></th>
                                <td scope="row"><input type="date" class="form-control" name="tgl_t" id="tgl_t"></td>


                            </tr>
                        </tbody>
                    </table> -->
                <?php foreach ($cart as $ct) :
                    if ($ct['id'] != 'sku_1234ABCD') {
                        break;
                    } ?>
                    <button class="btn btn-secondary tombol-custumer" data-bs-toggle="modal" id="tombol_customer" data-bs-target="#staticBackdrop" data-rowid2="<?= $ct['rowid']; ?>">Pilih Customer </button>
                    <div id="customer">
                        <table class="table table-bordered border">
                            <thead>
                                <tr>
                                    <th colspan="2">Customer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <th><label for="kode_c">Kode</label></th>
                                    <td><input type="text" class="form-control" name="kode_c" id="kode_c" value="<?= $ct['kode_cust']; ?>" readonly></td>

                                </tr>
                                <tr>
                                    <th scope="row"><label for="nama_c">Nama</label></th>
                                    <td scope="row"><input type="text" class="form-control" name="nama_c" id="nama_c" value="<?= $ct['nama_cust']; ?>" readonly></td>


                                </tr>
                                <tr>
                                    <th scope=" row"><label for="telp">Telp</label></th>
                                    <td scope="row"><input type="text" class="form-control" name="telp" id="telp" value="<?= $ct['telp_cust']; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="tgl_t">Tanggal</label></th>
                                    <td scope="row"><input type="date" class="form-control" name="tgl_t" id="tgl_t" value="<?= $ct['tgl_cust']; ?>" readonly></td>
                                </tr>
                                <input type="hidden" id="id_c" name="id_c" value="<?= $ct['id_cust']; ?>">
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-end">
                        <a href="/"><button class="btn btn-danger">Batalkan Transaksi</button></a>
                    </div>
                    <div class="col justify-content-end">
                        <p></p>
                    </div>
                    <div class="row justify-content-end">
                        <button type="submit" class="btn btn-primary" id="save" style="width: 500px;" data-bs-toggle="modal" id="tombol_barang" data-bs-target="#modal_kirim">Simpan Transaksi</button>
                    </div>

            </div>
            <div class="col-md-8 ms-auto">
                <table class="table table-bordered border">
                    <thead>
                        <tr>
                            <th class="tabel_t" style="background-color: lightblue;" rowspan="2" colspan="2"><button class="btn btn-success" data-bs-toggle="modal" id="tombol_barang" data-bs-target="#modal_tambah_b">Tambah</button></th>
                            <th class="tabel_t" style="background-color: lightblue;" rowspan="2">No</th>
                            <th class="tabel_t" style="background-color: lightblue;" rowspan="2">Kode Barang</th>
                            <th class="tabel_t" style="background-color: lightblue;" rowspan="2">Nama Barang</th>
                            <th class="tabel_t" style="background-color: lightblue;" rowspan="2">Qty</th>
                            <th class="tabel_t" style="background-color: lightblue;" rowspan="2">Harga Bandrol</th>
                            <th class="tabel_t" style="background-color: lightblue;" colspan="2">Diskon</th>
                            <th class="tabel_t" style="background-color: lightblue;" rowspan="2">Harga Diskon</th>
                            <th class="tabel_t" style="background-color: lightblue;" rowspan="2">Total</th>
                        </tr>
                        <tr>

                            <th class="tabel_t" style="background-color: lightblue;">(%)</th>
                            <th class="tabel_t" style="background-color: lightblue;">(Rp)</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php $x = 1;
                        $z = 0;
                        foreach ($cart as $ct) :
                            if ($ct['price'] > 0) {
                                # code...
                        ?>
                                <tr>
                                    <td><button class="btn btn-warning ubah" data-bs-toggle="modal" id="ubah_barang" data-bs-target="#modal_ubah" data-id="<?= $ct['id'] ?>" data-rowid="<?= $ct['rowid'] ?>" data-nama="<?= $ct['name'] ?>" data-qty="<?= $ct['qty'] ?>" data-harga="<?= $ct['price'] ?>" data-diskon="<?= $ct['diskon'] ?>">Ubah</button></td>
                                    <td><a href="hapus/<?= $ct['rowid'] ?>"><button class="btn btn-danger">Hapus</button></td></a>
                                    <td><?= $x ?></td>
                                    <td><input type="hidden" name="kode_t[]" id="" value="<?= $ct['option'] ?>"><?= $ct['option'] ?></td>
                                    <td><input type="hidden" name="nama_t[]" id="" value="<?= $ct['name'] ?>"><?= $ct['name'] ?></td>
                                    <td><input type="hidden" name="qty_t[]" value="<?= $ct['qty'] ?>"> <?= $ct['qty'] ?></td>
                                    <td><input type="hidden" name="harga_t[]" id="" value="<?= $ct['price'] ?>"><?= number_format($ct['price'], 2, ',', '.')  ?></td>
                                    <td><input type="hidden" name="diskon_t[]" id="" value="<?= $ct['diskon'] ?>"><?= $ct['diskon'] ?></td>
                                    <td><input type="hidden" name="nilai_diskon[]" id="" value="<?= $ct['price'] * $ct['diskon'] / 100; ?>"><?= number_format($ct['price'] * $ct['diskon'] / 100, 2, ',', '.') ?></td>
                                    <td><input type="hidden" name="harga_diskon_t[]" id="" value="<?= $ct['price'] - ($ct['price'] * $ct['diskon'] / 100) ?>"><?= number_format($ct['price'] - ($ct['price'] * $ct['diskon'] / 100), 2, ',', '.') ?></td>
                                    <td><input type="hidden" name="total_t[]" id="" value="<?= ($ct['price'] - ($ct['price'] * $ct['diskon'] / 100)) * $ct['qty'] ?>"><?= number_format(($ct['price'] - ($ct['price'] * $ct['diskon'] / 100)) * $ct['qty'], 2, ',', '.') ?></td>
                                </tr>
                        <?php $total = ($ct['price'] - ($ct['price'] * $ct['diskon'] / 100)) * $ct['qty'];
                                $subtotal = $z + $total;
                                $z = $subtotal;
                                $x++;
                            }
                        endforeach; ?>
                    </tbody>
                </table>
                <div class="row justify-content-end">
                    <div class="col-md-4">
                        <table class="table_subtotal" id="subtotal_tabel">

                            <tr>
                                <th scope="col">Sub total</th>
                                <td><input class="form-control" type="text" name="subtotal" id="subtotal" width="80px" value="<?= $z; ?>" readonly></td>
                            </tr>
                            <tr>
                                <th scope="col">Diskon</th>
                                <td><input class="form-control" min="0" max="100" type="number" name="diskon_2" id="diskon_2" width="80px" placeholder="Masukan Diskon(%)"></td>
                            </tr>
                            <tr>
                                <th scope="col">Ongkir</th>
                                <td><input placeholder="Masukan Harga Ongkir" class="form-control" min="0" type="number" name="ongkir" id="ongkir" width="80px"></td>
                            </tr>
                            <tr>
                                <th scope="col">Total Bayar</th>
                                <td><input class="form-control" type="number" name="total_bayar" id="total_bayar" width="80px" readonly></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>





<!-- Modal Customer -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Customer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered border">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Telp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x = 1;
                        foreach ($customers as $c) : ?>
                            <form action="/home/update_cust" method="post">

                                <tr>
                                    <th scope="row"><?= $x; ?></th>
                                    <td><input type="hidden" name="kode_cust" id="" value="<?= $c['kode']; ?>"><?= $c['kode']; ?></td>
                                    <td><input type="hidden" name="nama_cust" id="" value="<?= $c['nama']; ?>"><?= $c['nama']; ?></td>
                                    <td><input type="hidden" name="telp_cust2" id="" value="<?= $c['telp']; ?>"><?= $c['telp']; ?></td>
                                    <td> <button class="btn btn-success btn-xs btn-pilih tombol-pilih" type="submit"><i class="fa fa-check"> </i>
                                        </button></td>
                                    </td>
                                    <td><input type="date" name="tgl_transaksi" class="form-control" value="" width="10px"></td>

                                </tr>
                                <input type="hidden" name="id_cust" id="" value="<?= $c['id']; ?>">
                            </form>
                        <?php $x++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" id="tutup_modal" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_tambah_b" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_tambah_bLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_tambah_bLabel">Pilihan Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered border">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x = 1;
                        foreach ($barang as $b) : ?>
                            <form action="/home/coba" method="post">
                                <tr>
                                    <th scope="row"><?= $x; ?></th>
                                    <td><input type="hidden" name="kode" value="<?= $b['kode']; ?>"><?= $b['kode']; ?></td>
                                    <td><input type="hidden" name="nama" value="<?= $b['nama']; ?>" id=""><?= $b['nama']; ?></td>
                                    <td><input type="hidden" name="harga" value="<?= $b['harga']; ?>" id=""><?= $b['harga']; ?></td>
                                    <td> <button type="submit" class="btn btn-success btn-xs btn-pilih" id="pilihbarang" data-id="<?= $b['id']; ?>" data-kode="<?= $b['kode']; ?>" data-nama="<?= $b['nama']; ?>" data-harga="<?= $b['harga']; ?>"><i class="fa fa-check"> </i>
                                            Pilih
                                        </button></td>
                                    </td>
                                    <input type="hidden" name="id" id="" value="<?= $b['id']; ?>">
                                    <input type="hidden" name="diskon" id="" value="0">
                                    <input type="hidden" name="key" id="" value="true">
                                </tr>
                            </form>
                        <?php $x++;
                        endforeach; ?>
                        <!-- <input type="text" name="nama_cust" id="nama_cust" value="">
                            <input type="text" name="cust_id" id="cust_id" value="">
                            <input type="text" name="kode_cust" id="kode_cust" value="">
                            <input type="text" name="telp_cust" id="telp_cust" value="">
                            <input type="text" name="tgl_transaksi" id="tgl_transaksi" value=""> -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="tutup_modal_barang" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_ubah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_ubahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_ubahLabel">Ubah Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/home/update" method="post">
                    <table class="table" border="0">

                        <tr>
                            <th scope="col">Nama</th>
                            <td><input class="form-control" type="text" name="ubah_nama" id="nama" width="80px" readonly></td>
                        </tr>
                        <tr>
                            <th scope="col">Qty</th>
                            <td><input class="form-control" type="number" name="qty" id="qty" width="80px" value=""></td>
                        </tr>
                        <tr>
                            <th scope="col">Harga</th>
                            <td><input class="form-control" type="number" name="harga" id="harga" width="80px" readonly></td>
                        </tr>
                        <tr>
                            <th scope="col">Diskon</th>
                            <td><input class="form-control" type="number" name="ubah_diskon" id="diskon" width="80px" value=""> </td>
                            <input type="hidden" name="rowid" id="rowid" value="">
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-xs btn-pilih"><i class="fa fa-check"> </i>
                    Simpan
                </button>
                </form>
                <button type="button" class="btn btn-secondary" id="tutup_modal_ubah" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Kirim Data -->
<div class="modal fade" id="modal_kirim" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_ubahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_ubahLabel">Ubah Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Simpan?</h3>
                <form action="/home/save" method="post">
                    <table class="table table-bordered border invisible">
                        <thead>
                            <tr>
                                <th class="tabel_t" style="background-color: lightblue;" rowspan="2" colspan="2"><button class="btn btn-success" data-bs-toggle="modal" id="tombol_barang" data-bs-target="#modal_tambah_b">Tambah</button></th>
                                <th class="tabel_t" style="background-color: lightblue;" rowspan="2">No</th>
                                <th class="tabel_t" style="background-color: lightblue;" rowspan="2">Kode Barang</th>
                                <th class="tabel_t" style="background-color: lightblue;" rowspan="2">Nama Barang</th>
                                <th class="tabel_t" style="background-color: lightblue;" rowspan="2">Qty</th>
                                <th class="tabel_t" style="background-color: lightblue;" rowspan="2">Harga Bandrol</th>
                                <th class="tabel_t" style="background-color: lightblue;" colspan="2">Diskon</th>
                                <th class="tabel_t" style="background-color: lightblue;" rowspan="2">Harga Diskon</th>
                                <th class="tabel_t" style="background-color: lightblue;" rowspan="2">Total</th>
                            </tr>
                            <tr>

                                <th class="tabel_t" style="background-color: lightblue;">(%)</th>
                                <th class="tabel_t" style="background-color: lightblue;">(Rp)</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php $x = 1;
                            $z = 0;
                            foreach ($cart as $ct) :
                                if ($ct['price'] > 0) {
                                    # code...
                            ?>
                                    <tr>
                                        <td><button class="btn btn-warning ubah" data-bs-toggle="modal" id="ubah_barang" data-bs-target="#modal_ubah" data-id="<?= $ct['id'] ?>" data-rowid="<?= $ct['rowid'] ?>" data-nama="<?= $ct['name'] ?>" data-qty="<?= $ct['qty'] ?>" data-harga="<?= $ct['price'] ?>" data-diskon="<?= $ct['diskon'] ?>">Ubah</button></td>
                                        <td><a href="hapus/<?= $ct['rowid'] ?>"><button class="btn btn-danger">Hapus</button></td></a>
                                        <td><?= $x ?></td>
                                        <td><input type="hidden" name="kode_t[]" id="" value="<?= $ct['option'] ?>"><?= $ct['option'] ?></td>
                                        <td><input type="hidden" name="nama_t[]" id="" value="<?= $ct['name'] ?>"><?= $ct['name'] ?></td>
                                        <td><input type="hidden" name="qty_t[]" value="<?= $ct['qty'] ?>"> <?= $ct['qty'] ?></td>
                                        <td><input type="hidden" name="harga_t[]" id="" value="<?= $ct['price'] ?>"><?= number_format($ct['price'], 2, ',', '.')  ?></td>
                                        <td><input type="hidden" name="diskon_t[]" id="" value="<?= $ct['diskon'] ?>"><?= $ct['diskon'] ?></td>
                                        <td><input type="hidden" name="nilai_diskon[]" id="" value="<?= $ct['price'] * $ct['diskon'] / 100; ?>"><?= number_format($ct['price'] * $ct['diskon'] / 100, 2, ',', '.') ?></td>
                                        <td><input type="hidden" name="harga_diskon_t[]" id="" value="<?= $ct['price'] - ($ct['price'] * $ct['diskon'] / 100) ?>"><?= number_format($ct['price'] - ($ct['price'] * $ct['diskon'] / 100), 2, ',', '.') ?></td>
                                        <td><input type="hidden" name="total_t[]" id="" value="<?= ($ct['price'] - ($ct['price'] * $ct['diskon'] / 100)) * $ct['qty'] ?>"><?= number_format(($ct['price'] - ($ct['price'] * $ct['diskon'] / 100)) * $ct['qty'], 2, ',', '.') ?></td>
                                    </tr>
                            <?php $total = ($ct['price'] - ($ct['price'] * $ct['diskon'] / 100)) * $ct['qty'];
                                    $subtotal = $z + $total;
                                    $z = $subtotal;
                                    $x++;
                                }
                            endforeach; ?>
                        </tbody>
                    </table>
                    <table class="table table-bordered border invisible">
                        <thead>
                            <tr>
                                <th colspan="2">Customer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <th><label for="kode_cc">Kode</label></th>
                                <td><input type="text" class="form-control" name="kode_cc" id="kode_cc" value="" readonly></td>

                            </tr>
                            <tr>
                                <th scope="row"><label for="nama_cc">Nama</label></th>
                                <td scope="row"><input type="text" class="form-control" name="nama_cc" id="nama_cc" value="" readonly></td>


                            </tr>
                            <tr>
                                <th scope=" row"><label for="telp_cc">Telp</label></th>
                                <td scope="row"><input type="text" class="form-control" name="telp_cc" id="telp_cc" value="" readonly></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="tgl_tt">Tanggal</label></th>
                                <td scope="row"><input type="date" class="form-control" name="tgl_tt" id="tgl_tt" value="" readonly></td>


                            </tr>
                            <tr>
                                <th scope="row"><label for="">Tanggal</label></th>
                                <td scope="row"><input type="text" class="form-control" name="id_cc" id="id_cc" value="" readonly></td>


                            </tr>
                        </tbody>
                    </table>
                    <table class="table_subtotal invisible" id="subtotal_tabel">

                        <tr>
                            <th scope="col">Sub total</th>
                            <td><input class="form-control" type="text" name="subtotal" id="subtotal" width="80px" value="<?= $z; ?>" readonly></td>
                        </tr>
                        <tr>
                            <th scope="col">Diskon</th>
                            <td><input class="form-control" min="0" max="100" type="number" name="diskon_2" id="diskon_3" width="80px" placeholder="Masukan Diskon(%)"></td>
                        </tr>
                        <tr>
                            <th scope="col">Ongkir</th>
                            <td><input placeholder="Masukan Harga Ongkir" class="form-control" min="0" type="number" name="ongkir" id="ongkir_3" width="80px"></td>
                        </tr>
                        <tr>
                            <th scope="col">Total Bayar</th>
                            <td><input class="form-control" type="number" name="total_bayar" id="total_bayar_3" width="80px" readonly></td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-xs btn-pilih"><i class="fa fa-check"> </i>
                    Simpan
                </button>
                </form>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" id="tutup_modal_ubah" data-bs-dismiss="modal">Close</button>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '#save', function() {
            var diskon = parseInt($('#diskon_2').val());
            var ongkir = parseInt($('#ongkir').val());
            var total_harga = parseInt($('#total_bayar').val());
            $('#diskon_3').val(diskon);
            $('#ongkir_3').val(ongkir);
            $('#total_bayar_3').val(total_harga);
            var cust_id = String($('#id_c').val());
            var cust_nama = String($('#nama_c').val());
            var cust_kode = String($('#kode_c').val());
            var telp = parseInt($('#telp').val());
            var tgl = String($('#tgl_t').val());
            $('#id_cc').val(cust_id);
            $('#nama_cc').val(cust_nama);
            $('#kode_cc').val(cust_kode);
            $('#telp_cc').val(telp);
            $('#tgl_tt').val(tgl);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.tombol-pilih', function() {
            var rowid = $(this).data('rowid2');
            $('#rowid2').val(rowid);
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#pilihcustomer', function() {
            var id = $(this).data('id');
            var kode = $(this).data('kode');
            var nama = $(this).data('nama');
            var telp = $(this).data('telp');
            var icustomer = document.getElementById("customer");
            var kode2 = document.getElementById("kode_c");
            var nama2 = document.getElementById("nama_c");
            var twlp2 = document.getElementById("telp");
            $('#id_c').val(id);
            $('#kode_c').val(kode);
            $('#kode_c').val(kode);
            $('#nama_c').val(nama);
            $('#telp').val(telp);
            $('#tutup_modal').trigger('click');
            kode2.value = kode;
            // icustomer.style.display = 'block';
            // icustomer.style.display = 'block';
            // icustomer.style.display = 'block';
            icustomer.style.display = 'block';
        });
    })
</script>
<!-- <script>
    $(document).ready(function() {
        $(document).on('click', '#pilihcustomer', function() {
            var kode = $(this).data('kode');
            var nama = $(this).data('nama');
            var telp = $(this).data('telp');
            var icustomer = document.getElementById("customer");
            var kode2 = document.getElementById("kode_c");
            var nama2 = document.getElementById("nama_c");
            var twlp2 = document.getElementById("telp");
            $('#kode_c').val(kode);
            $('#nama_c').val(nama);
            $('#telp').val(telp);
            $('#tutup_modal').trigger('click');
            kode2.value = kode;
            // icustomer.style.display = 'block';
            // icustomer.style.display = 'block';
            // icustomer.style.display = 'block';
            icustomer.style.display = 'block';
        });
    })
</script> -->
<script>
    $(document).ready(function() {

        $(document).on('click', '#ubah_barang', function() {
            var rowid = $(this).data('rowid');
            var nama = $(this).data('nama');
            var qty = $(this).data('qty');
            var harga = $(this).data('harga');
            var diskon = $(this).data('diskon');
            $('#rowid').val(rowid);
            $('#nama').val(nama);
            $('#qty').val(qty);
            $('#harga').val(harga);
            $('#diskon').val(diskon);
            $('#tutup_modal_barang').trigger('click');
            <?php $form = true; ?>

        });
        // $(document).ready(function() {
        //     $('#diskon').keyup(function() {
        //         // <
        //         // !--Ambil nilai bayar dan diskon!-- >
        //         var harga2 = parseInt($('#harga').val());
        //         var diskon2 = parseInt($('#diskon').val());

        //         // <
        //         // !--Perhitungan bayar - (diskon / 100 x bayar) !-- >
        //         var total_bayar = harga2 - (diskon2 / 100) * harga2;
        //         $('#harga_diskon').val(total_bayar);
        //     });
        // });
        // $(document).on('click', '#deleteRow', function() {
        //     var tableID = "tabel_barang";
        //     var table = document.getElementById(tableID);
        //     var rowCount = table.rows.length;
        //     console.log(rowCount);
        //     if (rowCount != 1) {
        //         rowCount = rowCount - 1;
        //         table.deleteRow(rowCount);
        //     }
        // })
    });
</script>

<script>
    $(document).ready(function() {

        $(document).on('click', '#tombol_barang', function() {
            var cust_id = String($('#id_c').val());
            var cust_nama = String($('#nama_c').val());
            var cust_kode = String($('#kode_c').val());
            var telp = parseInt($('#telp').val());
            var tgl = String($('#tgl_t').val());
            $('#cust_id').val(cust_id);
            $('#nama_cust').val(cust_nama);
            $('#kode_cust').val(cust_kode);
            $('#telp_cust').val(telp);
            $('#tgl_transaksi').val(tgl);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#diskon_2').keyup(function() {
            // <!-- Ambil nilai bayar dan diskon !-->
            var subtotal = parseInt($('#subtotal').val());
            var diskon = parseInt($('#diskon_2').val());
            var ongkir = parseInt($('#ongkir').val());

            // <!-- Perhitungan bayar-(diskon/100 x bayar) !-->
            var total_bayar = (subtotal - (diskon / 100) * subtotal) + ongkir;
            $('#total_bayar').val(total_bayar);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#ongkir').keyup(function() {
            // <!-- Ambil nilai bayar dan diskon !-->
            var subtotal = parseInt($('#subtotal').val());
            var diskon = parseInt($('#diskon_2').val());
            var ongkir = parseInt($('#ongkir').val());

            // <!-- Perhitungan bayar-(diskon/100 x bayar) !-->
            var total_bayar = (subtotal - ((diskon / 100) * subtotal)) + ongkir;
            $('#total_bayar').val(total_bayar);
        });
    });
</script>

<?= $this->endSection(); ?>