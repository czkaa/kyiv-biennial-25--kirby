<?php 
  $page = page('nominierte'); 
?>
<section id="<?= $page->slug() ?>"  class="nominierte pt-24 space-y-4">
  <?php snippet('basics/headline', ['text' => $page->title()->html(), 'level' => 1]) ?>
  <?php snippet('basics/text', ['text' => $page->text()->kirbyText()]) ?>
  <?php if($page->nominees()->isNotEmpty()): ?>
    <ul class="mt-4">
      <?php foreach($page->nominees()->toStructure() as $nominee): ?>
        <li>
          <?php snippet('basics/text', ['text' => $nominee->name() . ' - ' . $nominee->university()]) ?>
        </li>
      <?php endforeach ?>
    </ul>
  <?php endif ?>
</section>
