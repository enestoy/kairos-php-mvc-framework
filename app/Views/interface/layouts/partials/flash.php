<?php use Core\Session; ?>

<?php $flashes = Session::getFlashes(); ?>
<?php if (!empty($flashes)): ?>
    <script>
    <?php foreach ($flashes as $type => $message): 
        // type: 'success', 'warning', 'danger' vb.
        $func = in_array($type, ['success','warning','danger']) 
                ? "show" . ucfirst($type) 
                : "showSuccess";
    ?>
        <?= $func ?>("<?= htmlspecialchars($message) ?>");
    <?php endforeach; ?>
    </script>
<?php endif; ?>
