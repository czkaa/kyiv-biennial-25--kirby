<?php
// /site/snippets/basics/headline.php

// Set default values
$level = isset($level) ? $level : 1;
$text  = isset($text) ? $text : '';

// Ensure level is one of the allowed values (1, 2, or 3)
if (!in_array($level, [1, 2, 3])) {
    $level = 1;
}

// Define classes based on the heading level
switch ($level) {
    case 1:
        $classes = "font-semibold text-xl"; // Adjust for h1
        break;
    case 2:
        $classes = "font-semibold text-lg"; // Adjust for h2
        break;
    case 3:
        $classes = "font-medium text-md"; // Adjust for h3
        break;
    default:
        $classes = "font-bold text-2xl";
}
?>
<h<?= $level ?> class="<?= $classes ?>">
  <?= $text ?>
</h<?= $level ?>>
