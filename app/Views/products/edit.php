<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>

    <form action="/products/update/<?= $product['id'] ?>" method="post">
        <p>
            <label>Nama:</label><br>
            <input type="text" name="name" value="<?= esc($product['name']) ?>" required>
        </p>
        <p>
            <label>Harga:</label><br>
            <input type="number" name="price" value="<?= esc($product['price']) ?>" required>
        </p>
        <p>
            <button type="submit">Update</button>
            <a href="/products">Kembali</a>
        </p>
    </form>
</body>
</html>
