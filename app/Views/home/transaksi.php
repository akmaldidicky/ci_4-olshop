<?= $this->extend('layout/tamplate'); ?>
<?= $this->section('content'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<div class="container">
    <div class="item1">
        <h1>TRANSAKSI</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-2 .ms-auto col-sm-3">
                <table class="table table-bordered border">
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
                </table>
                <button class="btn btn-primary" data-bs-toggle="modal" id="tombol_customer" data-bs-target="#staticBackdrop">Pilih Customer</button>
                <div id="customer" style="display: none;">
                    <table class="table table-bordered border">
                        <thead>
                            <tr>
                                <th colspan="2">Customer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <th><label for="kode_c">Kode</label></th>
                                <td><input type="text" class="form-control" name="kode_c" id="kode_c" readonly></td>

                            </tr>
                            <tr>
                                <th scope="row"><label for="nama_c">Nama</label></th>
                                <td scope="row"><input type="text" class="form-control" name="nama_c" id="nama_c" readonly></td>


                            </tr>
                            <tr>
                                <th scope="row"><label for="telp">Telp</label></th>
                                <td scope="row"><input type="text" class="form-control" name="telp" id="telp" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-md-8 ms-auto">
                <table class="table table-bordered border" id="tabel_barang">
                    <thead>
                        <tr>
                            <th class="tabel_t" style="background-color: lightblue;" rowspan="2" colspan="2"><button class="btn btn-success tambah_b" data-bs-toggle="modal" id="tombol_barang" data-bs-target="#modal_tambah_b">Tambah</button></th>
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
                </table>
                <div class="sini_coy copy invisible">
                    <table class="table-bordered border">
                        <tr>
                            <td><button class="btn btn-warning">Ubah</button></td>
                            <td><button class="btn btn-danger">Hapus</button></td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td><input type="number" min="1" name="diskon"></td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@ mdo</td>
                        </tr>
                </div>
                </table>
            </div>
        </div>

    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
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
                            <tr>
                                <th scope="row"><?= $x; ?></th>
                                <td><?= $c['kode']; ?></td>
                                <td><?= $c['nama']; ?></td>
                                <td><?= $c['telp']; ?></td>
                                <td> <button class="btn btn-success btn-xs btn-pilih" id="pilihcustomer" data-kode="<?= $c['kode']; ?>" data-nama="<?= $c['nama']; ?>" data-telp="<?= $c['telp']; ?>"><i class="fa fa-check"> </i>
                                        Pilih
                                    </button></td>
                                </td>
                            </tr>
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
                            <tr>
                                <form action="/home/coba" method="post">
                                    <th scope="row"><?= $x; ?></th>
                                    <td><input type="text" name="kode" value="<?= $b['kode']; ?>"><?= $b['kode']; ?></td>
                                    <td><input type="text" name="nama" value="<?= $b['nama']; ?>" id=""><?= $b['nama']; ?></td>
                                    <td><input type="number" name="harga" value="<?= $b['harga']; ?>" id=""><?= $b['harga']; ?></td>
                                    <td> <button type="submit" class="btn btn-success btn-xs btn-pilih" id="pilihbarang" data-kode="<?= $b['kode']; ?>" data-nama="<?= $b['nama']; ?>" data-harga="<?= $b['harga']; ?>"><i class="fa fa-check"> </i>
                                            Pilih
                                        </button></td>
                                    </td>
                                    <input type="hidden" name="id" id="" value="<?= $b['id']; ?>">
                                </form>
                            </tr>
                        <?php $x++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="tutup_modal_barang" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
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

        $(document).on('click', '#pilihbarang', function() {
            var nilai = '"halo"';
            var tombolwarning = '"btn btn-warning"';
            var tomboldanger = '"btn btn-danger"';
            var kode = $(this).data('kode');
            var nama = $(this).data('nama');
            var harga = $(this).data('harga');
            var qty = 1;
            var diskon = 90;
            var baris_baru = "<tr>";
            baris_baru += "<td><button class=" + tombolwarning + " >Ubah</button></td>";
            baris_baru += '<td><button class="btn btn-danger" id="deleteRow">Hapus</button></td>'
            baris_baru += "<td>" + nilai + "</td>"
            baris_baru += "<td>" + kode + "</td>"
            baris_baru += "<td>" + nama + "</td>"
            baris_baru += '<td><input type="number" min="1" name[]="qty" id[]="qty" class="form-group"  style="width:80px;"></td>'
            baris_baru += '<td><input type="number" min="0" name[]="harga" id[]="harga" class="form-group"  style="width:120px;" value="' + harga + '"></td>'
            baris_baru += '<td><input type="number" min="0" name[]="diskon" id[]="diskon" class="form-group"  style="width:80px;" value="90"></td>'
            baris_baru += '<td><input type="number" min="0" name[]="diskon_nilai" id[]="diskon_nilai" class="form-group"  style="width:120px;" value="' + harga * diskon / 100 + '"></td>'
            baris_baru += '<td><input type="number" min="0" name[]="harga_diskon" id="harga_diskon" class="form-group"  style="width:120px;" value=""></td>'
            baris_baru += "<td>" + (harga - (harga * diskon / 100)) + "</td>"
            baris_baru += "</tr>"
            $("#tabel_barang").append(baris_baru);
            $('#tutup_modal_barang').trigger('click');

        });
        $(document).ready(function() {
            $('#diskon').keyup(function() {
                // <
                // !--Ambil nilai bayar dan diskon!-- >
                var harga2 = parseInt($('#harga').val());
                var diskon2 = parseInt($('#diskon').val());

                // <
                // !--Perhitungan bayar - (diskon / 100 x bayar) !-- >
                var total_bayar = harga2 - (diskon2 / 100) * harga2;
                $('#harga_diskon').val(total_bayar);
            });
        });
        $(document).on('click', '#deleteRow', function() {
            var tableID = "tabel_barang";
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            console.log(rowCount);
            if (rowCount != 1) {
                rowCount = rowCount - 1;
                table.deleteRow(rowCount);
            }
        })
    });
</script>

<?= $this->endSection(); ?>