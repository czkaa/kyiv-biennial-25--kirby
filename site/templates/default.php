<?php snippet('header') ?>

<main class="default">
  <div class="container">
    <header class="page-header">
      <h1><?= $page->title()->html() ?></h1>
    </header>
    
    <div class="page-content">
      <?php if ($page->blocks()->isNotEmpty()): ?>
        <?= $page->blocks()->toBlocks() ?>
      <?php endif ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>