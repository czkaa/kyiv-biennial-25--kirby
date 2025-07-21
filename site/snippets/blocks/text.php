<?php
// Get the indent value
$indent = $block->indent()->isNotEmpty() ? $block->indent()->value() : 'none';

// Determine the appropriate class
if ($indent == 'small') {
    $indentClass = 'pl-indent-sm';
} elseif ($indent == 'medium') {
    $indentClass = 'pl-indent-md';
} else {
    $indentClass = '';
}
?>

<div class="block block-text <?= $indentClass ?>">
    <?php snippet('basics/text', ['text' => $block->content()->content()]) ?>
</div>