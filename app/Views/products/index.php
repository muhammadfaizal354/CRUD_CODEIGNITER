<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <!-- Tambahkan link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Daftar Produk</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif ?>

    <a href="<?= site_url('products/create') ?>" class="btn btn-success mb-3">Tambah Produk</a>

    <form action="<?= site_url('products') ?>" method="get" class="mb-3">
        <div class="input-group">
            <input
                type="text"
                name="keyword"
                class="form-control"
                placeholder="Cari produk..."
                value="<?= esc($keyword ?? '') ?>"
                autocomplete="off"
            >
            <button class="btn btn-primary" type="submit">Cari</button>
            <?php if (!empty($keyword)): ?>
                <a href="<?= site_url('products') ?>" class="btn btn-secondary ms-2">Reset</a>
            <?php endif ?>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= esc($product['name']) ?></td>
                <td>Rp <?= number_format($product['price'], 0, ',', '.') ?></td>
                <td>
                    <a href="/products/edit/<?= $product['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/products/delete/<?= $product['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <!-- Pagination Links dengan tema Bootstrap -->
    <?= $pager->links('default', 'bootstrap_pagination') ?>
</div>

<!-- Tambahkan Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
