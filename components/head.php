<?php
$pageTitle = $pageTitle ?? 'Creative Sandookk';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="css/main.css">
    <?php foreach (($pageStyles ?? []) as $pageStyle): ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($pageStyle, ENT_QUOTES, 'UTF-8'); ?>">
    <?php endforeach; ?>
    <link rel="stylesheet" href="css/responsive-text.css">
    <link rel="stylesheet" href="https://use.typekit.net/lfk2mzw.css">
</head>
