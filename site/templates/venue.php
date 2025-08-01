<?php snippet('header') ?>

<main class="venue">
  <div class="container">
    <header class="venue-header">
      <h1><?= $page->title()->html() ?></h1>
    </header>
    
    <div class="venue-content">
      <div class="venue-info">
        <?php if ($page->image()): ?>
          <div class="venue-image">
            <?php if ($image = $page->image()->toFile()): ?>
              <img 
                src="<?= $image->url() ?>" 
                alt="<?= $page->title()->html() ?>"
                width="<?= $image->width() ?>"
                height="<?= $image->height() ?>"
              />
            <?php endif ?>
          </div>
        <?php endif ?>
        
        <div class="venue-details">
          <?php if ($page->address()->isNotEmpty()): ?>
            <div class="venue-address">
              <h2>Address</h2>
              <p><?= $page->address()->html() ?></p>
            </div>
          <?php endif ?>
          
          <?php if ($page->hours()->isNotEmpty()): ?>
            <div class="venue-hours">
              <h2>Opening Hours</h2>
              <p><?= $page->hours()->html() ?></p>
            </div>
          <?php endif ?>
        </div>
      </div>
      
      <?php if ($page->blocks()->isNotEmpty()): ?>
        <div class="venue-blocks">
          <?= $page->blocks()->toBlocks() ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>