<h2>Product Categories</h2>

<?php if (! empty($categories)): ?>
<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Subkategori</th>
        <th>Kategori</th>
        <th>Department</th>
        <th>Family</th>
    </tr>
    <?php foreach ($categories as $c): ?>
    <tr>
        <td><?= esc($c['product_class_id']) ?></td>
        <td><?= esc($c['product_subcategory']) ?></td>
        <td><?= esc($c['product_category']) ?></td>
        <td><?= esc($c['product_department']) ?></td>
        <td><?= esc($c['product_family']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<p><a href="/categories" target="_blank">Lihat JSON: /categories</a></p>
<?php else: ?>
<h3>No Data</h3>
<?php endif; ?>