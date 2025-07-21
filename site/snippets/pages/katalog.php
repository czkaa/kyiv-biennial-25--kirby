<?php 
  $page = page('katalog'); 
?>
<section id="<?= $page->slug() ?>" class="katalog pt-24 space-y-4">
  <?php snippet('basics/headline', ['text' => $page->title()->html(), 'level' => 1]) ?>

  <?php foreach ($page->text()->toBlocks() as $block): ?>
    <?php snippet('blocks/' . $block->type(), ['block' => $block]) ?>
  <?php endforeach ?>
</section>
