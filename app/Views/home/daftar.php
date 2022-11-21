<?= $this->extend('layout/tamplate'); ?>
<?= $this->section('content'); ?>
<div class="container-aw">
    <div class="row">
        <div class="col">
        </div>
        <table class="table table-dark table-bordered border">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Transaksi</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Ongkir</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $x = 1;
                foreach ($item as $i) : ?>
                    <tr>
                        <th scope="row"><?= $x ?></th>
                        <td><?= $i['kode']; ?></td>
                        <td><?= $i['nama']; ?></td>
                        <td><?= date('d-M-Y', strtotime($i['tanggal'])); ?></td>
                        <td><?= $i['qty']; ?></td>
                        <td><?= $i['subtotal']; ?></td>
                        <td><?= $i['diskon']; ?></td>
                        <td><?= $i['ongkir']; ?></td>
                        <td><?= $i['total_bayar']; ?></td>
                    </tr>
                <?php $x++;
                endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
</div>
<?= $this->endSection(); ?>