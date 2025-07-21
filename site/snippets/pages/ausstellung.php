<?php 
  $page = page('ausstellung'); 
?>
<section id="<?= $page->slug() ?>" class="ausstellung pt-24 space-y-4">
  <?php snippet('basics/headline', ['text' => $page->title()->html(), 'level' => 1]) ?>
  
  <?php if($page->start()->isNotEmpty()): ?>
    <?php snippet('basics/headline', ['text' => $page->start()->toDate('d.m.Y'), 'level' => 2]) ?>
  <?php endif ?>
  
  <?php if($page->end()->isNotEmpty()): ?>
    <?php snippet('basics/headline', ['text' => '– ' . $page->end()->toDate('d.m.Y'), 'level' => 2]) ?>
  <?php endif ?>
  
  <?php if($page->address()->isNotEmpty()): ?>
    <div class="">
      <?php snippet('basics/headline', ['text' => 'Addresse', 'level' => 3]) ?>
      <?php snippet('basics/text', ['text' => $page->address()->kirbyText()]) ?>
    </div>
  <?php endif ?>
  
  <?php if($page->opening()->isNotEmpty()): ?>
    <div class="">
      <?php snippet('basics/headline', ['text' => 'Eröffnung', 'level' => 3]) ?>
      <?php snippet('basics/text', ['text' => $page->opening()->kirbyText()]) ?>
    </div>
  <?php endif ?>
  
  <?php if($page->hours()->isNotEmpty()): ?>
    <div class="">
      <?php snippet('basics/headline', ['text' => 'Öffnungszeiten', 'level' => 3]) ?>
      <?php snippet('basics/text', ['text' => $page->hours()->kirbyText()]) ?>
    </div>
  <?php endif ?>
  
  <?php snippet('basics/text', ['text' => $page->text()->kirbyText()]) ?>
  
  <?php if($page->nominees()->isNotEmpty()): ?>
    <div class="">
      <?php snippet('basics/headline', ['text' => 'Nominees', 'level' => 3]) ?>
      <ul>
        <?php foreach($page->nominees()->toStructure() as $nominee): ?>
          <li>
            <?php snippet('basics/text', ['text' => $nominee->name() . ' - ' . $nominee->university()]) ?>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  <?php endif ?>
</section>
