<?php
spl_autoload_extensions(".php");
spl_autoload_register();

require_once 'vendor/autoload.php';

$min = $_GET['min'] ?? 3;
$max = $_GET['max'] ?? 7;

$min = (int)$min;
$max = (int)$max;

$restaurantChains = \Helpers\RandomGenerator::restaurantChains(2, 3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Chain Mockup</title>
</head>
<body>
    <?php foreach ($restaurantChains as $restaurantChain): ?>
        <?= $restaurantChain->toHTML() ?>
    <?php endforeach; ?>
</body>
</html>
