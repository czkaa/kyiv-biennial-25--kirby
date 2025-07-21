<?php 
  $page = page('ueber'); 
?>
<section id="<?= $page->slug() ?>"  class="pt-24 space-y-4">
  <?php snippet('basics/headline', ['text' => $site->title()->html(), 'level' => 1]) ?>

  <h2 class="text-lg">
    <?php foreach ($page->subheading()->toBlocks() as $block): ?>
      <?php snippet('blocks/' . $block->type(), ['block' => $block]) ?>
    <?php endforeach ?>
  </h2>

  <?php foreach ($page->text()->toBlocks() as $block): ?>
    <?php snippet('blocks/' . $block->type(), ['block' => $block]) ?>
  <?php endforeach ?>
</section>
