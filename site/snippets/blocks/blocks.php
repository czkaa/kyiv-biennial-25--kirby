<?php
// site/snippets/blocks/text.php

// Get the indent value
$indent = $block->indent()->isNotEmpty() ? $block->indent()->value() : 'none';
$indentClass = 'indent-' . $indent;
?>

<div class="block block-text <?= $indentClass ?>">
  <?php snippet('basics/text', ['text' => $block->content()->kt()()]) ?>
</div>