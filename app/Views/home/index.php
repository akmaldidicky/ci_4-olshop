<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>


<div class="container-aw">
    <div class="row">
        <div class="col">
            <div class="card myCard1" style="width: 18rem;">
                <div class="card-body ">
                    <i class="fa-solid fa-table-list fa-5x mb-3"></i>
                    <h5 class="card-title">Daftar Transaksi</h5>
                    <button class="btn mt-3" style="background-color: rgba(255, 120, 167, .7);"><a href="/home/daftar">Lihat Daftar</a></button>
                </div>
            </div>
        </div>
        <div class=" col">
            <div class="card myCard2" style="width: 18rem;">
                <div class="card-body">
                    <i class="fa-solid fa-cart-plus fa-5x mb-3"></i>
                    <h5 class="card-title">Tambah Transaksi</h5>
                    <button class="btn mt-3" style="background-color: rgba(20, 70, 250, 0.7);"><a href="home/coba">Tambah Transaksi</a></button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>