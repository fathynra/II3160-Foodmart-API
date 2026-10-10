<h2>Product Details</h2>
<p>Total <?= esc($total) ?> produk | Halaman <?= esc($page) ?> dari <?= esc($totalPages) ?></p>

<?php if (! empty($products)): ?>
<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Brand</th>
        <th>SRP</th>
        <th>Kategori</th>
        <th>Subkategori</th>
        <th>JSON</th>
    </tr>
    <?php foreach ($products as $p): ?>
    <tr>
        <td><?= esc($p['product_id']) ?></td>
        <td><?= esc($p['product_name']) ?></td>
        <td><?= esc($p['brand_name']) ?></td>
        <td><?= esc($p['srp']) ?></td>
        <td><?= esc($p['category'] ?? '-') ?></td>
        <td><?= esc($p['subcategory'] ?? '-') ?></td>
        <td><a href="/products/<?= esc($p['product_id'], 'url') ?>" target="_blank">/products/<?= esc($p['product_id']) ?></a></td>
    </tr>
    <?php endforeach; ?>
</table>

<p>
    <?php if ($page > 1): ?>
        <a href="/product?page=<?= $page - 1 ?>&limit=<?= $limit ?>">&laquo; Prev</a>
    <?php endif; ?>
    <?php if ($page < $totalPages): ?>
        <a href="/product?page=<?= $page + 1 ?>&limit=<?= $limit ?>">Next &raquo;</a>
    <?php endif; ?>
</p>
<?php else: ?>
<h3>No Data</h3>
<?php endif; ?>