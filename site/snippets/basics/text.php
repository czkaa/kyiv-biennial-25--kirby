<?php
// /site/snippets/basics/text.php

// Set default value for text if not provided
$text = isset($text) ? $text : '';
?>
<div class="text-md font-semibold [&p]:pt-20" style="font-variation-settings: 'SERF' 100;">
  <?= $text ?>
</div>
