<?= $this->extend('layout/tamplate'); ?>
<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>
                Edit Data Buku
            </h2>

            <form method="post" action="/books/save">
                <?= csrf_field(); ?>
                <?php foreach ($books as $b) : ?>
                    <div class="row mb-3">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" value="<?= $b['judul']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                        <div class="col-sm-10">
                            <input type="text" name="penulis" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" id="penulis" value="<?= $b['penulis']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('penulis'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                        <div class="col-sm-10">
                            <input type="text" name="penerbit" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" value="<?= $b['penerbit']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('penerbit'); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-10">
                        <input type="text" name="sampul" class="form-control" id="sampul" value="<?= $b['sampul']; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>