<?php snippet('header') ?>

<main class="event">
  <div class="container">
    <header class="event-header">
      <h1><?= $page->title()->html() ?></h1>
      
      <?php if ($page->subtitle()->isNotEmpty()): ?>
        <h2 class="event-subtitle"><?= $page->subtitle()->html() ?></h2>
      <?php endif ?>
      
      <?php if ($page->display_date()->isNotEmpty()): ?>
        <div class="event-date">
          <?= $page->display_date()->html() ?>
        </div>
      <?php endif ?>
    </header>
    
    <div class="event-content">
      <?php if ($page->blocks()->isNotEmpty()): ?>
        <div class="event-blocks">
          <?= $page->blocks()->toBlocks() ?>
        </div>
      <?php endif ?>
      
      <div class="event-meta">
        <?php if ($page->curators()->isNotEmpty()): ?>
          <div class="event-curators">
            <h3>Curators</h3>
            <ul>
              <?php foreach ($page->curators()->toStructure() as $curator): ?>
                <li><?= $curator->name()->html() ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endif ?>
        
        <?php if ($page->deposit()->isNotEmpty()): ?>
          <div class="event-deposit">
            <h3>Mystetskyi Arsenal Deposit</h3>
            <ul>
              <?php foreach ($page->deposit()->toStructure() as $item): ?>
                <li><?= $item->name()->html() ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</main>

<?php snippet('footer') ?>