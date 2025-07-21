<?php
// /site/snippets/basics/structure-list.php

// Required parameters:
// - $title: Section title (string)
// - $items: Structure field to iterate over

$title = $title ?? '';
$level = $level ?? 2;

// Only render if items are not empty
if ($items && $items->isNotEmpty()): 
?>
  <?php snippet('basics/headline', ['text' => $title, 'level' => $level]) ?>
  <ul class="list-none space-y-2">
    <?php foreach ($items->toStructure() as $item): ?>
      <li class="flex space-x-2">
        <span class="font-bold shrink-0 text-right w-32"><?= $item->year()->html() ?></span>
        <?php snippet('basics/text', ['text' => $item->text()->kt()]) ?>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>