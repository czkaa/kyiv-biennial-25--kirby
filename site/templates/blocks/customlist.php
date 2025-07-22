
<?php
  $content = [
    'items' => $block->list()->isNotEmpty()
  ? $block->list()->toStructure()->map(function ($item) {
      return [
        'year' => $item->year()->kt()->value(),
        'text' => $item->text()->kt()->value()
      ];
    })->values()
  : null
  ];
?>
