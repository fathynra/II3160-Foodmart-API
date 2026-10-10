<h2>Daftar Services</h2>

<ul>
    <?php foreach ($services as $service): ?>
    <li>
        <?= esc($service['name']) ?>
        <ul>
            <?php foreach ($service['endpoints'] as $label => $url): ?>
            <li><a href="<?= esc($url, 'attr') ?>" target="_blank"><?= esc($label) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <?php endforeach; ?>
</ul>