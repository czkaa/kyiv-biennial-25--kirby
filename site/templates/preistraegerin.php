<?php
ob_start();
?>

preisträgerin

<?php
$slot = ob_get_clean();
include __DIR__ . '/../snippets/main.php';
?>