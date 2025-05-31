<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk</h1>

    <h2>Tambah Produk</h2>

<?php if (session()->getFlashdata('errors')): ?>
    <div style="color: red;">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<form action="<?= site_url('products/store') ?>" method="post">
    <label>Nama:</label><br>
    <input type="text" name="name" value="<?= old('name') ?>"><br><br>

    <label>Harga:</label><br>
    <input type="text" name="price" value="<?= old('price') ?>"><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>
