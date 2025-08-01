<?php 
// venues.php 
// -------------------------
snippet('header') ?>

<main class="venues">
  <div class="container">
    <header class="page-header">
      <h1><?= $page->title()->html() ?></h1>
    </header>
    
    <div class="venues-list">
      <?php foreach ($page->children()->listed() as $venue): ?>
        <article class="venue-card">

          <div class="venue-info">
            <h2>
              <a href="<?= $venue->url() ?>"><?= $venue->title()->html() ?></a>
            </h2>
            
            <?php if ($venue->address()->isNotEmpty()): ?>
              <p class="venue-address"><?= $venue->address()->html() ?></p>
            <?php endif ?>
            
            <?php if ($venue->hours()->isNotEmpty()): ?>
              <p class="venue-hours"><?= $venue->hours()->html() ?></p>
            <?php endif ?>
          </div>
        </article>
      <?php endforeach ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
